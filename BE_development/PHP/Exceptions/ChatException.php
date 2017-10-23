<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 10/22/2017
 * Time: 10:22 PM
 */
Class ChatException extends  Exception{

    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        checkMessageCategoryCode($code);

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }
    public function __toString() {
            return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}

public static function checkMessageCategoryCode($code){
    case $code<100 && $code>1:
        echo "Categorie Type Check";
        break;
    case $code=<200 && $code>=100:
        echo "Categorie ";
        break;
    case $code=<300 && $code>200:
        echo "Categorie ";
        break;

    default:
        echo "nici o categorie de exceptie";
}