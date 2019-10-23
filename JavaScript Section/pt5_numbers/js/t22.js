let numbers = [];
let min;
for (let i = 0; i < 3; i++) {
    numbers[i] = parseInt(prompt("Insert the number:"));
    while (isNaN(numbers[i])) numbers[i] = parseInt(prompt("ERROR. Insert the number:"));
    if (i === 0) min = numbers[i];
    if (numbers[i] < min) min = numbers[i];
}