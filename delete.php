<?php
    include_once "db_conn.php";
    $key = array_search ('刪除', $_POST);
    $Name = mb_split("@",$key)[0];
    //$Price =  mb_split("@",$key)[1];
    $Platform =  mb_split("@",$key)[2];


/*$query = ("select * 
          from game NATURAL JOIN developer NATURAL JOIN information
          where Name=?");
$stmt = $db->prepare($query);
$error = $stmt->execute(array($Name));
$result = $stmt->fetchAll();*/


$stmt1 = $db->prepare("delete from game where Name=? and Platform=?");
$result1 = $stmt1->execute(array($Name,$Platform));

$query = ("select * 
          from game 
          where Name=?");
$stmt = $db->prepare($query);
$error = $stmt->execute(array($Name));
$result = $stmt->fetchAll();
if($result==NULL)// 沒有這遊戲了
{
   $query2 = ("delete from information where Name=?");
   $delete2 = $db->prepare($query2);
   $delete2 -> execute(array($Name));

   $query3 = ("delete from developer where Name=?");
   $delete3 = $db->prepare($query3);
   $delete3 -> execute(array($Name));
}

echo "<script> {window.alert('刪除成功');location.href='http://localhost/data_update.php'} </script>";
?>




    