let answer = prompt("Enter a positive number");
//determine if user inputted positive number
if(isNaN(answer)){
    alert("Input is NOT a number");
}
else{
let num = parseInt(answer);
if(num > 0){
    let i = 0;
    while(i <= num){
        document.write(i, "<br/>");
        i+= 1;// i++;
    }
}
else{
    alert("Number is not positive")
}
}
