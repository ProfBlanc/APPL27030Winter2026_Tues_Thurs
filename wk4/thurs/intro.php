<?php
echo "hello world";
print(" everyone");


$name = "Ben";
$age = 100;
$temperature = 10.5;
$isHavingFun = true;
$teams = ["Maple Leafs", "Raptors", "Rock", "Toronto FC"];
# this is a single-line comment
//this is also a single-line comment

/* this is a multi
line
comment
*/
$title = "My PHP Page";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
</head>
<body>
   <p>
    <?php
        echo $name;
        echo "<br/>";
        echo $age;
        echo "<br/>";
        echo $temperature;
    ?>
   </p> 
</body>
</html>