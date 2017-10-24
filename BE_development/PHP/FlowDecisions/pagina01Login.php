<?php
include_once('../../../web_resources/SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');

#Pas  scoaterea datelor din form
$userName     = $_REQUEST['tmp_username'];
$rememberUser = $_REQUEST['tmp_remember'];
$userPassIn   = $_REQUEST['tmp_password'];


#Pas  hash the password
$userPassInput = password_hash($userPassIn,PASSWORD_DEFAULT);



#Pas  check if account doesnt exist
#Pas  check if XSS Attack!



#Pas  check for cookie
if(!isset($_COOKIE['chat_rmbUser'])){
    
    #Pas  check if password incorrect
    $userPassDB = 123;
    // The cost parameter can change over time as hardware improves
    $options = array('cost' => 11);
    // Verify stored hash against plain-text password
    if (password_verify($userPassDB, $userPassInput)) {
        // Check if a newer hashing algorithm is available
        // or the cost has changed
        if (password_needs_rehash($userPassDB, PASSWORD_DEFAULT,$options)) {
            // If so, create a new hash, and replace the old one

            if($rememberUser=='on'){
                handlerCookie::setCookie("chat_rmbUser",$rememberUser);
            }

            header("Location: ../../../web_resources/web_pages/BackPagina06.php");
        }
        // Log user in
    }else{
        throw new Exception("Parola este incorecta");
    }

}else{
    $CK_USER = $_COOKIE["chat_rmbUser"];
    if($CK_USER=='on'){
        header("Location: ../../../web_resources/web_pages/BackPagina06.php");
    }
}




