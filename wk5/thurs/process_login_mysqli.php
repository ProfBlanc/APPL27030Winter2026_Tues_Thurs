<?php

session_start();
require_once 'connection_mysqli.php'; // include connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prevent SQL injection by using prepared statements
    $stmt = $conn->prepare("SELECT id, username, password FROM login WHERE username = ? and password = ?");
    $stmt->bind_param("s", $username); //s=string,i=wholenum,d=num with decimal
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $db_username, $db_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $db_password)) {
        // Use the result values directly instead of $user
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $db_username;
        $_SESSION['logged_in'] = true;
        $_SESSION['is_admin'] = strcmp($db_username, "admin") === 0 ? true : false;

        header("Location: dashboard.php"); // Redirect to a welcome page after successful login
        exit;
    } else {
        header("location: login.php?error=Invalid+username+or+password!");
    }
}
?>
