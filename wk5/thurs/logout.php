<?php
session_start();
session_destroy();
header("Location: login.php?error=You+have+been+logged+out");
exit;
