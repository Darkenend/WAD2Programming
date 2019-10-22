let userString = prompt("Write a string:");
let endString;
if (userString.length < 3) {
    endString = userString.toUpperCase();
} else {
    endString = userString.substring(0, 3).toLowerCase();
}
alert("The final result is: "+endString);