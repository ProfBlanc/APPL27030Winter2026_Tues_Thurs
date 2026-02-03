<?php
session_start();
//generate a token
// pass this token to my session variable
//pass this token as a hidden field
// in process page, check if values are set
$token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $token;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        #error{
            height: 1.5em;
            background: red;
            text-align: center;
            color: white;
        }
        </style>

</head>
<body>
<?php
if(filter_input(INPUT_GET, "error", FILTER_DEFAULT)){
    echo "<div id=error>".$_GET['error']."</div>";
}
?>
<form method="post" action="process_login.php" novalidate>

<legend>
    Email
</legend>
<input type="email" name="email" />
<br/>
<br/>
<legend>
    Password
</legend>
<input type="password" name="password" />
<br/>
<br/>
<input type="hidden" name="csrf_token" value="<?=$token;?>">
<input type="submit" name="submit" value="Submit" />

</form>



</body>
</html>