<?php
include_once ('bootstrap/init.php');
include_once (BASE_PATH . "/libs/lib-auth.php");

$home_url = site_url();
//check data is send by post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_GET['action'];
    $param = $_POST;
//    check data from register form
    if($action == 'register'){
        $result = register($_POST);
        if(!$result){
            message("Error: an error in registeration!");
        }else{
            message("Register is completed, welcome to your todo list . <br>
                            <a href='$home_url/auth.php'> Please Login</a>");
        }
//        check data from login form
    }elseif ($action == 'login'){
        $result = login($param['email'],$param['password']);
        if(!$result){
            message("Error: email or password is incorrect!");
        }else{
            redirect(site_url());
         }
    }
}

include('tpl/tbl-auth.php');

