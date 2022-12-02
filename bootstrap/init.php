<?php

global $pdo;
include ("constants.php");
include (BASE_PATH . "/bootstrap/config.php");
include (BASE_PATH . '/vendor/autoload.php');
include (BASE_PATH . "/libs/helpers.php");


try{
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
    $pdo = new PDO("mysql:host=localhost;dbname=Todo",'root','root',$options);
}
catch (PDOExection $e){
    echo 'error' . $e->getMessage();
    exit;
}
include (BASE_PATH . "/libs/lib-auth.php");
include (BASE_PATH . "/libs/lib-tasks.php");

