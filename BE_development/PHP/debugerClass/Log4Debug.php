<?php 
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);
include 'ILog4Debug.php';

class Log4Debug implements ILog4Debug{
	const headerDebug = "DEBUG"."::";
	const headerAlert = "ALERT"."::";
	
	protected $msgErr;
	
	public function __construct(){
		$msgErr = "----------------------------------------------------------".(new DateTime())->format('Y-m-d H:i:s');
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}
	
	public static function debug_String($string){
		$msgErr = self::headerDebug.(new DateTime())->format('Y-m-d H:i:s')."::- ".$string;
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}
	
	public static function debug_StringValue($string,$value){
		$msgErr = self::headerDebug.(new DateTime())->format('Y-m-d H:i:s')."::- ".$string.$value;
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}
	#---------------------------------------------------------------------------------------------------------------------
	
	public static function alert_String($string){
		$msgErr = self::headerAlert.(new DateTime())->format('Y-m-d H:i:s')."::- ".$string;
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}
	public static function alert_StringValue($string,$value){
		$msgErr = self::headerAlert.(new DateTime())->format('Y-m-d H:i:s')."::- ".$string.$value;
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}
	#---------------------------------------------------------------------------------------------------------------------
	public static function alert_AssArray($array){
		foreach($array as $x => $x_value) {
			$msgErr = self::headerAlert.(new DateTime())->format('Y-m-d H:i:s')."::- "."ARRAY $array: (KEY)$x - (VALUE)$x_value";
			file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
		}
	}
	public static function debug_AssArray($array){
		foreach($array as $x => $x_value) {
			$msgErr = self::headerDebug.(new DateTime())->format('Y-m-d H:i:s')."::- "."ARRAY $array: (KEY)$x - (VALUE)$x_value";
			file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
		}
	}
	#---------------------------------------------------------------------------------------------------------------------
	
}

