<?php

require_once 'connection_mysqli.php'; // include connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prevent SQL injection by using prepared statements
    $stmt = $conn->prepare("INSERT INTO login (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        header("location: login.php?error=Registration+successful!");
    } else {
        header("location: login.php?error=Error+Unknown+Registraion+Error");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

<h2>Register</h2>
<?php include 'nav_not_logged_in.php';?>

<form method="POST" action="registration_mysqli.php">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Register</button>
</form>
</div>
</body>
</html>
