<?php
$host = '127.0.0.1';
$db = 'g19bcsy3c';
$user = 'root';
$pass = '';
$port = '3306';

$db = new mysqli($host, $user, $pass, $db, $port);
if ($db->connect_error){
    echo $db->connect_error;
    die();
}
?>