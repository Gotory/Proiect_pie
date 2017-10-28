<?php
session_start();
include_once('../../../web_resources/SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');

#Pas  hash the password la inregistare !!!!
//$userPassInput = password_hash($userPassIn,PASSWORD_DEFAULT);
    $log4Debug =Log4DebugFactory::getLog4DebugObject();
    $log4Debug->alert_String("-> Intrat in LogicFlow pagina 1 <-");

    try{
        #Pas  scoaterea datelor din form
        IF(isset( $_REQUEST['tmp_username'])){
            $userName = $_REQUEST['tmp_username'];
            $userName = htmlEntities($userName);
            $log4Debug->alert_StringValue("numeUser: ",$userName);
        }ELSE{
            throw new Exception("Lipseste user name");
        }
        IF(isset( $_REQUEST['tmp_remember'])){
            $rememberUser = $_REQUEST['tmp_remember'];
            $rememberUser = htmlEntities($rememberUser);}
        $log4Debug->alert_StringValue("rememberUser: ",$rememberUser);
        IF(isset( $_REQUEST['tmp_password'])){
            $userPassIn = $_REQUEST['tmp_password'];
            $userPassIn = htmlEntities($userPassIn);
        $log4Debug->alert_StringValue("user pass: ",$userPassIn);
        }ELSE{throw new Exception("Lipseste user password");}

        handlerDB::checkEmail($userName); #Pas  check if account does exist with this EMAIL or NICKNAME
        handlerDB::getUserWithEmailAndPass($userName,$userPassIn);   #Pas  check if password incorrect

        $_SESSION['login'] = true;
        $log4Debug->debug_StringValue("Punerea in sesiune a lui login: ",$_SESSION['login']);
        $log4Debug->alert_String("-> Iesire in LogicFlow pagina 1 succes <-");
        header("Location: ../../../web_resources/web_pages/BackPagina06.php");
    }catch(Exception $exceptione){
        session_start();
        $_SESSION['exceptie'] = $exceptione;
//      echo "Code: ".$exceptione->getCode()."<br>";
//      echo "File: ".$exceptione->getFile()."<br>";
//      echo "Line: ".$exceptione->getLine()."<br>";
//      echo "Msg: ".$exceptione->getMessage()."<br>";
        $log4Debug->alert_String("-> Iesire in LogicFlow pagina 1 fail  <-");
        header("Location: ../../../web_resources/web_pages/BackPagina01.php");
    }







