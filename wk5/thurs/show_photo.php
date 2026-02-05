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

    <?php include 'nav_bar.php';?>


    <img src="<?php echo $path; ?>"
         style="width:100%; border-radius:4px;">
</div>

</body>
</html>
