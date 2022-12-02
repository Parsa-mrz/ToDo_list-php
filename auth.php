<?php
include_once ('bootstrap/init.php');
include_once (BASE_PATH . "/libs/lib-auth.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_GET['action'];
    $param = $_POST;
    if($action == 'register'){
        $result = register($_POST);
        if(!$result){
            message("Error: an error in registeration!");
        }else{
            message("Register is completed, welcome to your todo list");
        }
    }elseif ($action == 'login'){
        $result = login($param['email'],$param['password']);
        if(!$result){
            message("Error: email or password is incorrect!");
        }
    }
}

include('tpl/tbl-auth.php');

