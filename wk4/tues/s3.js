//named function
function greet(person, age){
    return "Hello, " + person
    + "! You are " + age + " years old";
}

//function expression
let greet1 = function(person, age){
    return "Hello, " + person
    + "! You are " + age + " years old";
};

let greet2 = (person, age)=> "Hello, " + person
    + "! You are " + age + " years old";


let result = greet("Ben", 100);
alert(result);