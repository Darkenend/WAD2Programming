/**
 * Timeout ID that we'll use to work with timeouts.
 */
var timeoutid = 0;
/**
 * Timer interval ID that we'll use to work with a timer.
 */
var timerid = 0;
/**
 * Amount of seconds that have passed.
 */
var seconds = 0;


// * Document elements to use quickly
/**
 * Main Panel where the mode can be selected
 */
var mainpanel = document.getElementById('main-panel');
/**
 * Game Panel where the keys to press appear
 */
var gamepanel = document.getElementById('game-panel');
/**
 * Panel where the info is given for the user to check their stats.
 */
var inforow = document.getElementById('info-row');

/**
 * Default character array
 */
var characterarray = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
/**
 * The array of keys to currently press.
 */
var currentarray = [];

/**
 * Is the round currently active?
 */
var roundactive = false;

/**
 * Successful strokes in the round
 */
var goodstrokes = 0;
/**
 * Errors done in the round
 */
var badstrokes = 0;

/**
 * Integer that determines the mode currently applied
 * * 1: PPM (Keystrokes Per Minute)
 * * 2: Sudden Death Challenge | First mistake ends the challenge
 * * 3: Timed Challenge | Keystrokes have a time length
 *  * From 0 strokes onwards: no timer
 *  * From 27 strokes onwards: 2s timer
 *  * From 54 strokes onwards: 1s timer
 *  * From 108 strokes onwards: 0.5s timer
 */
var mode = 0;

/**
 * This function is the main handler of the keystroke inputs.
 * @param {Event} event Event of the keystroke
 */
function keyHandling(event) {
    //* IE Compatibility
    var myEvent = event || window.event;
    var code = myEvent.code;
    if (roundactive) {
        var pupper = 0;
        var hit = -1;
        console.log("Round is active, processing keypress");
        // We check all to see if there's a success
        for (var i = 0; i < currentarray.length; i++) {
            if (code == 'Key'+currentarray[i]) {
                console.log("Match found");
                pupper++;
                hit = i;
            }
        }
        if (pupper === 0) {
            console.log("Bad Hit");
            badstrokes++;
        } else {
            console.log("Good Hit");
            goodstrokes++;
            currentarray.splice(hit, 1);
            addCharacter();
            updateGameScreen();
            mode3Interval();
        }
    } else {
        console.log("Round isn't active currently.")
    }
}

function updateGameScreen() {
    gamepanel.innerHTML = "";
    for (var i = 0; i < currentarray.length; i++) {
        var element = document.createElement('h1');
        element.innerHTML = currentarray[i];
        gamepanel.appendChild(element);
    }
}

function mode3Interval() {
    if (mode === 3) {
        clearInterval(intervalid);
        if (goodstrokes > 26) {
            if (goodstrokes > 53) {
                if (goodstrokes > 107) intervalid = setTimeout(error, 500);
                else intervalid = setTimeout(error, 1000);
            } else intervalid = setTimeout(error, 2000);
        } else intervalid = setTimeout(error, 60000);
    }
}

/**
 * This function activates the keystrokes per minute mode
 */
function activateKPM() {
    document.getElementById('current-mode').innerHTML = "Modo: Pulsaciones por Minuto";
    console.log("'KPM' mode");
    mode = 1;
    if (document.getElementById('start-btn').disabled) toggleInfobarButtons();
    if (document.getElementById('challenge-btn').disabled) toggleChallengeButtons();
}

/**
 * This function activates the challenge modes options to choose from
 */
function activateChallenge() {
    console.log("'Challenge' mode");
    toggleInfobarButtons();
    toggleChallengeButtons();
}

/**
 * This function activates the sudden death mode
 */
function activateSuddenDeath() {
    document.getElementById('current-mode').innerHTML = "Modo: Muerte Súbita";
    console.log("'Sudden Death' mode");
    mode = 2;
    if (document.getElementById('start-btn').disabled) toggleInfobarButtons();
}

/**
 * This function activates the timed mode
 */
function activateTimed() {
    document.getElementById('current-mode').innerHTML = "Modo: Contrarreloj";
    console.log("'Timed' mode");
    mode = 3;
    if (document.getElementById('start-btn').disabled) toggleInfobarButtons();
}

/**
 * This function starts the round
 */
function start() {
    goodstrokes = 0;
    badstrokes = 0;
    seconds = 0;
    console.log("Variables reset, Starting now");
    mainpanel.hidden = true;
    switch (mode) {
        case 1:
            console.log("Starting KPM mode");
            intervalid = setTimeout(end, 60000);
            game();
            break;
        case 2:
            console.log("Starting sudden death");
            game();
            break;
        case 3:
            console.log("Starting mode Timed Challenge");
            intervalid = setTimeout(error, 60000);
            game();
            break;
        default:
            console.log('mode :', mode);
            break;
    }
}

/**
 * This function properly sets the round and the checks
 */
function game() {
    for (var i = 0; i < 5; i++) addCharacter();
    console.log('currentarray :', currentarray);
    updateGameScreen();
    roundactive = true;
    timerid = setInterval(timer, 1000);
}

/**
 * This function stops the round
 */
function stop() {
    if (roundactive) {
        console.log("Stop");
        end();
    }
}

/**
 * This function is called on timed challenged and there's been too long since the last keystroke
 */
function error() {
    badstrokes++;
    if (mode === 3) {
        clearInterval(intervalid);
        if (goodstrokes > 26) {
            if (goodstrokes > 53) {
                if (goodstrokes > 107) intervalid = setTimeout(error, 500);
                else intervalid = setTimeout(error, 1000);
            } else intervalid = setTimeout(error, 2000);
        } else intervalid = setTimeout(error, 60000);
    }
}

/**
 * This function ends the round
 */
function end() {
    console.log("End");
    if (mode === 3 || mode === 1) clearTimeout(intervalid);
    clearInterval(timerid);
    updateStats()
    toggleInfobarButtons();
    roundactive = false;
    mode = 0;
    gamepanel.innerHTML = "";
    mainpanel.hidden = false;
    
}

/**
 * This function toggles if the main panel is hidden or not
 */
function mainpanelAppearToggle() {
    mainpanel.hidden = !mainpanel.hidden;
}

/**
 * This function toggles all the buttons for choices in the main panel
 */
function toggleChoiceButtons() {
    toggleInfobarButtons();
    toggleChallengeButtons();
}

/**
 * This function toggles the info bar buttons to allow them to be used
 */
function toggleInfobarButtons() {
    document.getElementById('start-btn').disabled = !document.getElementById('start-btn').disabled;
    document.getElementById('stop-btn').disabled = !document.getElementById('stop-btn').disabled;
}

/**
 * This function toggles the button for the KPM mode
 */
function toggleKPMButton() {
    document.getElementById('ppm-btn').disabled = !document.getElementById('ppm-btn').disabled;
}

/**
 * This function toggles the buttons for the Challenge modes
 */
function toggleChallengeButtons() {
    document.getElementById('challenge-btn').disabled = !document.getElementById('challenge-btn').disabled;
    document.getElementById('sudden-death').disabled = !document.getElementById('sudden-death').disabled;
    document.getElementById('sudden-death').hidden = !document.getElementById('sudden-death').hidden;
    document.getElementById('timed').disabled = !document.getElementById('timed').disabled;
    document.getElementById('timed').hidden = !document.getElementById('timed').hidden;
}

/**
 * This function adds a new character to the current array that we're gonna work on.
 */
function addCharacter() {
    var temp = Math.floor(Math.random() * (characterarray.length));
    var tempCharacter = characterarray[temp];
    currentarray.push(tempCharacter);
}

/**
 * This function is called every second so we can display in real time the seconds done.
 */
function timer() {
    seconds++;
    updateStats();
    document.getElementById('time-remaining').innerHTML = "Tiempo: "+seconds;
    if (mode === 1 && seconds === 60 || mode === 2 && badstrokes != 0 || mode === 3 && badstrokes === 5) end();
}

function updateStats() {
    var kpm = (60*(goodstrokes+badstrokes)/seconds);
    document.getElementById('result-field').innerHTML = "Puntuación: "+(goodstrokes-badstrokes*2);
    document.getElementById('kpm').innerHTML = "PPM: "+kpm.toFixed(2);
}