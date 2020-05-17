<?php

$_SERVER ="localhost";
$_USERNAME ="root";
$_PASSWORD ="";
$_DATABASE ="php_login_database";

try{

   $conn = new PDO("mysql:host=$_SERVER;dbname=$_DATABASE", $_USERNAME, $_PASSWORD);
}catch(PDOException $ex){
    die("Connected failed  ".$ex->getMessage());
}



