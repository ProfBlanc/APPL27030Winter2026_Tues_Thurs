<?php

require 'auth_check.php';
require 'config.php';

if (!isset($_GET['img'])) {
    header("Location: dashboard.php");
    exit;
}

$image = basename($_GET['img']);
$path = "";
if($_SESSION['is_admin']){
    $subdirs = scandir($upload_path);

    foreach($subdirs as $sd){
        if($sd === "." || $sd === "..")
            continue;
        $sd.= "/";

        if(file_exists($upload_path.$sd.$image)){
            $path = $upload_path.$sd.$image;
            break;
        }
    }
}
else{
    $path = $upload_path . $image;
}


if (!file_exists($path)) {
    header("Location: dashboard.php");
    exit;
}
?>