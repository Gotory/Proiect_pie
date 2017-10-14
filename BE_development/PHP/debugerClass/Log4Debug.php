<?php 
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);

// Exemplu
// $log4Debug =  new Log4Debug();
// $log4Debug->debug_StringValue("test ",123);

class Log4Debug{

	protected $msgErr;
	public static function debug_String($string){
		$msgErr = "DEBUG"."::".(new DateTime())->format('Y-m-d H:i:s')."::- ".$string;
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}
	
	public static function debug_StringValue($string,$value){
		$msgErr ="DEBUG"."::".(new DateTime())->format('Y-m-d H:i:s')."::- ".$string.$value;
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}

	public static function alert_String($string){
		$msgErr = "ALERT"."::".(new DateTime())->format('Y-m-d H:i:s')."::- ".$string;
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}
	public static function alert_StringValue($string,$value){
		$msgErr = "ALERT"."::".(new DateTime())->format('Y-m-d H:i:s')."::- ".$string.$value;
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}
	
	public static function alert_Array($array){
		$msgErr = "ALERT"."::".(new DateTime())->format('Y-m-d H:i:s')."::- ".$string.$value;
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}
	
}

