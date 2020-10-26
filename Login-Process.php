<?php
session_start();
include_once("Connection.php");
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
$query="select * from users where uid='$uid' and pwd='$pwd' and status=1" ;
$table=mysqli_query($dbCon,$query);
$count=mysqli_num_rows($table);
if($count==1)
{
    $row=mysqli_fetch_array($table);
    $category=$row["category"];
    $_SESSION["activeuser"]=$uid;
    echo $category;
}
else
{
    echo "Someting Went Wrong";
}
?>