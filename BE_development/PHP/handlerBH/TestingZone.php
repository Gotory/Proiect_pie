<?php
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);

include("../views/UserView.php");

$userView = new UserView();
$userView->setId(4);
$userView->setNume("Lorek");
$userView->setPrenume("Bolek");

print_r($userView);


