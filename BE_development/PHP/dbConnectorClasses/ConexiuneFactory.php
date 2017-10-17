<?php
# Pentru anularea de PHP Notice:
include '../debugerClass/Log4Debug.php';
error_reporting(E_ALL ^ E_NOTICE);

class Conexiune
{
	
    protected $dbh;

    public function __construct()
    {

        try {
        	$log4Debug =  new Log4Debug();
        	$log4Debug->debug_String("Intrat in constructor Conexiune");
        	$ini_array= parse_ini_file("../../../DB_development/mySQL/configInfoDB.ini");
        	if ($ini_array) {
        		$log4Debug->alert_String('Loaded configInfoDB.ini: ');
        	} else {
        		$log4Debug->alert_String('configInfoDB.ini file is not loaded');
        	}
        	$log4Debug->debug_AssArray($ini_array);   	
        	if (gethostname() == 'DESKTOP-CGDSSVT') {
        		
        		$db_hostV = 'localhost';                                  // hostname stefan
        		$log4Debug->debug_StringValue('$db_hostV: ',$db_hostV);
        	} else {
        		$db_hostV = $ini_array[DbIP].":".$ini_array[DbPort];      // hostname Alex,Cosmin,Marius,Iulian
        		$log4Debug->debug_StringValue('$db_hostV: ',$db_hostV);
        	}
        	$db_host      = $db_hostV;                    // hostname
        	$db_name      = $ini_array[DbSchemaName];     // databasename
            $db_user      = $ini_array[DbUserName];       //  username
            $db_user_pw   = $ini_array[DbUserPass];       //  password

            $con = new PDO('mysql:host='.$db_host.'; dbname='.$db_name, $db_user, $db_user_pw);  
            $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $con->exec("SET CHARACTER SET utf8");  //  return all sql requests as UTF-8  
            $log4Debug->debug_String("conexiune creata cu succese");
        }
        catch (PDOException $err) {  
            echo "Connection to MySQL failed: ";
            $err->getMessage() . "<br/>";
            # $err->getLine() . "<br/>";
            # $err->getTrace() . "<br/>";
            $log4Debug->alert_String($err); //STEFAN 12/10/2017
			# file_put_contents('PDOErrors.txt',$err, FILE_APPEND);  // write some details to an error-log outside public_html - old way
            die();  //  terminate connection
        }
        $log4Debug->debug_String("Iesit din constructor Conexiune");
    }
}

class ConexiuneFactory
{
    public static function getConexiune()
    {
    	return new Conexiune();
    }
}


#Exemplu instantiere pentru conexiune
// $conn= (new ConexiuneFactory())->getConexiune();

