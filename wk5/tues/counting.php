<!--
We will create a form with 3 fields
    Starting Number
    Ending Number
    Step Number
    + submit button
- also create a div with id of output

Once user clicks on submit button, php will
    - validate input
    - output the result to screen in div with id output
-->

<?php
$title = "Our Counting App";  //superglobal variables => build-in php vars that start with "$_" and are all caps

//print_r($_GET);

function manually_validate_int($data){

    if(is_numeric($data)){
        return intval($data);
    }
    return 1;
}

$output = "";
$step = $end = $start = "";
if(isset($_GET['submit'])){

  $start = $_GET['start'];
  $end = $_GET['end'];
  $step = $_GET['step'];

  //validate the data
  $start = manually_validate_int($start);
  $end = manually_validate_int($end);
  $step = manually_validate_int($step);

  if($end < $start)
    $end = $start + 1;

  if($step < 1)
    $step = 1;

  $output .= "Counting from $start to $end, incrementing by $step<br/>";

  for($i = $start; $i<= $end; $i+= $step){
    $output .= "$i<br/>";
  }

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
</head>
<body>
<form id='myForm' method='get' >
<legend>
    Starting Number
</legend>
<input type="number" name="start" value="<?=$start;?>" min=1 max=100 />
<br/>
<br/>
<legend>
    Ending Number
</legend>
<input type="number" name="end" value="<?=$end;?>" min=1 max=100 />
<br/>
<br/>
<legend>
    Stepping Number
</legend>
<input type="number" name="step" value="<?=$step;?>" min=1 max=5 />
<br/>
<br/>
<input type="submit" name="submit" value="Submit" />
</form>
    
<div id="output"><?=$output;?></div>

</body>
</html>