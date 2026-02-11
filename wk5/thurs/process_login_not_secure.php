<?php

session_start();
require_once 'connection_mysqli.php'; // include connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vulnerable SQL query, user input is directly included
    $query = "SELECT id, username, password FROM login WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    // If the query returns a row, login is successful
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['logged_in'] = true;
        $_SESSION['is_admin'] = strcmp($user['username'], "admin") === 0 ? true : false;


        header("Location: dashboard.php"); // Redirect to a welcome page after successful login
        exit;
    } else {
        header("location: login.php?error=Invalid+username+or+password!");
    }
}
?>
