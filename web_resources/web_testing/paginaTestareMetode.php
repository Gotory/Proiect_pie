<html>
<head></head>
<body>

<!-- Report all errors except E_NOTICE -->
<!-- This is the default value set in php.ini -->


<?php 

#define('HOME_DIR', 'C:\xampp\htdocs\project\e-commerce\');

//Testare configInfoDB.ini luare de valori din proprietati:<br>
// error_reporting(E_ALL ^ E_NOTICE);
// $ini_array= parse_ini_file("../../DB_development/mySQL/configInfoDB.ini");
// if ($ini_array) {
// 	echo 'Loaded configInfoDB.ini: ';
// } else {
// 	echo 'A php.ini file is not loaded';
// }
// print_r($ini_array);

// echo "<br>";
// echo $ini_array[DbUserName]."<br>";
// echo $ini_array[DbUserPass]."<br>";
// echo $ini_array[DbSchemaName]."<br>";
// echo $ini_array[DbIP]."<br>";
// echo $ini_array[DbPort]."<br>";






// $files1 = scandir('.');
// print_r($files1);
// $files2 = scandir('./..');
// print_r($files2);
// $files3 = scandir('./../../');
// print_r($files3);
// $files3 = scandir('./../../BE_development/PHP/dbConnectorClasses/');
// print_r($files3);



include './../../BE_development/PHP/dbConnectorClasses/ConexiuneFactory.php';
//require "./../../BE_development/PHP/dbConnectorClasses/ConexiuneFactory.php";
// require "./../../BE_development/PHP/debugerClass/Log4Debug.php";


$conn= new ConexiuneFactory();








?>
</body>
</html>