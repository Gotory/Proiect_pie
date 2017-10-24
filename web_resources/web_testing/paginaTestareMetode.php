<html>
<head></head>
<body>

<!-- Report all errors except E_NOTICE -->
<!-- This is the default value set in php.ini -->


<?php
function my_autoloader($class) {
    $pathSistemPCstr = getcwd();
    $pathSistemPC= substr($pathSistemPCstr, 0, strpos($pathSistemPCstr, "Proiect_pie"))."Proiect_pie\\";
    //echo $pathSistemPC."BE_development\\PHP\\views\\". $class;
    if($class == 'UserView'){
        include $pathSistemPC."BE_development\\PHP\\views\\". $class . '.php';
    } elseif($class== 'Log4Debug'){
        include $pathSistemPC."BE_development\\PHP\\debugerClass\\". $class . '.php';
    } elseif($class== 'ILog4Debug'){
        include $pathSistemPC."BE_development\\PHP\\debugerClass\\". $class . '.php';
    }elseif($class== 'ConexiuneFactory'){
        include $pathSistemPC."BE_development\\PHP\\dbConnectorClasses\\". $class . '.php';
    }elseif($class== 'IConexiune'){
        include $pathSistemPC."BE_development\\PHP\\dbConnectorClasses\\". $class . '.php';
    }elseif($class== 'Conexiune'){
        include $pathSistemPC."BE_development\\PHP\\dbConnectorClasses\\". $class . '.php';
    }elseif($class== 'handlerDB'){
        include $pathSistemPC."BE_development\\PHP\\handlerDB\\". $class . '.php';
    }elseif($class== 'OS_USER_INFO'){
        include $pathSistemPC."BE_development\\PHP\\extra\\". $class . '.php';
    }
}
spl_autoload_register('my_autoloader');

$log4Debug = new Log4Debug();
//$log4Debug->logingVisitorActiviti("53.168.23.1");
$log4Debug->numberOfVisitorDay();
?>
</body>
</html>