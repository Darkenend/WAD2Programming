let userString = prompt("Write a sentence");
let workString = userString.split(" ");
let endString = "";
for (let i = 0; i < workString.length; i++) {
    console.log("Word in: "+workString[i]);
    workString[i] = workString[i].charAt(0).toUpperCase()+workString[i].substring(1, workString[i].length);
    console.log("Word out: "+workString[i]);
    endString += workString[i]+" ";
}
endString.trim();
alert("The result is: "+endString);