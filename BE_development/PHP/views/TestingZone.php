<?php
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);
include("UserView.php");

$userView = new UserView();
$userView->setId(4);

echo $userView->getId();

