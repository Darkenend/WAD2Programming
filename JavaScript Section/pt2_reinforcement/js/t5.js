let n1 = parseInt(prompt("Insert a first number"));
let n2 = parseInt(prompt("Insert a second number"));
while (isNaN(n1)) parseInt(prompt("Insert a first number"));
while (isNaN(n2)) parseInt(prompt("Insert a second number"));
if (checkNumbers(n1, n2)) {
    alert("Either one of them is 50 or they sum 50");
} else {
    alert("They're not 50 nor sum 50");
}

/**
 * This function checks 2 numbers and if one of them is 50 or they sum 50, returns `true`, otherwise it's `false`
 * @param {number} n1
 * @param {number} n2
 * @return {boolean}
 */
function checkNumbers(n1, n2) {
    if (n1 === 50 || n2 === 50) {
        return true;
    } else return n1 + n2 === 50;
}