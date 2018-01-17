<?php
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);
spl_autoload_register('my_autoloader');
class UserView{
    protected $id;  
    protected $nume;
    protected $prenume;
    protected $nickname;
    protected $sex;
    protected $pass; 
    protected $email;
    protected $ip;
    protected $log4Debug;
    protected $loggedDateApplication;
    protected $loggedDateChat;
    /**
     * UserView constructor.
     * @param $id           TABLE: ch_user
     * @param $nume         TABLE: ch_user
     * @param $prenume      TABLE: ch_user
     * @param $sex          TABLE: ch_user
     * @param $pass         TABLE: ch_user
     * @param $email        TABLE: ch_user
     * @param $ip           TABLE: ch_user
     * @param $nickname     TABLE: ch_profile
     */
    //-----------------------------
    function __construct() {
    	self::setLog(Log4DebugFactory::getLog4DebugObject());
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
    	self::getLog()->debug_StringValue("set_CurrentUser_PASS: ",$pass);
    }
    //-----------------------------
    function getEmail() {
    	return $this->email;
    }
    function setEmail($email) {
    	$this->email = $email;
    	self::getLog()->debug_StringValue("set_CurrentUser_EMAIL: ",$email);
    }
    //-----------------------------
    function getIp() {
    	return $this->ip;
    }
    function setIp($ip) {
    	$this->ip = $ip;
    	self::getLog()->debug_StringValue("set_CurrentUser_IP: ",$ip);
    }
    //----------------------------
    function getNickname() {
        return $this->nickname;
    }
    function setNickname($nickname) {
        $this->nickname = $nickname;
        self::getLog()->debug_StringValue("set_CurrentUser_NICKNAME: ",$nickname);
    }
    //----------------------------
    function getSex() {
        return $this->sex;
    }
    function setSex($sex) {
        $this->sex = $sex;
        self::getLog()->debug_StringValue("set_CurrentUser_SEX: ",$sex);
    }
    //----------------------------
    function getLoggedDateApplication() {
        return $this->loggedDateApplication;
    }
    function setLoggedDateApplication($date) {
        $this->loggedDateApplication = $date;
        self::getLog()->debug_StringValue("setLoggedDateApplication: ",$date);
    }
    //----------------------------
    function getLoggedDateChat() {
        return $this->loggedDateChat;
    }
    function setLoggedDateChat() {
        $date = date('Y-m-d H:i:s', strtotime('1 hour'));;
        //(new DateTime()->setTimezone('Europe/Bucharest'))->format('Y-m-d H:i:s');
        $this->loggedDateChat = $date;
        self::getLog()->debug_StringValue("setLoggedDateChat: ",$this->loggedDateChat);
    }
    //----------------------------

    function __destruct(){
    	self::getLog()->debug_String("------ UserView exiting ------");
    }
}

?>