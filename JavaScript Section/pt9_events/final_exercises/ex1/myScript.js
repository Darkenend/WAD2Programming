/**
 * This function updates on real time the position of the mouse on the screen
 * @param event Event causing the update of the mouse position
 */
function handleMouseMove(event) {
    // IE Compatibility
    event = event || window.event;
    // Update HTML to display the position of the mouse
    document.getElementById("x").innerHTML = "X: " + event.screenX;
    document.getElementById("y").innerHTML = "Y: " + event.screenY;
}