<?php
include_once('../../../web_resources/SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');

#Pas  scoaterea datelor din form

IF(isset( $_REQUEST['tmp_username'])){
    $userName     = $_REQUEST['tmp_username'];
}ELSE{
    throw new Exception("Lipseste user name");
}
IF(isset( $_REQUEST['tmp_remember'])){
    $rememberUser = $_REQUEST['tmp_remember'];
}
IF(isset($_REQUEST['tmp_password'])){
    $userPassIn   = $_REQUEST['tmp_password'];
}ELSE{
    throw new Exception("Lipseste user password");
}


#Pas  hash the password la inregistare !!!!
//$userPassInput = password_hash($userPassIn,PASSWORD_DEFAULT);





    #Pas  check if account does exist with this EMAIL or NICKNAME
    handlerDB::checkEmail($userName);
    #Pas  check if password incorrect
    handlerDB::getUserWithEmailAndPass($userName,$userPassIn);

    header("Location: ../../../web_resources/web_pages/BackPagina06.php");






