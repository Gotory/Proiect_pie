<html>
<head></head>
<body>

<!-- Report all errors except E_NOTICE -->
<!-- This is the default value set in php.ini -->


<?php
include_once('../SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');

#echo gettype(ConexiuneFactory::getConexiuneObject())."<br>";
#echo gettype(ConexiuneFactory::getConexiuneObject())."<br>";
#echo gettype(ConexiuneFactory::getConexiuneObject())."<br>";


#echo "Nr. vizitatori: ".handlerDB::numberOfVisitorDay()."<br>";
//-----------------------------------------
#$userPassInput = password_hash('1234',PASSWORD_DEFAULT);
#$userPassInput2 = password_hash('1234',PASSWORD_DEFAULT);
#echo "Parola hasurata: ".$userPassInput."<br>";
//-----------------------------------------
#echo "True/Fals: ".password_verify($userPassInput,$userPassInput2)."<br>";
#echo handlerDB::getUserWithEmailAndPass('a',$userPassInput)."<br>";
//-----------------------------------------
#echo date_default_timezone_set ( "Europe/Bucharest")."<br>";
#echo date('Y-m-d H:i:s', time() )."<br>";
#echo date_default_timezone_get()."<br>";
//-----------------------------------------
#handlerDB::registerChatUser("Oancea","Iulian","M","oancea.iulian@proton.io",$userPassInput,"");
//-----------------------------------------
#echo handlerDB::checkEmail("stanciu.adrian.no@gmail.com")."<br>";
#echo handlerDB::checkEmail("steasdfaasdsan.dsa@dsagmaildas.com")."<br>";
//-----------------------------------------
#echo preg_match("/^[a-zA-Z1-9._]{3,}@[a-zA-Z1-9]{2,15}[.][a-zA-z1-9]{2,5}/","kanames72@gmail.com")."<br>";
#echo preg_match("/^[a-zA-Z1-9._]{3,}@[a-zA-Z1-9]{2,15}[.][a-zA-z1-9]{2,5}/","kanamedsadass72@dsagmaidasdasl.codasdasm")."<br>";
#echo preg_match("/^[a-zA-Z1-9._]{3,}@[a-zA-Z1-9]{2,15}[.][a-zA-z1-9]{2,5}/","kanames72gmail.com")."<br>";
#echo preg_match("/^[a-zA-Z1-9._]{3,}@[a-zA-Z1-9]{2,15}[.][a-zA-z1-9]{2,5}/","kanames72@gmailcom")."<br>";
#echo preg_match("/^[a-zA-Z1-9._]{3,}@[a-zA-Z1-9]{2,15}[.][a-zA-z1-9]{2,5}/","kanames72@gmail.")."<br>";
//-----------------------------------------
#echo Filtre::getTypeArgument(123)."<br>";
#echo Filtre::getTypeArgument(12.3)."<br>";
#echo Filtre::getTypeArgument(12,3)."<br>";
#echo Filtre::getTypeArgument('String')."<br>";
#echo Filtre::getTypeArgument("String")."<br>";
#echo Filtre::getTypeArgument((new ConexiuneFactory())->getConexiuneObject())."<br>";
#echo Filtre::getTypeArgument((new ConexiuneFactory())->getConexiuneObject())."<br>";
#echo Filtre::getTypeArgument(123)."<br>";
//-----------------------------------------
#ConexiuneFactory::getConexiuneObject();
#ConexiuneFactory::getConexiuneObject();
//-----------------------------------------
#Log4DebugFactory::getLog4DebugObject();
//-----------------------------------------
#$argInput = 1234123;
#echo Filtre::getTypeArgument($argInput)."<br>";
#Filtre::checkTypeInput($argInput,"string");
#$argInput2 = "sadffsda";
#echo Filtre::getTypeArgument($argInput2)."<br>";
#Filtre::checkTypeInput($argInput2,"string");
#$argInput3 = "23w4r123sadffsda";
#echo Filtre::getTypeArgument($argInput3)."<br>";
#Filtre::checkTypeInput($argInput3,"string");
//-----------------------------------------
#echo handlerDB::checkEmailOrNickname("kanames")."<br>";
#echo handlerDB::checkNickname("gotory")."<br>";
#echo handlerDB::checkEmail("stefan.paladuta17@gmail.com")."<br>";
#echo handlerDB::checkEmailOrNickname("stefan.paladuta17@gmail.com")."<br>";
#echo handlerDB::getUserWithNicknameAndPass("stefan.paladuta17@gmail.com",1234)."<br>"
#echo handlerDB::checkExistUserNicknameAndPass("gotory",1234)."<br>";
#echo handlerDB::checkExistUserEmailAndPass("stefan.paladuta17@gmail.com","1234")."<br>";
//-----------------------------------------
echo Filtre::checkEmailFormat("stef@yaho.com")."<br>";
echo Filtre::checkEmailFormat(123)."<br>";
echo Filtre::checkEmailFormat("fadsgasd")."<br>";
?>
</body>
</html>