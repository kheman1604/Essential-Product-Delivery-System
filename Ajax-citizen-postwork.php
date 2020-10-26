<?php
include_once("Connection.php");
$uid=$_GET["uid"];
$category=$_GET["Category"];
$workinfo=$_GET["workinfo"];
$city=$_GET["City"];
$location=$_GET["Location"];
$date=date('Y-m-d');
$query="insert into requirements(cust_uid,category,problem,location,city,dop) values('$uid','$category','$workinfo','$location','$city','$date')";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
    echo "Posted Succesfully";
    
}
else
{
    echo $msg;
}
?>