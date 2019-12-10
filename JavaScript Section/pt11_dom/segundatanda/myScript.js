var paused = true;
var color = colorPicker(rng(5,1));
var result_count = 0, score = 0;
var timer = 2000;
var interval = 0, squares = 0;
document.addEventListener('keydown', keyHandler);
document.getElementById("head").innerHTML = "The selected color is: "+color;
startGame();

/**
 * This function makes the game be running
 */
function startGame() {
    paused = false;
    document.getElementById("status").innerHTML = "Running";
    interval = setInterval(function(){
        if (squares < 15) {
            var xd = rng(4,1);
            for (var i = 0; i < xd; i++) {
                var assignID = 'bloc'+rng(6,1);
                var element2 = document.createElement("div");
                element2.classList.add('bloc_in');
                element2.addEventListener('mouseover', shuffleColor);
                bgcolor = colorPicker(rng(5,1))
                element2.style.backgroundColor = bgcolor;
                if (bgcolor == color) result_count++;
                document.getElementById(assignID).appendChild(element2);
                squares++;
            }
        } else {
            clearInterval(interval);
            endGame();
        }
    }, timer);
}

/**
 * This function handles which key has been pressed to either pause or resume the game
 * @param {Event} event Event to handle which key has been pressed
 */
function keyHandler(event) {
    var myEvent = event || window.event;
    switch (myEvent.code) {
        default:
            console.log("Unrecognized key pressed: "+myEvent.code);
            break;
        case "KeyS":
            if (paused) {
                console.log("unpaused");
                var current = document.getElementsByClassName('bloc_in');
                for (var i = 0; i < current.length; i++) {
                    current[i].addEventListener('mouseover', shuffleColor);
                }
                startGame();
            }
            break;
        case "KeyP":
            pauseGame();
            console.log("paused");
            break;
    }
}

/**
* This function deals with the end game procedure, and then starts another game
*/
function endGame() {
    color = colorPicker(rng(5,1));
    document.getElementById("head").innerHTML = "The selected color is: "+color;
    score += result_count;
    document.getElementById("score").innerHTML = "Score: "+score;
    result_count = 0;
    squares = 0;
    if (timer > 500) timer-=250;
    var current = document.getElementsByClassName("bloc_in");
    while (current[0]) current[0].parentNode.removeChild(current[0]);
    startGame();
}

/**
 * This function changes the color of a block which triggers an event
 * @param {Event} event We use the event to locate the block that's been changed
 */
function shuffleColor(event) {
    var myEvent = event || window.event;
    var element = myEvent.target;
    var elementbg = element.style.backgroundColor;
    var newbg = elementbg;
    if (elementbg == color) result_count--;
    console.log('result_count :', result_count);
    while (elementbg == newbg) newbg = colorPicker(rng(5,1));
    element.style.backgroundColor = newbg;
}

/**
 * This function pauses the game
 */
function pauseGame() {
    clearInterval(interval);
    var current = document.getElementsByClassName('bloc_in');
    for (var i = 0; i < current.length; i++) {
        current[i].removeEventListener('mouseover', shuffleColor);
    }
    document.getElementById("status").innerHTML = "Paused";
    paused = true;
}

/**
* This function returns a colour based on a number, results are black, blue, red, green or orange
* @param {number} n A number which dictates which colour we get
* @returns {String} The colour that we're gonna use
*/
function colorPicker(n) {
    switch (n) {
        default: return "orange";
        case 1: return "black";
        case 2: return "blue";
        case 3: return "red";
        case 4: return "green";
    }
}

/**
* This function returns a number between the maximum and minimum given
* @param {number} max Maximum number possible
* @param {number} min Minimum number possible
*/
function rng(max, min) {
    return Math.floor(Math.random() * max) + min;
}