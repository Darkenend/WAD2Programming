let base = parseInt(prompt("Insert base of triangle"));
let height = parseInt(prompt("Insert height of triangle"));
while (isNaN(base)) {
    base = parseInt(prompt("Insert base of triangle as an integer"));
}
while (isNaN(height)) {
    height = parseInt(prompt("Insert height of triangle as an integer"));
}
alert("The area of the triangle is "+((base*height)/2));