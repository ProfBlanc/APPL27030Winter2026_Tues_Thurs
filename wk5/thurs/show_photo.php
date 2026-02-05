<?php include 'common_photo_code.php';?>
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
         <a href="delete_photo.php?img=<?=$image;?>" class='del_btn'>Delete</a>
</div>

</body>
</html>
