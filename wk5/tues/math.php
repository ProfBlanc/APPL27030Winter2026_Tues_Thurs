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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="myForm">
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
        <div id="output"></div>
        

</form>
</body>
</html>    