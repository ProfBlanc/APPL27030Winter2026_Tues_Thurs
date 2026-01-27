let fruits = [];

fruits.push("Apple", "Pear", "Cherry");
fruits.push("Date");
fruits.unshift("Clementines")
let removedItem = fruits.pop();

let firstItemOfArrayRemoved = fruits.shift();


fruits.filter(v => v.length <= 4)

fruits.map( function(v){ return v + "--fruit"})

fruits.map( (v) => v + "--fruit")