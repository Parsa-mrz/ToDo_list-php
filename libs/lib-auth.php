<?php
defined('BASE_PATH') OR die("Permision Denied!");

function isLoggedIn(){
    return isset($_SESSION['login']) ? true : false;
}
//check emai l of user
function getUserByEmail($email){
    global $pdo;
    $query ='SELECT * FROM Todo.users WHERE email = :email';
    $statement = $pdo->prepare($query);
    $statement->execute([':email' => $email]);
    $records = $statement->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;}

function login($email,$password){
    $user = getUserByEmail($email);
    if(is_null($user)){
        return false;
    }
//    check password
    if (password_verify($password,$user->password)) {
//        loging is successfull
        $user->image = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) );
        $_SESSION['login'] = $user;
        return true;
    }
    return false;
}
//get login user data
function getLoggedInUser(){
    return $_SESSION['login'] ?? null;
}


//add user data to databse
function register($userData){
    global $pdo;
    $pass = password_hash($userData['password'],PASSWORD_BCRYPT);
    $query ="INSERT INTO Todo.users (name,email,password,created_at) values (:name,:email,:password,NOW())";
    $statement = $pdo->prepare($query);
    $statement->execute([':name' => $userData['name'], ':email' => $userData['email'], ':password' => $pass]);
    return $statement->rowCount() ? true : false;
}

//logout user
function logout(){
    unset($_SESSION['login']);
}
