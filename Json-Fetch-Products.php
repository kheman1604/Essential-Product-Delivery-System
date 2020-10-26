<?php
include_once("Connection.php");
$uid=$_GET["uid"];
$query="select * from products where selleruid='$uid'";
$table=mysqli_query($dbCon,$query);
$ary=array();
while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);
?>