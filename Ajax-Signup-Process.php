<?php
include_once("Connection.php");
include_once("SMS_OK_sms.php");
$check=$_GET["check"];
if($check=="signup")
    doSignUp($dbCon);
else 
    if($check=="validateuid")
        doValidateUid($dbCon);
else 
    if($check=="validatemob")
        doValidateMob($dbCon);
else 
    if($check=="forgotpass")
        doForgotPass($dbCon);

function doSignUp($dbCon)
{
$uid=$_GET["Uid"];
$pwd=$_GET["Pwd"];
$mob=$_GET["Mob"];
$dos=date('Y-m-d');
$Category=$_GET["Category"];
$status=1;
$query="insert into users values('$uid','$pwd','$mob','$Category','$dos','$status')";

mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);

if($msg=="")
    echo "Signedup Succesfully";
else
    echo "Something Went Wrong !!!";
    
}

function doValidateUid($dbCon)
{
    $uid=$_GET["Uid"];
    $query="select * from users where uid='$uid'";
    $table=mysqli_query($dbCon,$query);
    if(mysqli_num_rows($table)==1)
        echo "Not Avaliable";
     else
        echo "Avaliable";
}

function doValidateMob($dbCon)
{
    $Mob=$_GET["Mob"];
    $query="select * from users where mob='$Mob'";
    $table=mysqli_query($dbCon,$query);
    if(mysqli_num_rows($table)==1)
        echo "Mobile Number is already Registered";
     else
        echo "Avaliable";
}


function doForgotPass($dbCon)
{
    $uid=$_GET["uid"];
    $query="select * from users where uid='$uid'";
    $table=mysqli_query($dbCon,$query);
    if($row=mysqli_fetch_array($table))
    {
        $password=$row["pwd"];
        $mobile=$row["mob"];
        $msg=SendSMS($mobile,$msg);
        echo "Password has been sent to your Mobile Number";
    }
    else 
    {
        $password="";
        echo "Invalid User Id";
    }
}
?>