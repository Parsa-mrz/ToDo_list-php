<?php
defined('BASE_PATH') OR die("Permision Denied!");

//**** get user current id ****
function getCurrentUserId(){
//    get login user id
        return 1;
}

function isLoggedIn(){
    return false;
}

function login($user,$password){}




function register($userData){
    global $pdo;
    $pass = password_hash($userData['password'],PASSWORD_BCRYPT);
    $query ="INSERT INTO Todo.users (name,email,password,created_at) values (:name,:email,:password,NOW())";
    $statement = $pdo->prepare($query);
    $statement->execute([':name' => $userData['name'], ':email' => $userData['email'], ':password' => $pass]);
    return $statement->rowCount() ? true : false;
}

