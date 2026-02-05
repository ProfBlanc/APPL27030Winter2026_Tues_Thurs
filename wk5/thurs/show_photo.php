<?php
require 'auth_check.php';

if (!isset($_GET['img'])) {
    header("Location: dashboard.php");
    exit;
}

$image = basename($_GET['img']);
$path = 'uploads/' . $image;

if (!file_exists($path)) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Photo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>View Photo</h1>

    <div class="nav">
        <a href="dashboard.php">Dashboard</a>
        <a href="upload_photo.php">Upload Photo</a>
        <a href="logout.php">Logout</a>
    </div>

    <img src="<?php echo $path; ?>"
         style="width:100%; border-radius:4px;">
</div>

</body>
</html>
