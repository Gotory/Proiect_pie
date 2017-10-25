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
        ChatException::checkMessageCategoryCode($code);

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }
    public function __toString() {
            return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
    private static function checkMessageCategoryCode($code){
    switch($code){
        case $code == 0:
            echo "unknown category"."<BR>";
            break;
        case $code < 100 && $code > 1:
            echo "Categorie Type Check"."<BR>";
            break;
        case $code  < 200 && $code > 100:
            echo "Categorie SQLException"."<BR>";
            break;
        case $code < 300 && $code > 200:
            echo "Categorie "."<BR>";
            break;
        default:
            echo "nici o categorie de exceptie"."<BR>";
             }
    }
}



try{
    throw new ChatException('testExceptie',102);
}catch(ChatException $cex){
    echo "Cod: ".$cex->getCode()."<BR>";
    echo "Line: ".$cex->getLine()."<BR>";
    echo "Msg: ".$cex->getMessage() ."<BR>";
}

