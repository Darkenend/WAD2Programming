// Get info
let v1 = parseInt(prompt("Insert a Number"));
let v2 = parseInt(prompt("Insert another Number"));
// Check Variables
while (isNaN(v1)) {
    v1 = parseInt(prompt("Insert a Number"));
}
while (isNaN(v2)) {
    v2 = parseInt(prompt("Insert another Number"));
}

if (v1 === v2) {
    alert("When entering the same number twice, the result is: "+v1*3);
} else {
    alert("When entering 2 different numbers, the result is: "+(v1+v2));
}