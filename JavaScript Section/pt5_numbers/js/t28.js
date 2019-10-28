let myArray = [];

// Loop to fill data
for (let i = 0; i < 5; i++) {
    myArray[i] = parseInt(prompt("Insert the "+(i+1)+" number:"));
    while (isNaN(myArray[i])) {
        myArray[i] = parseInt(prompt("ERROR: IS NOT A NUMBER. Insert the "+(i+1)+" number:"));
    }
}

// Display original
alert("This array's original numbers are: "+myArray[0]+", "+myArray[1]+", "+myArray[2]+", "+myArray[3]+", "+myArray[4]);

// Change data
myArray = moveNumbers(myArray);

// Display changed data
alert("This array's moved numbers are: "+myArray[0]+", "+myArray[1]+", "+myArray[2]+", "+myArray[3]+", "+myArray[4]);

/**
 * Function to move the order of a given array's numbers
 * @param givenArray Array to move the data from it
 * @returns {[*, *, *, *, *]} Array's data moved
 */
function moveNumbers(givenArray) {
    return [givenArray[4], givenArray[0], givenArray[1], givenArray[2], givenArray[3]];
}