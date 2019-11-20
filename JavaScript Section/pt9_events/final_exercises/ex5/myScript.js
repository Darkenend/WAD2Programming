/**
 * Generates a number between 0 and the specified maximum
 * @param number Maximum value that the number can have
 * @returns {number} Number generated randomly between 0 and `maximum`
 */
function rng(maximum) {
    return Math.floor(Math.random() * maximum);
}
