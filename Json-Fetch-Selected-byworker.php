<?php
include_once("Connection.php");
$category=$_GET["category"];
$city=$_GET["city"];
$query="select * from requirements where abs(DATEDIFF(curdate(),dop))<=10 and category='$category' and city='$city'";
$table=mysqli_query($dbCon,$query);
$ary=array();
while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);

?>