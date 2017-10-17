<?php 
include 'Log4Debug.php';
// Exemplu
$log4Debug =  new Log4Debug();
$log4Debug->debug_String("test ");
$log4Debug->debug_StringValue("test ",123);

$log4Debug->alert_String("test ");
$log4Debug->alert_StringValue("test ",123);

?>