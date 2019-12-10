/**
 * This function adds a random number to a list
 */
function addRandomNumber() {
    var list = document.getElementById("list");
    var number = rng(1000, 1);
    var element = document.createElement("li");
    var content = document.createTextNode(parseInt(number));
    element.appendChild(content);
    list.appendChild(element);
}

/**
* This function returns a number between the maximum and minimum given
* @param {number} max Maximum number possible
* @param {number} min Minimum number possible
*/
function rng(max, min) {
    return Math.floor(Math.random() * max) + min;
}