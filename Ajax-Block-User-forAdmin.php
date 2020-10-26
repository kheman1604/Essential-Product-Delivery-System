<?php
include_once("Connection.php");
$check=$_GET["check"];

if($check=="Block")
{
    doBlock($dbCon);
}
else
    if($check=="Resume")
    {
         doResume($dbCon);
    }
else
    if($check=="Delete")
    {
        doDelete($dbCon);
    }

function doBlock($dbCon)
{
$uid=$_GET["uid"];
$query="update users set status=0 where uid='$uid'";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="") 
{
    echo "Updated Succesfully";
}
    else
        echo $msg;
}

function doResume($dbCon)
{
$uid=$_GET["uid"];
$query="update users set status=1 where uid='$uid'";
mysqli_query($dbCon,$query);
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="") 
{
    echo "Updated Succesfully";
}
    else
        echo $msg;
}

function doDelete($dbCon)
{
$uid=$_GET["uid"];
$query="delete from users where uid='$uid'";
mysqli_query($dbCon,$query);
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="") 
{
    echo "Updated Succesfully";
}
    else
        echo $msg;
}

?>
