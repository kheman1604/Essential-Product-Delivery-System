<?php
include_once("Connection.php");
$city=$_GET["city"];
$query="select * from sellers where city='$city' ";
$table=mysqli_query($dbCon,$query);
$ary=array();
while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);
?>