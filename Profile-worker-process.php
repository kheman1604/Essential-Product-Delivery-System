<?php
include_once("Connection.php");
$btn=$_POST["btn"];
if($btn=="save")
    doSave($dbCon);
else
    if($btn=="update")
    doUpdate($dbCon);

function doUpdate($dbCon)
{
    $uid=$_POST["txtUid"];
    $email=$_POST["txtEmail"];
    $name=$_POST["txtName"];
    $contact=$_POST["txtContact"];
    $firm=$_POST["txtfirm"];
    $address=$_POST["txtAddress"];
    $city=$_POST["txtCity"];
    $states=$_POST["txtState"];
    $pincode=$_POST["txtPincode"];
    $otherinfo=$_POST["txtotherinfo"];
    $hdn1=$_POST["hdn1"];
    $hdn2=$_POST["hdn2"];
    
    $orgNameprofile=$_FILES["ProfilePic"]["name"];
    $tempNameprofile=$_FILES["ProfilePic"]["tmp_name"];
    
     $orgNameaadhar=$_FILES["Aadhar"]["name"];
     $tempNameaadhar=$_FILES["Aadhar"]["tmp_name"];
    
    if($orgNameaadhar=="")
        {
            $filenameaadhar=$hdn2;
        }
    else
        {
            $filenameaadhar=$orgNameaadhar;
            move_uploaded_file($tempNameaadhar,"Uploads/".$orgNameaadhar);
        }
    
    
    if($orgNameprofile=="")
    {
        $filenameprofile=$hdn1;
    }
    else
    {
        $filenameprofile=$orgNameprofile;
        move_uploaded_file($tempNameprofile,"Uploads/".$orgNameprofile);
    }
    
    $query="update sellers set email='$email',sellername='$name',contact='$contact',firmshop='$firm',city='$city',address='$address',states='$states',aadharpic='$filenameaadhar',profilepic='$filenameprofile',pincode='$pincode',otherinfo='$otherinfo' where uid='$uid'";
    
    mysqli_query($dbCon,$query);
       $msg=mysqli_error($dbCon);
    if($msg=="")
    {
        echo " Updated Succesfully !!! ";
        
    }
    else
    {
        echo $msg;
    }
}

function doSave($dbCon)
{
    $uid=$_POST["txtUid"];
    $email=$_POST["txtEmail"];
    $name=$_POST["txtName"];
    $contact=$_POST["txtContact"];
    $firm=$_POST["txtfirm"];
    $address=$_POST["txtAddress"];
    $city=$_POST["txtCity"];
    $states=$_POST["txtState"];
    $otherinfo=$_POST["txtotherinfo"];
    
    $orgNameprofile=$_FILES["ProfilePic"]["name"];
    $tempNameprofile=$_FILES["ProfilePic"]["tmp_name"];
    
     $orgNameaadhar=$_FILES["Aadhar"]["name"];
     $tempNameaadhar=$_FILES["Aadhar"]["tmp_name"];
    
    $query="insert into sellers values('$uid','$email','$name','$contact','$firm','$city','$address','$states','$orgNameaadhar','$orgNameprofile','$pincode','$otherinfo')";
    
    mysqli_query($dbCon,$query);
       $msg=mysqli_error($dbCon);
    if($msg=="")
    {
        echo "Changes Saved !!! ";
        move_uploaded_file($tempNameaadhar,"Uploads/".$orgNameaadhar);
         move_uploaded_file($tempNameprofile,"Uploads/".$orgNameprofile);
        
    }
    else
    {
        echo $msg;
    }
}
?>