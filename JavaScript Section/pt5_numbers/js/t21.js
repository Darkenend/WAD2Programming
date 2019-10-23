let n1 = parseInt(prompt("Insert the First Number:"));
while (isNaN(n1)) {
    n1 = parseInt(prompt("ERROR. Insert the First Number:"));
}
let n2 = parseInt(prompt("Insert the Second Number:"));
while (isNaN(n2)) {
    n2 = parseInt(prompt("ERROR. Insert the Second Number:"));
}
if (checkRange(n1) || checkRange(n2)) {
    alert("There's a number between 50 and 99");
} else {
    alert("There ain't a number between 50 and 99");
}

function checkRange(myNumber) {
    return myNumber > 49 && myNumber < 100;
}