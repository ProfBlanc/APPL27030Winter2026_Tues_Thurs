let starting = parseInt(prompt("Enter starting number: "));
let ending = parseInt(prompt("Enter ending number: "));

if(starting < ending){

    for(let i= starting; i <= ending; i++){
        document.write(i, "<br/>");
    }
}
else{
    alert("Starting Number is NOT less than ending number");
}
