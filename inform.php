<?php
include "db_conn.php" ;
$query = ("select * from game");
$inform = $db->prepare($query);
$inform -> execute();
$result = $inform -> fetchAll();
for($i=0;$i<count($result);$i++){
    echo "<tr>";
    echo "<td>".$result[$i]['Name']."</td>";
    echo "<td>".$result[$i]['price']."</td>";
    echo "<td>".$result[$i]['know']."</td>";
    echo "<td>".$result[$i]['maker']."</td>";
    echo "<td>".$result[$i]['seller']."</td>";
    echo "<td>".$result[$i]['time']."</td>";
    echo "<tr>";
}
?>