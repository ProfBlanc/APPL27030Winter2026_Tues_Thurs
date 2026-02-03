<!--
Create a form with fields
    Num 1 input type of number
    Operator: either +, -, *, / (select & option)
    Num 2: input type of number
    submit button

Create an output div to store the result of calculation
    output to be "num1 Operator num2 = result"

    Using PHP code, determine if user submitted the form
    validate nums as numerical input
    only allow 4 operators are choices for operator
    calculate result (using if or switch statements)
-->
<?php
$output = "";
$error = "";


function validate_number($field_name){
    return filter_input(INPUT_POST, $field_name, FILTER_VALIDATE_INT);
}

function validate_operator($entry){
    return in_array($entry, ["+", "-", "*", "/"]);
}

if(isset($_POST['submit'])){

    $n1 = validate_number("n1");
    $n2 = validate_number("n2");
   if(validate_operator($_POST['operator']) && !empty($n1) && !empty($n2)){
    $operator = $_POST['operator'];

    $output .= "$n1 $operator $n2 = ";
    switch($operator){
        case "+":
            $output .= $n1 + $n2;
            break;
        case "-":
            $output .= $n1 - $n2;
            break;
        case "*":
            $output .= $n1 * $n2;
            break;
        default: $output .= $n1 / $n2; break;
    }

   }
   else{
    $error = "Valid Input";
   }

    var_dump($n1);
    var_dump($n2);
    var_dump($operator);
    var_dump($output);
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        if(!empty($error)){
            echo "<div id='error'>$error</div>";
        }
    ?>
    <form id="myForm" method="post">
        <legend>Number 1</legend>
        <input type="number" name="n1" value=""/>
        <br/><br/>
        <legend>Operator</legend>
        <select name="operator">
            <option value="+">+ (Add)</option>
            <option value="-">- (Substract)</option>
            <option value="*">* (Multiply)</option>
            <option value="/">/ (Divide)</option>
        </select>
        <br/><br/>
        <legend>Number 2</legend>
        <input type="number" name="n2" value=""/>
        <br/><br/>
        <input type="submit" name="submit" value="Submit">
        

</form>
        <div id="output"><?=$output;?></div>
</body>
</html>    