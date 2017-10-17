<?php 
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);

// Exemplu
// $log4Debug =  new Log4Debug();
// $log4Debug->debug_StringValue("test ",123);

class Log4Debug{

	protected $msgErr;
	
	public function __construct(){
		echo "Intrat in constructor Log4Debug\n";
		$msgErr = "DEBUG"."::".(new DateTime())->format('Y-m-d H:i:s')."::- "."Intrat in constructor Log4Debug";
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
		echo "Iesit din constructor Log4Debug\n";
	}
	
	public static function debug_String($string){
		$msgErr = "DEBUG"."::".(new DateTime())->format('Y-m-d H:i:s')."::- ".$string;
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}
	
	public static function debug_StringValue($string,$value){
		$msgErr ="DEBUG"."::".(new DateTime())->format('Y-m-d H:i:s')."::- ".$string.$value;
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}
	#---------------------------------------------------------------------------------------------------------------------
	
	public static function alert_String($string){
		$msgErr = "ALERT"."::".(new DateTime())->format('Y-m-d H:i:s')."::- ".$string;
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}
	public static function alert_StringValue($string,$value){
		$msgErr = "ALERT"."::".(new DateTime())->format('Y-m-d H:i:s')."::- ".$string.$value;
		file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
	}
	#---------------------------------------------------------------------------------------------------------------------
	/*Associative Array
		To loop through and print all the values of an associative array, you could use a foreach loop, like this:
		Ex: $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");   <-- associative array
	*/
	public static function alert_AssArray($array){
		foreach($array as $x => $x_value) {
			$msgErr = "ALERT"."::".(new DateTime())->format('Y-m-d H:i:s')."::- "."ARRAY $array: (KEY)$x - (VALUE)$x_value";
			file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
		}
	}
	public static function debug_AssArray($array){
		foreach($array as $x => $x_value) {
			$msgErr = "DEBUG"."::".(new DateTime())->format('Y-m-d H:i:s')."::- "."ARRAY $array: (KEY)$x - (VALUE)$x_value";
			file_put_contents('../../../logFile.txt',$msgErr.PHP_EOL, FILE_APPEND);
		}
	}
	#---------------------------------------------------------------------------------------------------------------------
	
}

