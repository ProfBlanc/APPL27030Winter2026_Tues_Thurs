<?php

session_start();

$token = $_SESSION['csrf_token'] ?? "";
$post_token = $_POST['csrf_token'] ?? "";

if(!isset($_POST['submit'])){
    header("location: login.php?error=Form+Submission+Error");
    exit();
}

if(empty($token) || empty($post_token) || $token != $post_token){
    header("location: login.php?error=Bad+Request+We+Are+Proctected+Against+CSRF!");
    exit();
}

$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);

if(empty($email) || empty($password)){
    header("location: login.php?error=Username/Password+Error");
    exit();
}

if($email == "user@email.com" && $password=="pass"){
    $_SESSION['is_logged_in'] = true;
    header("location: dashboard.php");
}
else{
    header("location: login.php?error=Incorrect+Username+and/or+Password");
}