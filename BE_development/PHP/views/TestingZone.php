<?php
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);

function my_autoloader($class) {
	$pathSistemPCstr = getcwd();
	$pathSistemPC= substr($pathSistemPCstr, 0, strpos($pathSistemPCstr, "Proiect_pie"))."Proiect_pie\\";
//     	        echo $pathSistemPC."BE_development\\PHP\\views\\". $class;
	if($class == 'UserView'){
		// 		echo $pathSistemPC."BE_development\\PHP\\views\\". $class;
		include $pathSistemPC."BE_development\\PHP\\views\\". $class . '.php';
	} elseif($class== 'Log4Debug'){
		// 		echo $pathSistemPC."BE_development\\PHP\\views\\". $class;
		include $pathSistemPC."BE_development\\PHP\\debugerClass\\". $class . '.php';
	}
}
spl_autoload_register('my_autoloader');

//
//$userView = new UserView();
//$userView->setId(4);
//
//echo $userView->getId();
//
