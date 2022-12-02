<?php
defined('BASE_PATH') OR die("Permision Denied!");
//**** Folder Function ****
function getFolders(){
    global $pdo;
    $current_user_id = getLoggedInUser()->id;
    $query ='SELECT * FROM Todo.folders WHERE user_id = ?';
    $statement = $pdo->prepare($query);
    $statement->execute([$current_user_id]);
    $folders = $statement->fetchAll();
    return $folders;
}

function addFolders($folder_name){
    global $pdo;
    $current_user_id = getLoggedInUser()->id;
    $query ="INSERT INTO Todo.folders (name,user_id,created_at) values (:folder_name,:user_id,NOW())";
    $statement = $pdo->prepare($query);
    $statement->execute([':folder_name' => $folder_name, ':user_id' => $current_user_id]);
    return $statement->rowCount();
}

function deleteFolder($delete_folder){
    global $pdo;
    $query ='DELETE FROM Todo.folders WHERE id = ?';
    $statement = $pdo->prepare($query);
    $statement->execute([$delete_folder]);
    return $statement->rowCount();
}

//**** Task Function ****
function getTasks(){
    global $pdo;
    $folder = $_GET['folder_id'] ?? null;
    $folderCondition = '';
    if (isset($folder) and is_numeric($folder)) {
        $folderCondition = "and folder_id = $folder";
    }
    $current_user_id = getLoggedInUser()->id;
    $query ="SELECT * FROM Todo.tasks WHERE user_id = $current_user_id $folderCondition";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $folders = $statement->fetchAll();
    return $folders;
}

function addTasks($taskTile,$folder_id){
    global $pdo;
    $current_user_id = getLoggedInUser()->id;
    $query ="INSERT INTO Todo.tasks (title,folder_id,user_id,created_at) values (:task_title,:folder_id,:user_id,NOW())";
    $statement = $pdo->prepare($query);
    $statement->execute([':task_title' => $taskTile, ':folder_id' => $folder_id, ':user_id' => $current_user_id]);
    return $statement->rowCount();
}

function deleteTask($delete_task){
    global $pdo;
    $query ='DELETE FROM Todo.tasks WHERE id = ?';
    $statement = $pdo->prepare($query);
    $statement->execute([$delete_task]);
    return $statement->rowCount();
}

function doneSwitch($task_id){
    global $pdo;
    $current_user_id = getLoggedInUser()->id;
    $query ='UPDATE Todo.tasks SET is_done = 1 - is_done WHERE user_id = :userID AND id = :taskID';
    $statement = $pdo->prepare($query);
    $statement->execute([':userID' => $current_user_id,':taskID' => $task_id]);
    return $statement->rowCount();
}