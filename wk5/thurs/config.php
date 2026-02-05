<?php

$upload_dir = "uploads";

$username = $_SESSION['username'];

$upload_path_user = "$upload_dir/$username/";
$upload_path = $upload_path_user;
if($_SESSION['is_admin']){
    $upload_path = "$upload_dir/";
}