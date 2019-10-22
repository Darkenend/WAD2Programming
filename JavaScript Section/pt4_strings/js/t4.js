let userString = prompt("Insert a string:");
while (userString.length < 4) {
    userString = prompt("The string isn't long enough, insert a longer one:");
}
let endString = userString.substring(userString.length-3, userString.length)+userString.substring(0, userString.length)+userString.substring(userString.length-3, userString.length);
alert("The end result is: "+endString);