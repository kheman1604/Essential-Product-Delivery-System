<?php
include_once("Connection.php");
$cid=$_GET["cid"];
$wid=$_GET["wid"];

$query="insert into ratings(citizenid,workerid) values('$cid','$wid')";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
    echo "Successfully Requested";
    
}
else
{
    echo $msg;
}
?>