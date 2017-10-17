<?php
# Pentru anularea de PHP Notice:
error_reporting(E_ALL ^ E_NOTICE);
include 'ConexiuneFactory.php';

#Exemplu instantiere pentru conexiune
$conn= (new ConexiuneFactory())->getConexiuneObject();

//verifica acuma log-ul dupa ce ai dat run si vezi ora ! este ora_actuala-1h