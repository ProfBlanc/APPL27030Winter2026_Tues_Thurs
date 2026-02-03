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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id='myForm' method='get' >
<legend>
    Starting Number
</legend>
<input type="number" name="start" min=1 max=100 />
<br/>
<br/>
<legend>
    Ending Number
</legend>
<input type="number" name="end" min=1 max=100 />
<br/>
<br/>
<legend>
    Stepping Number
</legend>
<input type="number" name="step" min=1 max=5 />
<br/>
<br/>
<input type="submit" name="submit" value="Submit" />
</form>
    
<div id="output"></div>

</body>
</html>