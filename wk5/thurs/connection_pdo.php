<?php

$host = 'localhost';
$db = 'web_app'; // replace with your database name
$user = 'root'; // replace with your MySQL username
$pass = 'root'; // replace with your MySQL password

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
