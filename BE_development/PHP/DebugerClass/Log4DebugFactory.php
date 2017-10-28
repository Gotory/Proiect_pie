<?php
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);

class Log4DebugFactory
{
    public static function getLog4DebugObject()
    {
        return Log4Debug::getLog4Debug();
    }
}
