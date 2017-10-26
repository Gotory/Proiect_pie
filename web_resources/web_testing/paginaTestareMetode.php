<html>
<head></head>
<body>

<!-- Report all errors except E_NOTICE -->
<!-- This is the default value set in php.ini -->


<?php
include_once('../SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');

echo "Nr. vizitatori: ".handlerDB::numberOfVisitorDay();
//-----------------------------------------
$userPassInput = password_hash('undercover22',PASSWORD_DEFAULT)."<br>";
echo "Parola hasurata: ".$userPassInput;
//-----------------------------------------
#echo handlerDB::getUserWithEmailAndPass('stefan.paladuta17@gmail.com',$userPassInput);
//-----------------------------------------
//echo date_default_timezone_set ( "Europe/Bucharest");
echo date('Y-m-d H:i:s', time() )."<br>";
echo date_default_timezone_get()."<br>";
//-----------------------------------------

//-----------------------------------------
?>
</body>
</html>