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

}
