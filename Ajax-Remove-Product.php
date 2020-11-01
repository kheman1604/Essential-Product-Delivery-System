<?php
include_once("Connection.php");
$uid=$_GET["uid"];
$query="delete from products where productid=$uid";
$msg=mysqli_query($dbCon,$query);
if($msg=="")
{
  echo "Product Deleted Successfully";
}
else
{
    echo $msg;
}

?>