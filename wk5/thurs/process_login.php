<?php
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';


// $validUser = 'admin';
// $validPass = 'password123';

$validUsers = ["admin", "user", "ben", "mary", "john"];
$validPasswords = ["pass1", "pass2", "pass3", "pass4", "pass5"];

$isAuthenticated = false;

//if ($username === $validUser && $password === $validPass) {

if(in_array($username, $validUsers)){

    $index = array_search($username, $validUsers);

    $isAuthenticated = $password === $validPasswords[$index];

}

if($isAuthenticated){
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;

    $_SESSION['is_admin'] = strcmp($username, "admin") === 0 ? true : false;

    

    header("Location: dashboard.php");
    exit;
} else {
    header("Location: login.php?error=Invalid+username+or+password");
    exit;
}
