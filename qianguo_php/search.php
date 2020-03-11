<?php
$q=$_GET["q"];
if (!$q)exit;
function sqlite_regExp($sql)
   {
       $db = new PDO('sqlite:qiangguo.db');
       if($db->sqliteCreateFunction("regexp", "preg_match", 2) === FALSE) exit("Failed creating function!");
       if($res = $db->query($sql)->fetchAll()){ return $res; }
       else return false;
   }
   // calling our function / sort matches
   if($rows = sqlite_regExp("SELECT * FROM dic WHERE regexp('/$q/ui', ques)")){
        echo json_encode($rows);
   }
?>