<?php
include_once("Connection.php");
$rid=$_GET["rid"];
$query="delete from requirements where rid='$rid'";
$msg=mysqli_query($dbCon,$query);
if($msg=="")
{
    echo "record Deleted";
}
else
{
    echo $msg;
}
?>