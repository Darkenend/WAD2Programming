var turn = 0;
var hand = [0, 0];
var score = [0, 0];
var element = [document.getElementById('han_1'), document.getElementById('han_2')];
resetGame();

/**
 * This function resets the game
 */
function resetGame() {
    document.addEventListener("keydown", readNumber);
    document.getElementById("res_1").innerHTML = "";
    element[0].innerHTML = handSet(0);
    element[1].innerHTML = handSet(0);
    document.getElementById("res_2").innerHTML = "";
    turn = 0;
    hand = [0, 0];
    document.getElementById('reset').disabled = true;
}

/**
 * This function reads a number and assigns it to the player's turn
 * @param {Event} event Event which we use to read the number that the user input
 */
function readNumber(event) {
    var myEvent = event || window.event;
    var num = -1;
    switch (parseInt(myEvent.key)) {
        default:
            num = -1;
            break;
        case 1:
            num = 1;
            break;
        case 2:
            num = 2;
            break;
        case 3:
            num = 3;
            break;
        case 4:
            num = 4;
            break;
        case 5:
            num = 5;
            break;
        case 0:
            num = 0;
            break;
    }
    if (num > -1) {
        hand[turn] = num;
        if (turn == 0) turn++;
        else endGame();
    }
}

/**
* This function handles the end game of the match.
*/
function endGame() {
    document.removeEventListener('keydown', readNumber);
    var total = hand[0]+hand[1];
    var pares_win = total % 2 == 0;
    var interval = setInterval(function() {
        element[0].innerHTML = handSet(hand[0]);
        element[1].innerHTML = handSet(hand[1]);
        clearInterval(interval);
    }, 1000);
    var secondInterval = setInterval(function() {
        if (pares_win) {
            document.getElementById("res_1").innerHTML = "<img src='img/gana.svg' alt='Victoria'>";
            document.getElementById("res_2").innerHTML = "<img src='img/pierde.svg' alt='Derrota'>";
        } else {
            document.getElementById("res_1").innerHTML = "<img src='img/pierde.svg' alt='Derrota'>";
            document.getElementById("res_2").innerHTML = "<img src='img/gana.svg' alt='Victoria'>";
        }
        if (pares_win) score[0]++;
        else score[1]++;
        document.getElementById('score_1').innerHTML = "Jugador 1: "+score[0];
        document.getElementById('score_2').innerHTML = "Jugador 2: "+score[1];
        document.getElementById('reset').disabled = false;
        clearInterval(secondInterval);
    }, 2000);
    
}


/**
* This function returns a number between the maximum and minimum given
* @param {number} max Maximum number possible
* @param {number} min Minimum number possible
*/
function rng(max, min) {
    return Math.floor(Math.random() * max) + min;
}

/**
* This function returns a string with the image of the appropiate hand
* @param {number} num Number of fingers
* @returns {string} String with the image of the hand
*/
function handSet(num) {
    switch (num) {
        default:
        return "<img src='img/0.svg' alt='0'>";
        case 1:
        return "<img src='img/1.svg' alt='1'>";
        case 2:
        return "<img src='img/2.svg' alt='2'>";
        case 3:
        return "<img src='img/3.svg' alt='3'>";
        case 4:
        return "<img src='img/4.svg' alt='4'>";
        case 5:
        return "<img src='img/5.svg' alt='5'>";
    }
}