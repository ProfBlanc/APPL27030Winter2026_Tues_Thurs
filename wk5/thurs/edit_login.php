<?php
session_start();
require_once 'connection_mysqli.php'; // include connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Prevent SQL injection by using prepared statements
    $stmt = $conn->prepare("UPDATE login SET username = ?, email = ? where id = ?");
    $stmt->bind_param("ssi", $username, $email, $_SESSION['user_id']);

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        header("location: dashboard.php?error=Update+successful!");
    } else {
        header("location: dashboard.php?error=Error+Unknown+Update+Error");
    }
}



    $stmt = $conn->prepare("SELECT username, email FROM login 
    WHERE id = ? and username = ?");
    $stmt->bind_param("is", $_SESSION['user_id'], $_SESSION['username']); 
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($db_username, $db_email);
    $stmt->fetch();

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

<h2>Edit Login</h2>
<?php include 'nav_bar.php';?>

<form method="POST">
    <label for="username">Username:</label><br>
    <input type="text" value="<?=$db_username;?>" id="username" name="username" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" value="<?=$db_email;?>" id="email" name="email" required><br><br>

    <button type="submit">Edit</button>
</form>
</div>
</body>
</html>
