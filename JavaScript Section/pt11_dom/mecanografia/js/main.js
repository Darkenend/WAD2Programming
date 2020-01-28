var intervalid = 0;
var mainpanel = document.getElementById('main-panel');
var gamepanel = document.getElementById('game-panel');
var inforow = document.getElementById('info-row');
var characterarray = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
    'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
var currentarray = [];
/**
 * Integer that determines the mode currently applied
 * * 1: PPM (Keystrokes Per Minute)
 * * 2: Sudden Death Challenge | First mistake ends the challenge
 * * 3: Timed Challenge | Keystrokes have a time length
 *  * From 0 strokes onwards: no timer
 *  * From 27 strokes onwards: 2s timer
 *  * From 54 strokes onwards: 1s timer
 *  * From 108 strokes onwards: 0.5s timer
 * 
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

}

/**
 * This function activates the keystrokes per minute mode
 * 
 * TODO: Implement KPM Mode Activation
 */
function activateKPM() {
    console.log("'KPM' mode");
    mode = 1;
    toggleInfobarButtons();
    //* Uncomment the next line when it's modified to have the challenge buttons activated by default
    // if (document.getElementById('challenge-btn').disabled) toggleChallengeButtons();
}

/**
 * This function activates the challenge modes options to choose from
 * 
 * TODO: Implement Challenge Mode Activation
 */
function activateChallenge() {
    console.log("'Challenge' mode");
    toggleChallengeButtons();
}

/**
 * This function activates the sudden death mode
 */
function activateSuddenDeath() {
    console.log("'Sudden Death' mode");
    mode = 2;
    toggleInfobarButtons();
}

/**
 * This function activates the timed mode
 */
function activateTimed() {
    console.log("'Timed' mode");
    mode = 3;
    toggleInfobarButtons();
}

/**
 * This function starts the round
 * 
 * TODO: Implement Start Activation
 */
function start() {
    console.log("Start");
    toggleChoiceButtons();
}

/**
 * This function stops the round
 * 
 * TODO: Implement Round Interruption
 */
function stop() {
    console.log("Stop");
    end();
}

/**
 * This function ends the round
 * 
 * TODO: Implement End of Round
 */
function end() {
    console.log("End");
    mode = 0;
    toggleInfobarButtons();
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
    toggleChoiceButtons();
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
    currentarray.push(characterarray[Math.random() * (characterarray.length)]);
}