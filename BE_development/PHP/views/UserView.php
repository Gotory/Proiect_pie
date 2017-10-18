<?php
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);
include("../debugerClass/Log4debug.php");
class UserView{
    protected $id;  
    protected $nume;
    protected $prenume;
    protected $pass; 
    protected $email;
    protected $ip;
 
     function __construct() {
     	$log4Debug = new Log4Debug();
    	$log4Debug->debug_String("------ UserView enter ------");
     }
     //-----------------------------
    function getId() {
       return $this->id;
    }
    function setId($id) {
       $this->id = $id;
    }
    //-----------------------------
    function getNume() {
    	return $this->prenume;
    }
    function setNume($nume) {
    	$this->prenume = $nume;
    }
    //-----------------------------
    function getPrenume() {
    	return $this->prenume;
    }
    function setPrenume($prenume) {
    	$this->prenume = $prenume;
    }
    //-----------------------------
    function getPass() {
    	return $this->pass;
    }
    function setpPass($pass) {
    	$this->pass = $pass;
    }
    //-----------------------------
    function getEmail() {
    	return $this->email;
    }
    function setEmail($email) {
    	$this->email = $email;
    }
    //-----------------------------
    function getIp() {
    	return $this->ip;
    }
    function setIp($ip) {
    	$this->ip = $ip;
    }
       
}

?>