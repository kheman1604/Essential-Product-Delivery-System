<?php
include_once("Connection.php");
$btn=$_POST["btn"];
if($btn=="save")
    doSave($dbCon);
else
    if($btn=="update")
    doUpdate($dbCon);

/*=-=-=-=-=-=-Save Citizen Profile =-=-=-=-=-=-*/
function doSave($dbCon)
{
    $Uid=$_POST["txtUid"];
    $Name=$_POST["txtName"];
    $Contact=$_POST["txtContact"];
    $Address=$_POST["txtAddress"];
    $City=$_POST["txtCity"];
    $State=$_POST["txtState"];
    $Pincode=$_POST["txtPin"];
    $Email=$_POST["txtEmail"];
    
    $orgName=$_FILES["ProfilePic"]["name"];
    $tempName=$_FILES["ProfilePic"]["tmp_name"];
    
    $query="insert into citizens values('$Uid','$Name','$Contact','$Address','$City','$State','$Email','$Pincode','$orgName')";
    
    mysqli_query($dbCon,$query);
    $msg=mysqli_error($dbCon);
    if($msg=="")
    {
        move_uploaded_file($tempName,"Uploads /".$orgName);
        echo "Details Submitted Successfully";
    }
    else
        echo $msg;
}


/*=-=-=-=-=-=-Update Citizen Profile =-=-=-=-=-=-*/
function doUpdate($dbCon)
{
    $Uid=$_POST["txtUid"];
    $Name=$_POST["txtName"];
    $Contact=$_POST["txtContact"];
    $Address=$_POST["txtAddress"];
    $City=$_POST["txtCity"];
    $State=$_POST["txtState"];
    $Pincode=$_POST["txtPin"];
    $Email=$_POST["txtEmail"];
    $hdn=$_POST["hdn"];
    
    $orgName=$_FILES["ProfilePic"]["name"];
    $tempName=$_FILES["ProfilePic"]["tmp_name"];
    if($orgName=="")
    {
        $filename=$hdn;
    }
    else
    {
        $filename=$orgName;
        move_uploaded_file($tempName,"Uploads/".$orgName);
    }
    $query="update citizens set name='$Name',contact='$Contact',address='$Address',city='$City',state='$State',pincode='$Pincode',email='$Email',picname='$filename' where uid='$Uid'";
    
    mysqli_query($dbCon,$query);
    $msg=mysqli_error($dbCon);
    if($msg=="")
    {
        echo "Record Updated Successfully";
        header("location:Dash-Citizen.php");
    }
    else
        echo $msg;
}

?>