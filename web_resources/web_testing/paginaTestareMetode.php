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
$userPassInput = password_hash('undercover22',PASSWORD_DEFAULT);
echo "Parola hasurata: ".$userPassInput;
//-----------------------------------------
#echo handlerDB::getUserWithEmailAndPass('stefan.paladuta17@gmail.com',$userPassInput);
//-----------------------------------------

//-----------------------------------------

//-----------------------------------------
?>
</body>
</html>