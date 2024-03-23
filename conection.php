<?php
$server = 'sql313.infinityfree.com';
$db = 'if0_36225712_crudphp';
$username = 'private';
$password = 'private';

try{
    $conection = new PDO("mysql:host=$server;dbname=$db", $username, $password);
}catch(Exception $e){
    echo $e->getMessage();
}





?>