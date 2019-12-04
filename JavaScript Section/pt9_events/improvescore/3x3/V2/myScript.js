var free_elements = document.getElementsByClassName('bloc');
addEvents();

function changeBloc(event) {
    var myEvent = event || window.event;
    var source = document.getElementById(myEvent.target.id);
    var victory = false;
    source.classList.replace('bloc', 'player');
    victory = checkVictory();
    console.log(victory);
    source.removeEventListener('dblclick', changeBloc);
    setTimeout(function() {
        var xd = ""+rng(3,1)+rng(3,1);
        source = document.getElementById(xd);
        while (source.classList.contains('player') || source.classList.contains('ai')) {
            xd = ""+rng(3,1)+rng(3,1);
            source = document.getElementById(xd);
        }
        source.classList.replace('bloc', 'ai');
        victory = checkVictory();
        source.removeEventListener('dblclick', changeBloc);
    }, rng(6000, 1000));
    if (!victory && free_elements.length == 0) {
        restartGame();
    }
}

function checkVictory() {
    var xd = [];
    for (let i = 1; i < 4; i++) {
        for (let j = 1; j < 4; j++) {
            var id = ""+j+i;
            xd.push(document.getElementById(id));
        }
    }
    console.log(xd[0].classList+" "+xd[1].classList+" "+xd[2].classList);
    if (xd[0].classList == xd[1].classList == xd[2].classList) {
        if (xd[0].classList.contains('player')) {
            document.getElementById(result).innerHTML = "Has ganado!";
        } else {
            document.getElementById(result).innerHTML = "Has perdido";
        }
        return true;
    }
    console.log(xd[3].classList+" "+xd[4].classList+" "+xd[5].classList);
    if (xd[3].classList == xd[4].classList == xd[5].classList) {
        if (xd[3].classList.contains('player')) {
            document.getElementById(result).innerHTML = "Has ganado!";
        } else {
            document.getElementById(result).innerHTML = "Has perdido";
        }
        return true;
    }
    console.log(xd[6].classList+" "+xd[7].classList+" "+xd[8].classList);
    if (xd[6].classList == xd[7].classList == xd[8].classList) {
        if (xd[6].classList.contains('player')) {
            document.getElementById(result).innerHTML = "Has ganado!";
        } else {
            document.getElementById(result).innerHTML = "Has perdido";
        }
        return true;
    }
    console.log(xd[0].classList+" "+xd[3].classList+" "+xd[6].classList);
    if (xd[0].classList == xd[3].classList == xd[6].classList) {
        if (xd[0].classList.contains('player')) {
            document.getElementById(result).innerHTML = "Has ganado!";
        } else {
            document.getElementById(result).innerHTML = "Has perdido";
        }
        return true;
    }
    console.log(xd[1].classList+" "+xd[4].classList+" "+xd[7].classList);
    if (xd[1].classList == xd[4].classList == xd[7].classList) {
        if (xd[1].classList.contains('player')) {
            document.getElementById(result).innerHTML = "Has ganado!";
        } else {
            document.getElementById(result).innerHTML = "Has perdido";
        }
        return true;
    }
    console.log(xd[2].classList+" "+xd[5].classList+" "+xd[8].classList);
    if (xd[2].classList == xd[5].classList == xd[8].classList) {
        if (xd[2].classList.contains('player')) {
            document.getElementById(result).innerHTML = "Has ganado!";
        } else {
            document.getElementById(result).innerHTML = "Has perdido";
        }
        return true;
    }
    console.log(xd[0].classList+" "+xd[4].classList+" "+xd[8].classList);
    if (xd[0].classList == xd[4].classList == xd[8].classList) {
        if (xd[0].classList.contains('player')) {
            document.getElementById(result).innerHTML = "Has ganado!";
        } else {
            document.getElementById(result).innerHTML = "Has perdido";
        }
        return true;
    }
    console.log(xd[6].classList+" "+xd[4].classList+" "+xd[2].classList);
    if (xd[6].classList == xd[4].classList == xd[2].classList) {
        if (xd[6].classList.contains('player')) {
            document.getElementById(result).innerHTML = "Has ganado!";
        } else {
            document.getElementById(result).innerHTML = "Has perdido";
        }
        return true;
    }
    return false;
}

function restartGame() {
    var player_element = document.getElementsByClassName('player');
    var ai_element = document.getElementsByClassName('ai');
    while (player_element.length) {
        player_element.classList.replace('player', 'bloc');
    }
    while (ai_element.length) {
        ai_element.classList.replace('bloc');
    }
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