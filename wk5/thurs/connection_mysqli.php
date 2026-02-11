<?php

$servername = "localhost";
$username = "root"; // replace with your MySQL username
$password = "root"; // replace with your MySQL password
$dbname = "web_app"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
