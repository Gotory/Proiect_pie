<?php 
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);
class Log4Debug implements ILog4Debug{
	const headerDebug = "DEBUG"."::";
	const headerAlert = "ALERT"."::";
    protected $path;
    protected $date;
	protected $msgErr;
    protected $logObje;

	public function __construct(){
        date_default_timezone_set ( "Europe/Bucharest");
        $pathSistemPCstr = getcwd();
        $pathSistemPC= substr($pathSistemPCstr, 0, strpos($pathSistemPCstr, "Proiect_pie"))."Proiect_pie\\";
        self::setPath($pathSistemPC."logFile.txt");
        self::setDate((new DateTime())->format('Y-m-d H:i:s'));
        $msgErr = "----------------------------------------------------------".self::getDate();
        file_put_contents(self::getPath(),$msgErr.PHP_EOL, FILE_APPEND);
        self::setLog4Debug($this);
        self::debug_StringValue("Log4Debug pid: ",getmypid());
	}
    function setPath($string){
        $this->path = $string;
    }
    function getPath(){
        return $this->path;
    }
    function setDate($date){
        $this->date = $date;
    }
    function getDate(){
        return $this->date;
    }
	
	public function debug_String($string){
		$msgErr = self::headerDebug.self::getDate()."::- ".$string;
        file_put_contents(self::getPath(),$msgErr.PHP_EOL, FILE_APPEND);
	}
	
	public function debug_StringValue($string,$value){
		$msgErr = self::headerDebug.self::getDate()."::- ".$string.$value;
        file_put_contents(self::getPath(),$msgErr.PHP_EOL, FILE_APPEND);
	}
	#---------------------------------------------------------------------------------------------------------------------
	
	public function alert_String($string){
		$msgErr = self::headerAlert.self::getDate()."::- ".$string;
        file_put_contents(self::getPath(),$msgErr.PHP_EOL, FILE_APPEND);
	}
	public function alert_StringValue($string,$value){
		$msgErr = self::headerAlert.self::getDate()."::- ".$string.$value;
        file_put_contents(self::getPath(),$msgErr.PHP_EOL, FILE_APPEND);
	}
	#---------------------------------------------------------------------------------------------------------------------
	public function alert_AssArray($array){
		foreach($array as $x => $x_value) {
			$msgErr = self::headerAlert.self::getDate()."::- "."ARRAY $array: (KEY)$x - (VALUE)$x_value";
            file_put_contents(self::getPath(),$msgErr.PHP_EOL, FILE_APPEND);
		}
	}
	public function debug_AssArray($array){
		foreach($array as $x => $x_value) {
			$msgErr = self::headerDebug.self::getDate()."::- "."ARRAY $array: (KEY)$x - (VALUE)$x_value";
            file_put_contents(self::getPath(),$msgErr.PHP_EOL, FILE_APPEND);
		}
	}
	#---------------------------------------------------------------------------------------------------------------------
    public function logingVisitorActiviti($adresaIP){
            self::debug_String(" ->INTRAT IN logingVisitorActiviti<- ");
            $osOBJ          = new OS_USER_INFO();
            $brower         = $osOBJ->showInfo('browser');
            $browerVersion  = $osOBJ->showInfo('version');
            $os             = $osOBJ->showInfo('os');
            self::debug_StringValue("Brower: ",$brower);
            self::debug_StringValue("Brower version: ",$browerVersion);
            self::debug_StringValue("OS: ",$os);
            self::debug_StringValue("IP: ",$adresaIP);
            handlerDB::logVisitor($adresaIP,$brower,$browerVersion,$os);
    }

    public function setLog4Debug($obj){
        $this->logObje=$obj;
    }
    public function getLog4Debug(){
        return $this->logObje;
    }

    public static function getInstanceOfLog4Debug(){
        #start
        static $instance = null;
        if(null==$instance){
            $instance = (new Log4Debug())->getLog4Debug();
            $instance->debug_String("New Log4Debug oject");
        }else{
            #using same obj
            //$instance->debug_String("Same Log4Debug oject");
        }
        #end
        #codul de mai sus foloseste principiul la singleton. Fiecare obiect conn db chemat va fi acelasi astfel incat sa evitam crearea mereu a unui obiect nou!
        return $instance;
    }

}
