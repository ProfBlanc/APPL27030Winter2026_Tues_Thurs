<?php
require 'auth_check.php';
require 'config.php';
$images = [];
$dir = $upload_path;

if(!file_exists($dir)){
    mkdir($dir);
}

if (is_dir($dir)) {
    $files = scandir($dir);

    if($_SESSION['is_admin']){
        $all_files = [];
        foreach($files as $u_dir){
        if ($u_dir === '.' || $u_dir === '..')
            continue;


            $current_user_path = $upload_path.$u_dir."/";
            $current_user_files = scandir($current_user_path);

            foreach($current_user_files as $u_file){

            if ($u_file === '.' || $u_file === '..')
                continue;

            $all_files[] = explode($upload_path,$current_user_path)[1].$u_file;
            }

        }
        $files = $all_files;
        
        }
    

    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            //$images[] = $file;
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
                <a href="show_photo.php?img=<?php echo urlencode(basename($img)); ?>">
                    <img src="<?php echo $upload_path.htmlspecialchars($img); ?>" alt="">
                </a>
               
                
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
