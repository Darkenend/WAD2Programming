var intervalID = 0;
var intervalTime = 2000;
document.addEventListener("keydown", keyHandler, false);

/**
 * This function starts the game
 */
function startGame() {
    intervalID = setInterval(function() {
        var color = "rgb("+rng(255, 0)+","+rng(255,0)+","+rng(255,0)+")";
        var xd = document.getElementsByClassName("bloc");
        for (let i = 0; i < xd.length; i++) {
            xd[i].style.backgroundColor = color;
            xd[i].addEventListener("dblclick", setBlack, false);
        }
        if (xd.length == 0) {
            clearInterval(intervalID);
            console.log("Interval cleared due to no blocs being available");
        }
    }, intervalTime);
}

/**
 * This function reads the key pressed to then execute the proper action
 * @param {Event} event Event that we handle to do the proper action
 */
function keyHandler(event) {
    var myEvent = event || window.event;
    switch (myEvent.code) {
        default:
            console.log("Key not recognized");
            break;
        case "KeyY":
            setYellow();
            break;
        case "KeyR":
            addSecond();
            break;
        case "KeyM":
            removeSecond();
            break;
        case "KeyB":
            // More complex
            break;
        case "KeyS":
            setOrange();
            break;
    }
}

/**
 * This function sets the lock on the keys that have been doubleclicked
 * @param {Event} event 
 */
function setBlack(event) {
    var myEvent = event || window.event;
    var id = myEvent.target.id;
    document.getElementById(id).className = "bloc-lock";
    document.getElementById(id).removeAttribute("style");
    console.log(id+" has been locked");
}

function setYellow() {
    var bool_help = false;
    var elements = document.getElementsByClassName("bloc");
    clearInterval(intervalID);
    intervalID = setInterval(function() {
            for (let i = 0; i < elements.length; i++) {
                elements[i].className = "bloc-lock3";
                elements[i].removeAttribute("style");
            }
            if (bool_help) {
                clearInterval(intervalID);
                console.log('intervalID :', intervalID);
                startGame();
            }
        }, 5000);
}

/**
 * This function adds one second to the interval timer
 */
function addSecond() {
    if (intervalTime < 10000) {
        intervalTime += 1000;
        console.log('intervalTime increased!:', intervalTime);
    }
}

/**
 * This function removes one second from the interval timer
 */
function removeSecond() {
    if (intervalTime > 1000) {
        intervalTime -= 1000;
        console.log('intervalTime decreased!:', intervalTime);
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