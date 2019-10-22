let userString = prompt("Insert a string:");
while (userString.length === 1) {
    userString = prompt("The string isn't long enough, insert a longer one:");
}
let endString = userString.charAt(0)+userString.substring(0, userString.length)+userString.charAt(0);
alert("The end result is: "+endString);