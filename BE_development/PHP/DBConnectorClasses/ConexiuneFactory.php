<?php
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);

class ConexiuneFactory implements  IConexiuneFactory
{
    public static function getConexiuneObject()
    {
    	return (Conexiune::getInstance());
    }
    public static function checkStatus($conn)
    {
        return $conn->getAttribute(PDO::ATTR_CONNECTION_STATUS);;
    }

}
