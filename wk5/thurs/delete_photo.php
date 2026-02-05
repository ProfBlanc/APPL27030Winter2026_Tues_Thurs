<?php 
include 'common_photo_code.php';

unlink($path);

header("Location: dashboard.php");

?>
