    <?php
include_once('../../../web_resources/SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');

#Pas  hash the password la inregistare !!!!
//$userPassInput = password_hash($userPassIn,PASSWORD_DEFAULT);


    try{
        #Pas  scoaterea datelor din form
        IF(isset( $_REQUEST['tmp_username'])){
            $userName = $_REQUEST['tmp_username'];
            $userName = htmlEntities($userName);
        $log4Debug->alert_StringValue("numeUser",$userName);
        }ELSE{throw new Exception("Lipseste user name");}
        IF(isset( $_REQUEST['tmp_remember'])){
            $rememberUser = $_REQUEST['tmp_remember'];
            $rememberUser = htmlEntities($rememberUser);}
        $log4Debug->alert_StringValue("rememberUser",$rememberUser);
        IF(isset( $_REQUEST['tmp_password'])){
            $userPassIn = $_REQUEST['tmp_password'];
            $userPassIn = htmlEntities($userPassIn);
        $log4Debug->alert_StringValue("",$userPassIn);
        }ELSE{throw new Exception("Lipseste user password");}



        #Pas  check if account does exist with this EMAIL or NICKNAME
        handlerDB::checkEmail($userName);
        #Pas  check if password incorrect
        handlerDB::getUserWithEmailAndPass($userName,$userPassIn);
        $_SESSION['login'] = true;
        header("Location: ../../../web_resources/web_pages/BackPagina06.php");
    }catch(Exception $exceptione){
        session_start();

        $_SESSION['exceptie'] = $exceptione;
//        echo "Code: ".$exceptione->getCode()."<br>";
//        echo "File: ".$exceptione->getFile()."<br>";
//        echo "Line: ".$exceptione->getLine()."<br>";
//        echo "Msg: ".$exceptione->getMessage()."<br>";
        header("Location: ../../../web_resources/web_pages/BackPagina01.php");
    }







