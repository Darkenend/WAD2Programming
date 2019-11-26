const AUDIODEATH = new Audio('death.ogg');
const AUDIOCOIN = new Audio('moneda.ogg');
const AUDIOGAMEOVER = new Audio('gameover.mp3');
var lives = 0;
var score = 0;
var timeout = 10000;
var level_up = true;
var remainingBloc = 3;
var intervalid;


/**
* This is the main handler of the game.
*/
function main() {
    document.getElementById("addLive").disabled = true;
    fillDeath();
    setBlue();
    intervalid = setInterval(function(){
        removeLife();
    }, timeout);
}

/**
* This function sets in blue one of the squares in the main game
*/
function setBlue() {
    var num = rng(12, 1).toString();
    while (document.getElementById(num).classList.contains("target")) {
        num = rng(12, 1).toString();
    }
    var working_bloc = document.getElementById(num);
    if (working_bloc.classList.contains("trap")) {
        working_bloc.classList.replace("trap", "target");
        working_bloc.removeEventListener("mouseover", removeLife);
    }
    else working_bloc.classList.add("target");
    working_bloc.addEventListener("mouseover", completeBloc, false);
}

/**
* This function handles the objective of the game
* @param {event} event Caused when you mouse over a blue bloc
*/
function completeBloc(event) {
    // IE compatibility
    var myEvent = event || window.event;
    var target = myEvent.target;
    target.classList.replace("target", "trap");
    target.removeEventListener("mouseover", completeBloc);
    target.addEventListener("mouseout", setTrap)
    console.log("Scored!");
    score++;
    remainingBloc--;
    document.getElementById("score").innerHTML = "Score: "+score;
    document.getElementById("hunted").innerHTML = "Hunted: "+2-remainingBloc;
    target.classList.replace("target", "trap");
    target.removeEventListener("mouseover", completeBloc);
    target.addEventListener("mouseout", setTrap);
    if (score % 3 == 0 && timeout > 3000) {
        timeout -= 1000;
        level_up = true;
        document.getElementById("hunted").style.display = "block";
    }
    if (score < 3) {
        setBlue();
    }
    if (level_up && remainingBloc == 0) {
        setBlue();
        setBlue();
        remainingBloc = 2;
        document.getElementById("hunted").innerHTML = "Hunted: "+0;
    }
    console.log('remainingBloc :', remainingBloc);
    console.log("Clearing interval: "+intervalid);
    clearInterval(intervalid);
    intervalid = setInterval(function(){
        removeLife();
    }, timeout);
    console.log("Set interval "+intervalid+" with timer: "+timeout);
}

function setTrap() {
    // IE compatibility
    var myEvent = event || window.event;
    var target = myEvent.target;
    target.addEventListener("mouseover", removeLife, false);
}

/**
* This function sets the minefield in the red squares
*/
function fillDeath() {
    for (var i = 1; i < 13; i++) {
        var xd = i.toString();
        document.getElementById(xd).classList.add('trap');
        document.getElementById(xd).addEventListener("mouseover", removeLife, false);
    }
}

/**
* Generates a number between the specified minimum and the specified maximum
* @param {number} maximum Maximum value that the number can have
* @param {number} minimum Minimum value that the number can have
* @returns {number} Number generated randomly between `minimum` and `maximum`
*/
function rng(maximum, minimum) {
    return Math.floor(Math.random() * maximum)+minimum;
}

/**
* This function adds one life.
*/
function addLife() {
    lives++;
    document.getElementById("lives").innerHTML = "Lives Left: "+lives;
    AUDIOCOIN.play();
}

/**
* This function removes one life.
*/
function removeLife() {
    console.log("YOU DIED");
    lives--;
    document.getElementById("lives").innerHTML = "Lives Left: "+lives;
    AUDIODEATH.play();
    if (lives < 1) endGame();
}

/**
 * This function handles the end of the game.
 */
function endGame() {
    console.log("YOU LOSE");
    AUDIOGAMEOVER.play();
    for (var i = 1; i < 13; i++) {
        var xd = i.toString();
        var myElement = document.getElementById(xd);
        myElement.className = "bloc end";
        var clone = myElement.cloneNode(true);
        myElement.parentNode.replaceChild(clone, myElement);
    }
    clearInterval(intervalid);
    console.log("Clearing interval: "+intervalid);
    document.getElementById('addLive').disabled = false;
}