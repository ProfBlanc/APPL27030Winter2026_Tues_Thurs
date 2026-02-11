<?php

session_start();
require_once 'connection_pdo.php'; // include connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute query to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, username, password FROM login WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
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
