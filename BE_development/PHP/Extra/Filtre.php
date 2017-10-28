<?php
Class Filtre{
        CONST E_MAIL_FORMAT = "/^[a-zA-Z1-9._]{3,}@[a-zA-Z1-9]{2,15}[.][a-zA-z1-9]{2,5}/";

        public static function checkEmailFormat($emailFormat){
           $rez = preg_match(self::E_MAIL_FORMAT,$emailFormat);
           if($rez !== 1){
                throw new Exception("Formatul la mail este gresit");
           }
           return true;
        }

        public static function getTypeArgument($arg){
            #In php exista 5 tipuri de data
            #String, Integer, Float (floating point numbers - also called double), Boolean, Array, Object, NULL, Resource
            return gettype ( $arg );
        }

        public static function checkTypeInput($argInput,$argumentType){
         #In php exista 5 tipuri de data
         #String, Integer, Float (floating point numbers - also called double), Boolean, Array, Object, NULL, Resource
        if($argumentType!==Filtre::getTypeArgument($argInput)){
            throw new Exception("Verifica formatul introdus a datelor.");
        }

    }

}




