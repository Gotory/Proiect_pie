<html>
<head></head>
<body>

<!-- Report all errors except E_NOTICE -->
<!-- This is the default value set in php.ini -->


<?php
include_once('../SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');

echo "Nr. vizitatori: ".handlerDB::numberOfVisitorDay()."<br>";
//-----------------------------------------
$userPassInput = password_hash('1234',PASSWORD_DEFAULT);
echo "Parola hasurata: ".$userPassInput."<br>";
//-----------------------------------------
#echo handlerDB::getUserWithEmailAndPass('stefan.paladuta17@gmail.com',$userPassInput);
//-----------------------------------------
echo date_default_timezone_set ( "Europe/Bucharest")."<br>";
echo date('Y-m-d H:i:s', time() )."<br>";
echo date_default_timezone_get()."<br>";
//-----------------------------------------
//handlerDB::registerChatUser("Oancea","Iulian","M","oancea.iulian@proton.io",$userPassInput,"");
//-----------------------------------------
//echo handlerDB::checkEmail("stanciu.adrian.no@gmail.com")."<br>";
//echo handlerDB::checkEmail("steasdfaasdsan.dsa@dsagmaildas.com")."<br>";
//-----------------------------------------
echo preg_match("/^[a-zA-Z1-9._]{3,}@[a-zA-Z1-9]{2,15}[.][a-zA-z1-9]{2,5}/","kanames72@gmail.com")."<br>";
echo preg_match("/^[a-zA-Z1-9._]{3,}@[a-zA-Z1-9]{2,15}[.][a-zA-z1-9]{2,5}/","kanamedsadass72@dsagmaidasdasl.codasdasm")."<br>";
echo preg_match("/^[a-zA-Z1-9._]{3,}@[a-zA-Z1-9]{2,15}[.][a-zA-z1-9]{2,5}/","kanames72gmail.com")."<br>";
echo preg_match("/^[a-zA-Z1-9._]{3,}@[a-zA-Z1-9]{2,15}[.][a-zA-z1-9]{2,5}/","kanames72@gmailcom")."<br>";
echo preg_match("/^[a-zA-Z1-9._]{3,}@[a-zA-Z1-9]{2,15}[.][a-zA-z1-9]{2,5}/","kanames72@gmail.")."<br>";

?>
</body>
</html>