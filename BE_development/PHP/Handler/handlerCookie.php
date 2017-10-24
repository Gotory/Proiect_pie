<?php
class handlerCookie{

    public static function setCookie($nameStr,$value){
        #Pas 1 verificarea tipurilor | Al 2 parametru trebuie sa fie String !
        $typeNameStr = gettype($nameStr);
        $typeValue =  gettype($value);
        //"boolean" "integer" "double" "string" "array" "object" "resource" "NULL" "unknown type"
        if( $typeNameStr=='array' || $typeValue=='array' ){
            throw new Exception("Parametri nu sunt de tip String sau Integer");
        }else{
            setcookie($nameStr, $value, time() + (86400 * 30), "/"); // 86400 = 1 day
        }
    }

}