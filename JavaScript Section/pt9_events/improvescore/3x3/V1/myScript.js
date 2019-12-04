var intervalID = 0;
var intervalTime = 2000;
document.addEventListener("keydown", keyHandler, false);

/**
* This function starts the game
*/
function startGame() {
    intervalID = setInterval(function() {
        var color = "rgb("+rng(255, 0)+","+rng(255,0)+","+rng(255,0)+")";
        var xd = document.getElementsByClassName('bloc');
        if (xd.length == 0) {
            xd = document.getElementsByClassName('bloc-lock3');
            if (xd.length == 0) {
                xd = document.getElementsByClassName('bloc-lock2');
            }
        }
        for (let i = 0; i < xd.length; i++) {
            xd[i].style.backgroundColor = color;
            xd[i].addEventListener("dblclick", setBlack, false);
        }
        if (xd.length == 0) {
            clearInterval(intervalID);
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
        setLockBlack();
        break;
        case "KeyS":
        setOrange();
        break;
    }
}

/**
* This function sets the lock on the keys that have been doubleclicked
* @param {Event} event Event to handle which has been doubleclicked
*/
function setBlack(event) {
    var myEvent = event || window.event;
    var id = myEvent.target.id;
    document.getElementById(id).className = "bloc-lock";
    document.getElementById(id).removeAttribute("style");
}

/**
 * This function sets all blocs on black until the B key is lifted
 */
function setLockBlack() {
    clearInterval(intervalID);
    document.removeEventListener("keydown", keyHandler);
    var xd = document.getElementsByClassName('bloc');
    while (xd.length) {
        xd[0].removeAttribute('style');
        xd[0].classList.replace('bloc', 'bloc-lock1');
    }
    document.addEventListener("keyup", resetLockBlack);
}

/**
 * This function resets the black blocs that haven't been locked so far
 * @param {Event} event Event to handle which key is lifted and act accordingly
 */
function resetLockBlack(event) {
    var myEvent = event || window.event;
    var xd = document.getElementsByClassName('bloc-lock1');
    if (myEvent.code == "KeyB") {
        while (xd.length) {
            xd[0].classList.replace('bloc-lock1', 'bloc');
        }
        document.addEventListener("keydown", keyHandler, false);
        document.removeEventListener('keyup', resetLockBlack);
        startGame();
    }
}

/**
 * This function sets the squares on yellow for 5 seconds and then restarts the random changes
 */
function setYellow() {
    var bool_help = false;
    var elements = document.getElementsByClassName("bloc");
    clearInterval(intervalID);
    intervalID = setInterval(function() {
        while (elements.length) {
            elements[0].removeAttribute("style");
            elements[0].classList.replace("bloc", "bloc-lock3");
        }
        if (bool_help) {
            clearInterval(intervalID);
            console.log('intervalID :', intervalID);
            startGame();
        } else {
            bool_help = true;
        }
    }, 5000);
}

/**
 * This function sets the squares orange 1 by 1 and then stops the game
 */
function setOrange() {
    var elements = document.getElementsByClassName('bloc');
    var lock = 'bloc-lock2';
        var secondInterval = setInterval(function(){
            elements[0].removeAttribute("style");
            elements[0].classList.replace("bloc", lock);
            if (elements.length == 0) {
                clearInterval(secondInterval);
                clearInterval(intervalID);
            }
        }, 1000);
}

/**
* This function adds one second to the interval timer
*/
function addSecond() {
    if (intervalTime < 10000) {
        intervalTime += 1000;
    }
}

/**
* This function removes one second from the interval timer
*/
function removeSecond() {
    if (intervalTime > 1000) {
        intervalTime -= 1000;
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