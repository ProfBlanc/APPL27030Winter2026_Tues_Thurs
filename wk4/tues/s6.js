
let d1 = document.getElementById("d1");

d1.innerHTML = "<h1>Hello</h1><h2>There</h2>";

let divs = document.getElementsByTagName("div");

let selectors = document.querySelectorAll("div");

for(let div of selectors){

    div.innerText = "This is a secure way of adding content via javascript";

}