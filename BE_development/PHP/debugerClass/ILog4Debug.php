<?php 
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);
interface ILog4Debug{
	public static function debug_String($string);
	public static function alert_String($string);

	public static function alert_StringValue($string,$value);
	public static function debug_StringValue($string,$value);
	
	/*Associative Array
	 To loop through and print all the values of an associative array, you could use a foreach loop, like this:
	 Ex: $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");   <-- associative array
	 */
	public static function alert_AssArray($array);
	public static function debug_AssArray($array);

}
?>