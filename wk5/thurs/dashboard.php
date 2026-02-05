<?php
require 'auth_check.php';

$images = [];
$dir = 'uploads';

if(!file_exists($dir)){
    mkdir($dir);
}

if (is_dir($dir)) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $images[] = $file;
            array_push($images, $file);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Dashboard</h1>

    <h2>Hello, <?=ucfirst($_SESSION['username']);?></h2>

    <?php include 'nav_bar.php';?>

    <?php if (empty($images)): ?>
        <p>No photos uploaded yet.</p>
    <?php else: ?>
        <div class="gallery">
            <?php foreach ($images as $img): ?>
                <a href="show_photo.php?img=<?php echo urlencode($img); ?>">
                    <img src="uploads/<?php echo htmlspecialchars($img); ?>" alt="">
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
