<?php
require 'auth_check.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = mime_content_type($_FILES['photo']['tmp_name']);

        if (!in_array($fileType, $allowedTypes)) {
            $message = 'Only JPG, PNG, and GIF images are allowed.';
        } else {
            $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $newName = uniqid() . '.' . $ext;
            $uploadPath = 'uploads/' . $newName;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath)) {
                $message = 'Image uploaded successfully!';
            } else {
                $message = 'Upload failed.';
            }
        }
    } else {
        $message = 'Please select an image.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Photo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Upload Photo</h1>

    <div class="nav">
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </div>

    <?php if ($message): ?>
        <div class="error"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="photo" required>
        <button type="submit">Upload</button>
    </form>
</div>

</body>
</html>
