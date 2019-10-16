const START = "El";
let userString = prompt("Write something");
if (checkString(userString)) {
    alert(userString);
} else {
    alert(START+userString);
}

function checkString(checked) {
    return checked.substring(0, 2) === START;
}