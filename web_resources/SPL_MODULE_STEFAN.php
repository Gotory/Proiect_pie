<?php
function my_autoloader($class) {
    $pathSistemPCstr = getcwd();
    $pathSistemPC= substr($pathSistemPCstr, 0, strpos($pathSistemPCstr, "Proiect_pie"))."Proiect_pie\\";
    //echo $pathSistemPC."BE_development\\PHP\\Views\\". $class;
    if($class == 'UserView'){
        include $pathSistemPC."BE_development\\PHP\\Views\\". $class . '.php';
    } elseif($class== 'Log4DebugFactory'){
        include $pathSistemPC."BE_development\\PHP\\DebugerClass\\". $class . '.php';
    } elseif($class== 'Log4Debug'){
        include $pathSistemPC."BE_development\\PHP\\DebugerClass\\". $class . '.php';
    } elseif($class== 'ILog4Debug'){
        include $pathSistemPC."BE_development\\PHP\\DebugerClass\\". $class . '.php';
    }elseif($class== 'ConexiuneFactory'){
        include $pathSistemPC."BE_development\\PHP\\DBConnectorClasses\\". $class . '.php';
    }elseif($class== 'IConexiuneFactory'){
        include $pathSistemPC."BE_development\\PHP\\DBConnectorClasses\\". $class . '.php';
    }elseif($class== 'Conexiune'){
        include $pathSistemPC."BE_development\\PHP\\DBConnectorClasses\\". $class . '.php';
    }elseif($class== 'handlerDB'){
        include $pathSistemPC."BE_development\\PHP\\Handler\\". $class . '.php';
    }elseif($class== 'handlerCookie'){
        include $pathSistemPC."BE_development\\PHP\\Handler\\". $class . '.php';
    }elseif($class== 'OS_USER_INFO'){
        include $pathSistemPC."BE_development\\PHP\\Extra\\". $class . '.php';
    }elseif($class== 'Filtre'){
        include $pathSistemPC."BE_development\\PHP\\Extra\\". $class . '.php';
    }elseif($class== 'MAIL'){
        include $pathSistemPC."BE_development\\PHP\\Extra\\". $class . '.php';
    }elseif($class== 'ChatException'){
        include $pathSistemPC."BE_development\\PHP\\Extra\\". $class . '.php';
    }


}