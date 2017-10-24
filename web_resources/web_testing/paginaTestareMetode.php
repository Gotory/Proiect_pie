<html>
<head></head>
<body>

<!-- Report all errors except E_NOTICE -->
<!-- This is the default value set in php.ini -->


<?php
include_once('../SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');
echo handlerDB::numberOfVisitorDay();
?>
</body>
</html>