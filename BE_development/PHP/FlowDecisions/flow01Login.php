<?php
session_start();
include_once('../../../web_resources/SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');

$log4Debug = Log4DebugFactory::getLog4DebugObject();
$log4Debug->alert_String("-> Intrat in LogicFlow pagina 1 <-");
try {
    #Scoaterea datelor din form
    #Username
    IF (isset($_REQUEST['tmp_username'])) {

        $userName = Filtre::checkTypeInput($_REQUEST['tmp_username'], "string");
    } ELSE {
        throw new Exception("Lipseste user name");
    }
    #Remember
    IF (isset($_REQUEST['tmp_remember'])) {
        Filtre::checkTypeInput($_REQUEST['tmp_remember'], "string");
    }
    #Password
    IF (isset($_REQUEST['tmp_password'])) {
        Filtre::checkTypeInput($_REQUEST['tmp_password'], "string");
        $userPassIn = $_REQUEST['tmp_password'];
    } ELSE {
        throw new Exception("Lipseste user password");
    }
    #Verificare daca login-ul se efectueaza pe baza de email sau nickname
    if (Filtre::checkEmailFormat($userName)) {
        handlerDB::checkEmail($userName);    #Verificam daca exista Mail-ul
        if (handlerDB::checkExistUserEmailAndPass($userName, $userPassIn) !== true) {    #Verificam daca parola este corecta
            throw new Exception("Parola gresita !");
        }
    } else {
        handlerDB::checkNickname($userName); #Verificam daca exista Nickname-ul
        if (handlerDB::checkExistUserNicknameAndPass($userName, $userPassIn) !== true) { #Verificam daca parola este corecta
            throw new Exception("Parola gresita !");
        }
    }
    //$_SESSION['SESSION_LOGIN_USER'] = true;
    //$log4Debug->debug_StringValue("Punerea in sesiune a lui login: ",$_SESSION['SESSION_LOGIN_USER']);
    $log4Debug->alert_String("-> Iesire din LogicFlow pagina 1 succes <-");
    header("Location: ../../../web_resources/web_pages/BackPagina06.php");
    $_SESSION['numeUserCurrent'] = $userName;
    $objUSER = new UserView();
    $objUSER->setNume($userName);
    $_SESSION['objUSER'] = $objUSER;
} catch (Exception $exceptione) {
    session_start();
    $_SESSION['exceptie'] = $exceptione;
    $log4Debug->alert_String("-> exceptione: ",$exceptione);
//      echo "Code: ".$exceptione->getCode()."<br>";
//      echo "File: ".$exceptione->getFile()."<br>";
//      echo "Line: ".$exceptione->getLine()."<br>";
//      echo "Msg: " .$exceptione->getMessage()."<br>";
        $log4Debug->alert_String("-> Iesire din LogicFlow pagina 1 fail  <-");
        header("Location: ../../../web_resources/web_pages/BackPagina01.php");
    }







