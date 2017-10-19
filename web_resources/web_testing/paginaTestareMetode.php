<html>
<head></head>
<body>

<!-- Report all errors except E_NOTICE -->
<!-- This is the default value set in php.ini -->


<?php 
function my_autoloader($class) {
	$pathSistemPCstr = getcwd();
	$pathSistemPC= substr($pathSistemPCstr, 0, strpos($pathSistemPCstr, "Proiect_pie"))."Proiect_pie\\";
	echo $pathSistemPC."BE_development\\PHP\\views\\". $class;
	if($class == 'UserView'){
// 		echo $pathSistemPC."BE_development\\PHP\\views\\". $class;
		include $pathSistemPC."BE_development\\PHP\\views\\". $class . '.php';
	} elseif($class== 'Log4Debug'){
// 		echo $pathSistemPC."BE_development\\PHP\\views\\". $class;
		include $pathSistemPC."BE_development\\PHP\\debugerClass\\". $class . '.php';
	}elseif($class== 'ConexiuneFactory'){
		// 		echo $pathSistemPC."BE_development\\PHP\\views\\". $class;
		include $pathSistemPC."BE_development\\PHP\\dbConnectorClasses\\". $class . '.php';
	}
	elseif($class== 'IConexiune'){
		// 		echo $pathSistemPC."BE_development\\PHP\\views\\". $class;
		include $pathSistemPC."BE_development\\PHP\\dbConnectorClasses\\". $class . '.php';
	}
}

spl_autoload_register('my_autoloader');

$user = new ConexiuneFactory();
$user->getConexiuneObject();

?>
</body>
</html>