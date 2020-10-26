<?php
include_once("SMS_OK_sms.php");

$mobile="9872246056";
$msg="Hello Katia Ji..";

$msg=SendSMS($mobile,$msg);
echo $msg;
?>