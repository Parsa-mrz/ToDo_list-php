<?php
session_start();
global $pdo;
include_once ("constants.php");
include_once (BASE_PATH . "/bootstrap/config.php");
include_once (BASE_PATH . '/vendor/autoload.php');
include_once (BASE_PATH . "/libs/helpers.php");


try{
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
    $pdo = new PDO("mysql:host=localhost;dbname=Todo",'root','root',$options);
}
catch (PDOExection $e){
    echo 'error' . $e->getMessage();
    exit;
}
include_once (BASE_PATH . "/libs/lib-auth.php");
include_once (BASE_PATH . "/libs/lib-tasks.php");

