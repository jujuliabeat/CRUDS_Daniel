<?php
//Teste de conexão
require_once(__DIR__ . "/util/Connection.php");
$connection = Connection::getConnection();
print_r($connection);