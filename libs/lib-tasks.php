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

function addFolders($folder_name){
    global $pdo;
    $current_user_id = getCurrentUserId();
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

}

function addTasks(){

}

function deleteTask(){

}