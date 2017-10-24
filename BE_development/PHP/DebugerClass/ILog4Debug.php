<?php 
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);
interface ILog4Debug{
	public function debug_String($string);
	public function alert_String($string);

	public function alert_StringValue($string,$value);
	public function debug_StringValue($string,$value);
	
	/*Associative Array
	 To loop through and print all the values of an associative array, you could use a foreach loop, like this:
	 Ex: $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");   <-- associative array
	 */
	public function alert_AssArray($array);
	public function debug_AssArray($array);

}
?>