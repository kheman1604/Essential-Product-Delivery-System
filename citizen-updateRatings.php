<?php
include_once("Connection.php");
$uid=$_GET["uid"];
$ratingval=$_GET["rating"];
$rid=$_GET["rid"];
$query="update workers set rating=rating+'$ratingval' , ratecount=ratecount+1 where uid='$uid'";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
    $query2="delete from ratings where rid='$rid'";
    mysqli_query($dbCon,$query2);
    echo "ok";
    
}
else
{
    echo $msg;
}
?>