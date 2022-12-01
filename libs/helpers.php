<?php
function diePage($msg){
    echo "<div>$msg</div>";
    die();
}
function isAjaxRequest(){
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
//    request is ajax
        return true;
    }else{
        return false;
    }};