let userString = prompt("Write something");
let userCharArr = [];
let endString = "";
for (let i = 0; i < userString.length; i++) {
    userCharArr[i] = userString.charCodeAt(i);
    console.log(userCharArr[i]);
    if (userCharArr[i] === 90) {
        userCharArr[i] = 65;
    } else if (userCharArr[i] === 122) {
        userCharArr[i] = 97;
    } else {
        userCharArr[i] += 1;
    }
}
for (let i = 0; i < userCharArr.length; i++) {
    endString += String.fromCharCode(userCharArr[i]);
}
alert("The end result is: "+endString);
