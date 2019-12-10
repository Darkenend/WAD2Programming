var count = 1;
var tableparent = document.getElementById("table");
for (var i = 0; i < 100; i++) {
    var row = document.createElement("tr");
    for (var j = 0; j < 100; j++) {
        var division = document.createElement("td");
        var inner = document.createTextNode(parseInt(count));
        division.appendChild(inner);
        row.appendChild(division);
        count++;
    }
    tableparent.appendChild(row);
}

function mainHandler() {
    var elements = document.getElementsByTagName("td");
    for (var i = 0; i < elements.length; i++) {
        var currentelement = elements[i];
        if (isAlmostPrime(parseInt(currentelement.innerHTML))) currentelement.style.backgroundColor = "yellow";
    }
}

/**
 * This function checks if a number is almost prime
 * @param {number} n Number to check if it's almost prime
 * @returns {boolean} The number is/isn't prime
 */
function isAlmostPrime(n) {
    var divisions = 0;
    if (isPrime(n)) return false;
    for (var i = 1; i <= n; i++) if (n % i == 0) divisions++;
    if (divisions == 3) return true;
    else return false;
}
/**
 * A function that checks quickly if a number is prime or not
 * @param {number} n Number that we want to check if it's prime or not
 */
function isPrime (n) {
    if (n == 1) return false;
    if (n == 2) return true;
    /**
     * An integer is prime if it is not divisible by any prime less than or equal to its square root
     **/
    var q = Math.floor(Math.sqrt(n));
    for (var i = 3; i <= q; i+=2) {
        if (n % i == 0) return false;
    }
    return true;
}