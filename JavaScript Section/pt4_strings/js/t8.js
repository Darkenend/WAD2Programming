let userString = prompt("Write something");
let userStringArray = userString.split("");
console.log(userStringArray);
let endString = "";
for (let i = 0; i < userStringArray.length ; i++) {
    console.log(i);
    console.log(userStringArray[userStringArray.length-(i+1)]);
    endString += userStringArray[userStringArray.length-(i+1)];
}
alert("The end result is: "+endString);