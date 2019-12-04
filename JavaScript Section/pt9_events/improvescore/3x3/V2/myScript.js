var free_elements = document.getElementsByClassName('bloc');
addEvents();

function changeBloc(event) {
    var myEvent = event || window.event;
    var source = document.getElementById(myEvent.target.id);
    var victory = false;
    var timeout = rng(6000, 1000);
    console.log(timeout);
    source.classList.replace('bloc', 'player');
    victory = checkVictory();
    console.log(victory);
    source.removeEventListener('dblclick', changeBloc);
    var interval = setInterval(function() {
        if (free_elements.length) {
            var xd = ""+rng(3,1)+rng(3,1);
            source = document.getElementById(xd);
            while (source.classList.contains('player') || source.classList.contains('ai')) {
                xd = ""+rng(3,1)+rng(3,1);
                source = document.getElementById(xd);
            }
            source.classList.replace('bloc', 'ai');
            victory = checkVictory();
            console.log(victory);
            source.removeEventListener('dblclick', changeBloc);
        }
        clearInterval(interval);
    }, timeout);
}

function checkVictory() {
    var xd = [];
    for (let i = 1; i < 4; i++) {
        for (let j = 1; j < 4; j++) {
            var id = ""+j+i;
            xd.push(document.getElementById(id).classList.value);
        }
    }
    console.log(xd);
    if (xd[0] == xd[1] && xd[0] == xd[2] && xd[0] != 'bloc') {
        if (xd[0] == 'player') {
            document.getElementById('result').innerHTML = "Has ganado!";
        } else {
            document.getElementById('result').innerHTML = "Has perdido";
        }
        return true;
    }
    if (xd[3] == xd[4] && xd[3] == xd[5] && xd[3] != 'bloc') {
        if (xd[3] == 'player') {
            document.getElementById('result').innerHTML = "Has ganado!";
        } else {
            document.getElementById('result').innerHTML = "Has perdido";
        }
        return true;
    }
    if (xd[6] == xd[7] && xd[6] == xd[8] && xd[6] != 'bloc') {
        if (xd[6] == 'player') {
            document.getElementById('result').innerHTML = "Has ganado!";
        } else {
            document.getElementById('result').innerHTML = "Has perdido";
        }
        return true;
    }
    if (xd[0] == xd[3] && xd[0] == xd[6] && xd[0] != 'bloc') {
        if (xd[0] == 'player') {
            document.getElementById('result').innerHTML = "Has ganado!";
        } else {
            document.getElementById('result').innerHTML = "Has perdido";
        }
        return true;
    }
    if (xd[1] == xd[4] && xd[1] == xd[7] && xd[1] != 'bloc') {
        if (xd[1] == 'player') {
            document.getElementById('result').innerHTML = "Has ganado!";
        } else {
            document.getElementById('result').innerHTML = "Has perdido";
        }
        return true;
    }
    if (xd[2] == xd[5] && xd[2] == xd[8] && xd[2] != 'bloc') {
        if (xd[2] == 'player') {
            document.getElementById('result').innerHTML = "Has ganado!";
        } else {
            document.getElementById('result').innerHTML = "Has perdido";
        }
        return true;
    }
    if (xd[0] == xd[4] && xd[0] == xd[8] && xd[0] != 'bloc') {
        if (xd[0] == 'player') {
            document.getElementById('result').innerHTML = "Has ganado!";
        } else {
            document.getElementById('result').innerHTML = "Has perdido";
        }
        return true;
    }
    if (xd[6] == xd[4] && xd[6] == xd[2] && xd[6] != 'bloc') {
        if (xd[6] == 'player') {
            document.getElementById('result').innerHTML = "Has ganado!";
        } else {
            document.getElementById('result').innerHTML = "Has perdido";
        }
        return true;
    }
    return false;
}

function restartGame() {
    var player_element = document.getElementsByClassName('player');
    var ai_element = document.getElementsByClassName('ai');
    console.log(player_element);
    console.log(ai_element);
    while (player_element.length) {
        player_element[0].classList.replace('player', 'bloc');
    }
    while (ai_element.length) {
        ai_element[0].classList.replace('ai', 'bloc');
    }
    addEvents();
}

function addEvents() {
    for (let i = 0; i < free_elements.length; i++) {
        free_elements[i].addEventListener('dblclick', changeBloc);
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