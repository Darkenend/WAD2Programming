/**
 * This function sets a background color randomly
 */
function changeColor() {
    let r = rng();
    let g = rng();
    let b = rng();
    document.body.style.backgroundColor = "rgb(" + r + "," + g + "," + b + ")";
}

/**
 * This function returns a number between 0 and 255
 * @returns {number} Randomly generated number
 */
function rng() {
    return Math.floor((Math.random() * 255));
}