let userNumber = parseInt(prompt("Insert a number"));
while (isNaN(userNumber)) {
    userNumber = parseInt(prompt("Insert a number"));
}
if (userNumber === 19) {
    alert("The difference is 0");
} else if (userNumber > 19) {
    alert("The difference is "+(userNumber-19)*3);
} else {
    alert("The difference is "+(19-userNumber));
}