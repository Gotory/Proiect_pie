<?php
Class Filtre{
        CONST E_MAIL_FORMAT = "/^[a-zA-Z1-9._]{3,}@[a-zA-Z1-9]{2,15}[.][a-zA-z1-9]{2,3}/";

        public static function checkEmailFormat($emailFormat){
            $log4Debug = Log4DebugFactory::getLog4DebugObject();
            settype($exist,"boolean");
            $exist=true;
            $rez = preg_match(self::E_MAIL_FORMAT,$emailFormat);
            $log4Debug->alert_StringValue("Email format check 1/0: ",$rez);
            if($rez !== 1){
                //throw new Exception("Formatul la mail este gresit");
               $exist=false;
            }
             return $exist;
        }

        public static function getTypeArgument($arg){
            #In php exista 5 tipuri de data
            #String, Integer, Float (floating point numbers - also called double), Boolean, Array, Object, NULL, Resource
            return gettype ( $arg );
        }

        public static function checkTypeInput($argInput,$argumentType){
             $log4Debug = Log4DebugFactory::getLog4DebugObject();
             $argInputClean = htmlEntities($argInput);
             $argInputClean = Filtre::trimSpace($argInputClean);
             if(strpos($argInputClean, '&lt;') !== false || strpos($argInputClean, '&gt;') !== false){
                 $log4Debug->alert_StringValue("Tentativa mallware cu: ",$argInputClean);
                 throw new Exception("Tentativa de mallware !");
             }
                 #In php exista 5 tipuri de data
                 #String, Integer, Float (floating point numbers - also called double), Boolean, Array, Object, NULL, Resource
            if($argumentType!==Filtre::getTypeArgument($argInputClean)){
                $log4Debug->alert_StringValue("Formatul datelor, argumentul trebuie sa fie $argumentType dar este: ",$argInputClean);
                 throw new Exception("Verifica formatul introdus a datelor.");
            }
            $log4Debug->debug_StringValue("Final clearning var: ",$argInputClean);
            return $argInputClean;

        }

    public static function trimSpace($argInput){
        $log4Debug = Log4DebugFactory::getLog4DebugObject();
        $argInputProcessed = trim($argInput);
        $log4Debug->debug_StringValue("Lungimea: ",strlen( $argInputProcessed ));
        if(strlen( $argInputProcessed ) <= 0){
            throw new Exception("Fara spatii !");
        }
        $log4Debug->debug_StringValue("Var. with clean spaces: ",$argInputProcessed);
        return $argInputProcessed;
    }

}




