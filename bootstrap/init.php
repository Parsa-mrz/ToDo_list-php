<?php
global $pdo;
include ("constants.php");
require ("config.php");
include ('vendor/autoload.php');
include ("libs/helpers.php");


try{
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
    $pdo = new PDO("mysql:host=localhost;dbname=Todo",'root','root',$options);
}
catch (PDOExection $e){
    echo 'error' . $e->getMessage();
    exit;
}
include ("libs/lib-auth.php");
include ("libs/lib-tasks.php");

