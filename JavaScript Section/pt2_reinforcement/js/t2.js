// Get info
let conversion = confirm("Press OK to convert from C to F, cancel for the opposite");
let temperature = parseFloat(prompt("Insert the temperature to convert in number"));
// Make sure it's a proper number
while (isNaN(temperature)) {
    temperature = parseFloat(prompt("Insert the temperature to convert in number"));
}
if (conversion) {
    alert("The Temperature is "+celsiusToFahrenheit(temperature)+"F");
} else {
    alert("The Temperature is "+fahrenheitToCelsius(temperature)+"C");
}

/**
 * Converts temperature in Celsius to Fahrenheit
 * @param temp Temperature in Celsius
 * @returns {number} Temperature in Fahrenheit
 */
function celsiusToFahrenheit(temp) {
    return temp / 5 * 9 + 32;
}

/**
 * Converts temperature in Fahrenheit to Celsius
 * @param temp Temperature in Fahrenheit
 * @returns {number} Temperature in Celsius
 */
function fahrenheitToCelsius(temp) {
    return 5 * (temp - 32) / 9;
}