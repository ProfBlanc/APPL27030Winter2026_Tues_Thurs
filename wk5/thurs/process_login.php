<?php
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';


$validUser = 'admin';
$validPass = 'password123';

if ($username === $validUser && $password === $validPass) {
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit;
} else {
    header("Location: login.php?error=Invalid+username+or+password");
    exit;
}
