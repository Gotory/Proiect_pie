<?php
include_once('../../../web_resources/SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');

#Pas  hash the password la inregistare !!!!
//$userPassInput = password_hash($userPassIn,PASSWORD_DEFAULT);

    $log4Debug = (new Log4DebugFactory())->getLog4DebugObject();
    $log4Debug->alert_String("-> Intrat in LogicFlow pagina 04 <-");

    #Pas  scoaterea datelor din form
    IF(isset( $_REQUEST['reg_username'])) {
        $reg_username = $_REQUEST['reg_username'];
        $reg_username = htmlEntities($reg_username);
        $log4Debug->alert_StringValue("reg_username: ", $reg_username);
        echo $reg_username."<br>";
    }


    IF(isset( $_REQUEST['reg_password_confirm']) && isset( $_REQUEST['reg_password'])){
         $reg_password_confirm = $_REQUEST['reg_password_confirm'];
         $reg_password = $_REQUEST['reg_password'];
        try{
            if($reg_password != $reg_password_confirm){
                session_start();
                throw new Exception("parolele trebuie sa fie identice");

            }
        }catch(Exception $exceptione){
            $_SESSION['exceptie'] = $exceptione;
            header("Location: ../../../web_resources/web_pages/BackPagina04.php");
        }

         $reg_password_confirm = htmlEntities($reg_password_confirm);
         $log4Debug->alert_StringValue("reg_password_confirm: ",$reg_password_confirm);
         echo $reg_password_confirm."<br>";
         $reg_password = htmlEntities($reg_password);
         $log4Debug->alert_StringValue("reg_password: ",$reg_password);
         echo $reg_password."<br>";

        $reg_password_final =  password_hash($reg_password,PASSWORD_DEFAULT);
    }



    IF(isset( $_REQUEST['reg_email'])){
        $reg_email= $_REQUEST['reg_email'];
        $reg_email = htmlEntities($reg_email);
        $log4Debug->alert_StringValue("reg_email: ",$reg_email);
        try{
             Filtre::checkEmailFormat($reg_email);
        }catch(Exception $exceptione){
            session_start();
            $_SESSION['exceptie'] = $exceptione;
            header("Location: ../../../web_resources/web_pages/BackPagina04.php");
        }
        echo $reg_email."<br>";
    }

    IF(isset( $_REQUEST['reg_fullname'])){
        $reg_fullname = $_REQUEST['reg_fullname'];
        $log4Debug->alert_StringValue("reg_fullname: ",$reg_fullname);
        $reg_fullnameArray = $pieces = explode(" ", $reg_fullname);
        echo $reg_fullname."<br>";
        echo $reg_fullnameArray[0]."<br>";
        echo $reg_fullnameArray[1]."<br>";
    }

    IF(isset( $_REQUEST['reg_gender'])){
        $reg_gender = $_REQUEST['reg_gender'];
        $reg_gender = htmlEntities($reg_gender);
        $log4Debug->alert_StringValue("reg_gender: ",$reg_gender);
        echo $reg_gender."<br>";
    }
    $agree=false;
    IF(isset( $_REQUEST['reg_agree'])){
        $reg_agree = $_REQUEST['reg_agree'];
        $reg_agree = htmlEntities($reg_agree);
        $log4Debug->alert_StringValue("reg_agree: ",$reg_agree);
        $agree = true;
        echo $reg_agree."<br>";
    }

    try {
        if ($agree) {
            if( sizeof($reg_fullnameArray) >1 ){  #Aici verificam daca full name contine Paladuta Stefan sau Stefan
                handlerDB::registerChatUser($reg_fullnameArray[0], $reg_fullnameArray[1], $reg_gender, $reg_email, $reg_password_final, OS_USER_INFO::get_client_ip(),$reg_username);
                header("Location: ../../../web_resources/web_pages/BackPagina01.php");
            }else{
                echo sizeof($reg_fullnameArray);
                handlerDB::registerChatUser($reg_fullname, "", $reg_gender, $reg_email, $reg_password_final, OS_USER_INFO::get_client_ip(),$reg_username);
                header("Location: ../../../web_resources/web_pages/BackPagina01.php");
            }

        }else{
            throw new Exception("Please agree !!!");
        }
    }catch(Exception $exceptione){
        session_start();
        $_SESSION['exceptie'] = $exceptione;
        header("Location: ../../../web_resources/web_pages/BackPagina04.php");

    }