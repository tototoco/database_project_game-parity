<?php
include "db_conn.php" ;
$Name = $_POST["Name"];
$price = $_POST["price"];
$Platform= $_POST["Platform"];
$Description = $_POST["Description"];
$Developer = $_POST["Developer"];
$Developer_description = $_POST["Developer_description"];



$query = ("select * 
           from game NATURAL JOIN developer NATURAL JOIN information
           where Name=?");
$stmt = $db->prepare($query);
$error = $stmt->execute(array($Name));
$result = $stmt->fetchAll();

$query99 = ("select * 
          from game 
          where Name=? and Platform=?");
$stmt99 = $db->prepare($query99);
$error99 = $stmt99->execute(array($Name,$Platform));
$result99 = $stmt99->fetchAll();

if(count($result99)>=1)
{
    echo "<script> {window.alert('新增重複! 此遊戲已在該平台發售並登記了!');location.href='http://localhost/data_update.php'} </script>";
}
else
{
if(count($result)>=1)
{
    $query3 = ("insert into game values(?,?,?)");
$insert3 = $db->prepare($query3);
$insert3-> execute(array($Name,$price,$Platform));
}
else {
    $query = ("insert into information values(?,?)");
$insert = $db->prepare($query);
$insert -> execute(array($Name,$Description));

$query2 = ("insert into developer values(?,?,?)");
$insert2 = $db->prepare($query2);
$insert2 -> execute(array($Name,$Developer,$Developer_description));

$query3 = ("insert into game values(?,?,?)");
$insert3 = $db->prepare($query3);
$insert3-> execute(array($Name,$price,$Platform));

}
    echo "<script> {window.alert('新增成功');location.href='http://localhost/data_update.php'} </script>";
}


?>