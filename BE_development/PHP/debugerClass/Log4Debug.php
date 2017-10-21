<?php 
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);
//include 'ILog4Debug.php';
class Log4Debug implements ILog4Debug{
	const headerDebug = "DEBUG"."::";
	const headerAlert = "ALERT"."::";
    protected $path;
    protected $date;
	protected $msgErr;
	
	public function __construct(){

        $pathSistemPCstr = getcwd();
        $pathSistemPC= substr($pathSistemPCstr, 0, strpos($pathSistemPCstr, "Proiect_pie"))."Proiect_pie\\";
        self::setPath($pathSistemPC."logFile.txt");
        self::setDate((new DateTime())->format('Y-m-d H:i:s'));
        $msgErr = "----------------------------------------------------------".self::getDate();
        file_put_contents(self::getPath(),$msgErr.PHP_EOL, FILE_APPEND);
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

}