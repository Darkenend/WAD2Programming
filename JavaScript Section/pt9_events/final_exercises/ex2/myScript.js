let id;

/**
 * This function starts the greeting loop
 */
function handleSaludos() {
    id = setInterval(function () {
        alert("Buenos dias!");
    }, 5000);
}

/**
 * This function ends the loop.
 */
function endSaludos() {
    clearInterval(id);
}