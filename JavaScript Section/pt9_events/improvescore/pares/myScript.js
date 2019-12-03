var h1 = rng(5,0);
var h2 = rng(5,0);
var total = h1+h2;
var pares_win = total % 2 == 0;
console.log('h1 :', h1);
console.log('h2 :', h2);
console.log('total :', total);
console.log('pares_win :', pares_win);
if (pares_win) {
    document.getElementById("res_1").innerHTML = "<img src='img/gana.svg' alt='Victoria'>";
    document.getElementById("res_2").innerHTML = "<img src='img/pierde.svg' alt='Derrota'>";
} else {
    document.getElementById("res_1").innerHTML = "<img src='img/pierde.svg' alt='Derrota'>";
    document.getElementById("res_2").innerHTML = "<img src='img/gana.svg' alt='Victoria'>";
}
document.getElementById("han_1").innerHTML = handSet(h1);
document.getElementById("han_2").innerHTML = handSet(h2);


/**
 * This function returns a number between the maximum and minimum given
 * @param {number} max Maximum number possible
 * @param {number} min Minimum number possible
 */
function rng(max, min) {
    return Math.floor(Math.random() * max) + min;
}

/**
 * This function returns a string with the image of the appropiate hand
 * @param {number} num Number of fingers
 * @returns {string} String with the image of the hand
 */
function handSet(num) {
    switch (num) {
        default:
            return "<img src='img/0.svg' alt='0'>";
        case 1:
            return "<img src='img/1.svg' alt='1'>";
        case 2:
            return "<img src='img/2.svg' alt='2'>";
        case 3:
            return "<img src='img/3.svg' alt='3'>";
        case 4:
            return "<img src='img/4.svg' alt='4'>";
        case 5:
            return "<img src='img/5.svg' alt='5'>";
    }
}