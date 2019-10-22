let userString = prompt("Insert a string:");
while (userString.length === 1) {
    userString = prompt("The string isn't long enough, insert a longer one:");
}
let endString = userString.charAt(userString.length-1)+userString.substring(1, userString.length-1)+userString.charAt(0);
alert("The end result is: "+endString);