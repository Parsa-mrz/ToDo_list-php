<?php
defined('BASE_PATH') OR die("Permision Denied!");

function diePage($msg){
    echo "<div>$msg</div>";
    die();
}
function message($msg){
    echo "<div style='display: inline-block; padding: 16px; z-index: 9999; position: relative; border-radius: 0 10px 10px 0; background: #969696; color: #fff;'>$msg</div>";
}
function isAjaxRequest(){
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
//    request is ajax
        return true;
    }else{
        return false;
    }};
function dd($var){
    echo "<pre style='color: red; z-index: 999; background: #fff; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid red;'>";
    var_dump($var);
    echo "</pre>";
}
function site_url($uri = ''){
    return BASE_URL . $uri;
}

function redirect($url){
    header("Location: $url");
    die();
}