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
            Filtre::checkTypeInput($_REQUEST['tmp_username'],"string");
            $userName = $_REQUEST['tmp_username'];
        }ELSE{
            throw new Exception("Lipseste user name");
        }
        IF(isset( $_REQUEST['tmp_remember'])){
            Filtre::checkTypeInput($_REQUEST['tmp_remember'],"string");
        }
        IF(isset( $_REQUEST['tmp_password'])){
            Filtre::checkTypeInput($_REQUEST['tmp_password'],"string");
            $userPassIn = $_REQUEST['tmp_password'];
        }ELSE{
            throw new Exception("Lipseste user password");
        }

        if(Filtre::checkEmailFormat($userName)){#Pas  check if account does exist with this EMAIL or NICKNAME
            handlerDB::checkEmail($userName);
            if(handlerDB::checkExistUserEmailAndPass($userName,$userPassIn) !== true ){#Pas  check if password incorrect
                throw new Exception("Parola gresita !");
            }
        }else{
            handlerDB::checkNickname($userName);
            if(handlerDB::checkExistUserNicknameAndPass($userName,$userPassIn) !== true ){#Pas  check if password incorrect
                throw new Exception("Parola gresita !");
            }

        }

        $_SESSION['SESSION_LOGIN_USER'] = true;
        $log4Debug->debug_StringValue("Punerea in sesiune a lui login: ",$_SESSION['SESSION_LOGIN_USER']);
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







