let extremes = [], numbers = [];
alert("Next, you're gonna be asked to input 5 numbers between 50 and 100");
for (let i = 0; i < 5; i++) {
    numbers[i] = parseInt(prompt("Insert the number ("+(i+1)+"/5)"));
    while (numbers[i] < 50 || numbers[i] > 100 || isNaN(numbers[i])) {
        numbers[i] = parseInt(prompt("ERROR. Insert the number ("+(i+1)+"/5)"));
    }
    if (i === 0) {
        extremes[0] = numbers[i];
        extremes[1] = numbers[i];
    }
    if (numbers[i] > extremes[0]) extremes[0] = numbers[i];
    if (numbers[i] < extremes[1]) extremes[1] = numbers[i];
    console.log("Debug — Run "+i);
    console.log(numbers);
    console.log(extremes);
}
alert("The numbers at the extremes are: "+extremes[0]+" & "+extremes[1]);