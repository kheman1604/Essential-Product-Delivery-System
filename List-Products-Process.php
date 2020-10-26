<?php
include_once("Connection.php");
$btn=$_POST["btn"];
if($btn=="save")
    doSave($dbCon);
else
    if($btn=="update")
    doUpdate($dbCon);

/*-=-=-=-=-=-=-=-=-SAVE=-=-=-=-=--=-=-*/

function doSave($dbCon)
{
    $uid=$_POST["txtUid"];
    $name=$_POST["txtProductName"];
    $category=$_POST["txtCategory"];
    $productid=$_POST["txtProductId"];
    $productprice=$_POST["txtPrice"];
    $orgName=$_FILES["ProductPic"]["name"];
    $tempName=$_FILES["ProductPic"]["tmp_name"];
    
    $query="insert into products(selleruid,productname,productcategory,productprice,productpic) values('$uid','$name','$category','$productprice','$orgName')";
    mysqli_query($dbCon,$query);
    $msg=mysqli_error($dbCon);
    if($msg=="")
    {
        move_uploaded_file($tempName,"Uploads/".$orgName);
        echo "Details Submitted Successfully";
        header("location:List-Products-byseller.php");
    }
    else
        echo "Something Went Wrong";
    

}

?>