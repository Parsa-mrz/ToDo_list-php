<?php



//**** Folder Function ****
function getFolders(){
    global $pdo;
    $current_user_id = getCurrentUserId();
    $query ='SELECT * FROM Todo.folders WHERE user_id = ?';
    $statement = $pdo->prepare($query);
    $statement->execute([$current_user_id]);
    $folders = $statement->fetchAll();
    return $folders;
}

function addFolders($data){

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

}

function addTasks(){

}

function deleteTask(){

}