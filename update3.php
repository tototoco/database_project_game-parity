<?php
include "db_conn.php";
    $Name = $_POST["Namet"];
    $Price =  $_POST["Price"];
    $Platform =  $_POST["Platform"];
    $Description = $_POST["Description"];
    $Developer =  $_POST["Developer"];
    $Developer_description =  $_POST["Developer_description"];


    /*echo".$Name.";
    echo".$Price.";
    echo".$Platform.";
    echo".$Description.";
    echo".$Developer.";
    echo".$Developer_description.";*/

/////////////////////////
   /* $query = ("select * 
          from game 
          where Name=?");
    $stmt = $db->prepare($query);
    $error = $stmt->execute(array($Name));
    $result = $stmt->fetchAll();*/

$stmt = $db->prepare("update game set   Price = ? where Name=? and Platform =?");
$result = $stmt->execute(array($Price,$Name,$Platform));


////////////////////////////////////// 
   /* $query3 = ("select * 
          from information 
          where Name=?");
    $stmt3 = $db->prepare($query3);
    $error3 = $stmt3->execute(array($Name));
    $result3 = $stmt3->fetchAll();*/

    $stmt1 = $db->prepare("update information set Description=? where Name=?");
    $result1 = $stmt1->execute(array($Description,$Name));



/////////////////////////////////////////////

/* $query2 = ("select * 
        from developer
        where Name=?");
    $stmt2 = $db->prepare($query2);
    $error2 = $stmt2->execute(array($Name));
    $result2 = $stmt2->fetchAll();*/

    $stmt2 = $db->prepare("update developer set Developer=? , Developer_description=? where Name=?");
    $result2 = $stmt2->execute(array($Developer,$Developer_description,$Name));



/////////////////////////////////////////////

    echo "<script> {window.alert('更新成功');location.href='http://localhost/data_update.php'} </script>";
?>