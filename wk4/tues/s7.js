let indexTracker = 0;
let colors = ["white", "blue", "grey", "red", "black", "yellow"];

let output = document.getElementById("output");
output.innerText = colors[indexTracker];

function nextBtn(){
    indexTracker++;
    if(indexTracker > colors.length)
        indexTracker = 0;
    output.innerText = colors[indexTracker];
}

let prevBtn = function(){ 
    indexTracker--;
    if(indexTracker < 0)
        indexTracker = colors.length - 1;
    output.innerText = colors[indexTracker];

};

document.getElementById("next").addEventListener("click", nextBtn);
document.getElementById("prev").addEventListener("click", prevBtn);

document.getElementById("box").addEventListener(
    "mouseover",
    (ev) => ev.target.style.backgroundColor = colors[indexTracker]
);
