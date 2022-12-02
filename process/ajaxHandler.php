<?php
//if (!defined('BASE_PATH')) {
//    echo "Permision Denied!";
//    die();
//}
include_once ('../bootstrap/init.php');

if(!isAjaxRequest()){
    diePage('Invalid Request!');
}
if(!isset($_POST['action']) || empty($_POST['action'])){
        diePage('Invalid Action!');
}
switch ($_POST['action']){
    case 'addFolder':
        echo addFolders($_POST['folderName']);
        break;

    case 'addTask':
        $folder_id = $_POST['folderId'];
        $taskTitle = $_POST['taskTitle'];
        if(!isset($_POST['folderId']) || empty($_POST['folderId'])){
            echo 'Choose Folder To Add Task';
            die();
        }
        echo addTasks($taskTitle,$folder_id);
        break;

    default:
        diePage('Invalid Action!');
}
var_dump($_POST);