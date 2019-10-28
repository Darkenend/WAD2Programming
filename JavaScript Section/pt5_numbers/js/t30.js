let myArray = [];

for (let i = 0; i < 4; i++) {
    myArray[i] = parseInt(prompt("Insert a number ("+(i+1)+"/4)"));
    while (isNaN(myArray[i])) {
        myArray[i] = parseInt(prompt("ERROR NOT A NUMBER. Insert a number ("+(i+1)+"/4"));
    }
    console.log(myArray);
}
for (let i = 0; i < 4; i++) {
    myArray[i] = Math.max.apply(null, myArray);
}
console.log("THE END ONE");
console.log(myArray);
alert("The numbers are "+myArray[0]+" "+myArray[1]+" "+myArray[2]+" "+myArray[3]);