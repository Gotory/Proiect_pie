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
    protected $log4Debug;
    //-----------------------------
    function __construct() {
    	self::setLog(new Log4Debug());
    	self::getLog()->debug_String("------ UserView enter ------");
     }
     //-----------------------------
     function getLog() {
     	return $this->log4Debug;
     }
     function setLog($log4DebugV) {
     	$this->log4Debug = $log4DebugV;
     }
     //-----------------------------
    function getId() {
       return $this->id;
    }
    function setId($id) {
       $this->id = $id;
       self::getLog()->debug_StringValue("set_CurrentUser_ID: ",$id);
    }
    //-----------------------------
    function getNume() {
    	return $this->nume;
    }
    function setNume($nume) {
    	$this->nume = $nume;
    	self::getLog()->debug_StringValue("set_CurrentUser_NUME: ",$nume);
    }
    //-----------------------------
    function getPrenume() {
    	return $this->prenume;
    }
    function setPrenume($prenume) {
    	$this->prenume = $prenume;
    	self::getLog()->debug_StringValue("set_CurrentUser_PRENUME: ",$prenume);
    }
    //-----------------------------
    function getPass() {
    	return $this->pass;
    }
    function setpPass($pass) {
    	$this->pass = $pass;
    	self::getLog()->debug_StringValue("set_CurrentUser_PASS: ",$prenume);
    }
    //-----------------------------
    function getEmail() {
    	return $this->email;
    }
    function setEmail($email) {
    	$this->email = $email;
    	self::getLog()->debug_StringValue("set_CurrentUser_EMAIL: ",$prenume);
    }
    //-----------------------------
    function getIp() {
    	return $this->ip;
    }
    function setIp($ip) {
    	$this->ip = $ip;
    	self::getLog()->debug_StringValue("set_CurrentUser_IP: ",$prenume);
    }
    //----------------------------
    
    function __destruct(){
    	self::getLog()->debug_String("------ UserView exiting ------");
    }
}

?>