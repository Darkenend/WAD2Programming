let char = "a";
let rest = calcRest();

/**
 * Main software function
 */
function DNICalculator(event) {
    // IE Compatibility
    let myEvent = event || window.event;
    // Storage of data being used
    char = myEvent.key;
    char = char.toLowerCase();
    rest = calcRest();
    // Internal Variables Declared
    let str = "", count = 0;
    // Failsafe for other keys being pressed
    if (rest !== 23) {
        // Main loop that processes the calculation
        for (let i = 1; i < 10000; i++) {
            if (i % 23 === rest) {
                // When a match is found, we increase the count of results, and add it to a string
                count++;
                if (i < 10) {
                    str += "<li>000" + i + char.toUpperCase() + "</li>";
                } else if (i < 100) {
                    str += "<li>00" + i + char.toUpperCase() + "</li>";
                } else if (i < 1000) {
                    str += "<li>0" + i + char.toUpperCase() + "</li>";
                } else {
                    str += "<li>" + i + char.toUpperCase() + "</li>";
                }
            }
        }
        // We update the inner HTML of the title to display the character and how many matches were found
        document.getElementById("title").innerHTML = "DNIs con "+char.toUpperCase()+" — "+count;
    } else {
        // We update the inner HTML of the title to display that there's an invalid key
        document.getElementById("title").innerHTML = "Has presionado una tecla invalida.";
    }
    // We insert the list of results on the list.
    document.getElementById("dni_list").innerHTML = str;
}

/**
 * This function returns a number appropriate to the character given from the DNI
 * @returns {number} Number to calculate the rest of.
 */
function calcRest() {
    switch (char) {
        case "t":
            return 0;
        case "r":
            return 1;
        case "w":
            return 2;
        case "a":
            return 3;
        case "g":
            return 4;
        case "m":
            return 5;
        case "y":
            return 6;
        case "f":
            return 7;
        case "p":
            return 8;
        case "d":
            return 9;
        case "x":
            return 10;
        case "b":
            return 11;
        case "n":
            return 12;
        case "j":
            return 13;
        case "z":
            return 14;
        case "s":
            return 15;
        case "q":
            return 16;
        case "v":
            return 17;
        case "h":
            return 18;
        case "l":
            return 19;
        case "c":
            return 20;
        case "k":
            return 21;
        case "e":
            return 22;
        default:
            char = "";
            return 23;
    }
}