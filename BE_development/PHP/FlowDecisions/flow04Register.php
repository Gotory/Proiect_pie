<?php
include_once('../../../web_resources/SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');

#Pas  hash the password la inregistare !!!!
//$userPassInput = password_hash($userPassIn,PASSWORD_DEFAULT);
$log4Debug = Log4DebugFactory::getLog4DebugObject();
$log4Debug->alert_String("-> Intrat in LogicFlow pagina 04 <-");
try {
    #Pas  scoaterea datelor din form
    IF (isset($_REQUEST['reg_username'])) {
        $reg_username = Filtre::checkTypeInput($_REQUEST['reg_username'], "string");
        $log4Debug->alert_StringValue("Inregistrare userName: ", $reg_username);
    }
    IF (isset($_REQUEST['reg_password_confirm']) && isset($_REQUEST['reg_password'])) {
         Filtre::checkTypeInput($_REQUEST['reg_password_confirm'], "string");
         Filtre::checkTypeInput($_REQUEST['reg_password'], "string");
        $reg_password_confirm = $_REQUEST['reg_password_confirm'];
        $reg_password =$_REQUEST['reg_password'];
        $log4Debug->alert_StringValue("Inregistrare password: ", $reg_password);
        $log4Debug->alert_StringValue("Inregistrare password_confirm: ", $reg_password_confirm);
        $reg_password_final = password_hash($reg_password, PASSWORD_DEFAULT);
    }
    IF (isset($_REQUEST['reg_email'])) {
        $reg_email = Filtre::checkTypeInput($_REQUEST['reg_email'], "string");
        $log4Debug->alert_StringValue("Inregistrare email: ", $reg_email);
    }
    IF (isset($_REQUEST['reg_fullname'])) {
        $reg_fullname = Filtre::checkTypeInput($_REQUEST['reg_fullname'], "string");
        $log4Debug->alert_StringValue("Inregistrare fullname: ", $reg_fullname);
        $reg_fullnameArray = $pieces = explode(" ", $reg_fullname);
    }
    IF (isset($_REQUEST['reg_gender'])) {
        Filtre::checkTypeInput($_REQUEST['reg_gender'], "string");
        $reg_gender = $_REQUEST['reg_gender'];
        $log4Debug->alert_StringValue("Inregistrare gender: ", $reg_gender);
    }
    $agree = false;
    IF (isset($_REQUEST['reg_agree'])) {
        Filtre::checkTypeInput($_REQUEST['reg_agree'], "string");
        $reg_agree = $_REQUEST['reg_agree'];
        $log4Debug->alert_StringValue("Inregistrare agree: ", $reg_agree);
        $agree = true;
    }

    if ($reg_password != $reg_password_confirm) {
        session_start();
        throw new Exception("parolele trebuie sa fie identice");
    }
    if (Filtre::checkEmailFormat($reg_email) !== true) {
        throw new Exception("Formatul la mail nu este acceptat");
    }
    if (handlerDB::checkExistNickname($reg_username)) {
        throw new Exception("Nickname deja exista!");
    }
    if (handlerDB::checkExistEmail($reg_email)) {
        throw new Exception("Email deja exista!");
    }
    if ($agree) {
        if (sizeof($reg_fullnameArray) > 1) {  #Aici verificam daca full name contine Paladuta Stefan sau Stefan
            handlerDB::registerChatUser($reg_fullnameArray[0], $reg_fullnameArray[1], $reg_gender, $reg_email, $reg_password_final, OS_USER_INFO::get_client_ip(), $reg_username);
            $log4Debug->alert_String("-> Iesire in LogicFlow pagina 4 succes <-");
            header("Location: ../../../web_resources/web_pages/BackPagina01.php");
        } else {
            echo sizeof($reg_fullnameArray);
            handlerDB::registerChatUser($reg_fullname, "", $reg_gender, $reg_email, $reg_password_final, OS_USER_INFO::get_client_ip(), $reg_username);
            $log4Debug->alert_String("-> Iesire in LogicFlow pagina 4 succes <-");
            header("Location: ../../../web_resources/web_pages/BackPagina01.php");
        }

    } else {
        throw new Exception("Acceptati termeni va rog!");
    }
} catch (Exception $exceptione) {
    session_start();
    $_SESSION['exceptie'] = $exceptione;
    $log4Debug->alert_String("-> Iesire in LogicFlow pagina 4 fail <-");
    $log4Debug->alert_StringValue("ErrFile: ",$exceptione->getFile());
    $log4Debug->alert_StringValue("ErrLine: ",$exceptione->getLine());
    $log4Debug->alert_StringValue("ErrCode: ",$exceptione->getCode());
    $log4Debug->alert_StringValue("ErrMsg: ",$exceptione->getMessage());
    header("Location: ../../../web_resources/web_pages/BackPagina04.php");
}