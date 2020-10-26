<?php
include_once("Connection.php");
$Uid=$_GET["Uid"];
$query="select * from citizens where uid='$Uid'";
$table=mysqli_query($dbCon,$query);
$ary=array();
while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);
?>