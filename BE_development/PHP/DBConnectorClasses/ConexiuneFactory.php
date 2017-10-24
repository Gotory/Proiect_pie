<?php
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);

class ConexiuneFactory
{
    public static function getConexiuneObject()
    {  
    	return (new Conexiune())->getConn();
    }
}
