var intervalid = 0;
var base_deck = ["Ac", "Ad", "Ah", "As", "2c", "2d", "2h", "2s", "3c", "3d", "3h", "3s", "4c", "4d", "4h", "4s", "5c", "5d", "5h", "5s", "6c", "6d", "6h", "6s", "7c", "7d", "7h", "7s", "8c", "8d", "8h", "8s", "9c", "9d", "9h", "9s", "10c", "10d", "10h", "10s", "Jc", "Jd", "Jh", "Js", "Qc", "Qd", "Qh", "Qs", "Kc", "Kd", "Kh", "Ks"];
var dealer_hand = [];
var player_hand = [];
var dealer_score = [];
var player_score = [];
var current_funds = 500;
var initial_funds = current_funds;
var game_started = false;
var won = 0;
var current_bet = 0;
var round = 1;
/**
 * `round_step` indicates the step of the round in which we are, where:
 * * 0 = Preparation
 * * 1 = Deal cards
 * * 2 = Reveal
 * * 3 = First card picking
 * * 4 = Card picking
 * * 5 = End game
 * * 6 = Cards back to deck and shuffle it
 */
var round_step = 0;
var used_deck = shuffle(base_deck);

function updateInfo() {
    document.getElementById("current_funds").innerHTML = current_funds;
    document.getElementById("won").innerHTML = won;
    document.getElementById("profits").innerHTML = current_funds - initial_funds;
    document.getElementById("current_bet").innerHTML = current_bet;
}

/**
 * This function prepares the new round
 * TODO: MUST COMMENT THIS FUNCTION AND COMPACT IT
 */
function matchPreparation() {
    round_step = 0;
    document.getElementById('deal_button').remove();
    // * This part is only done when the game hasn't been set up yet.
    if (!game_started) {
        var temp_fund = parseInt(prompt("Insert how much money do you want to play with, don't write anything for a default of $500 (Wrong inputs will be counted as default too)"));
        isNaN(temp_fund) ? current_funds = 500 : current_funds = temp_fund;
        initial_funds = current_funds;
        game_started = true;
        used_deck = shuffle(used_deck);
        current_bet = parseInt(prompt("How much do you wanna bet: (This will be applied to all the rounds played in the game)"));
        while(isNaN(current_bet) || current_bet > current_funds) {
            current_bet = parseInt(prompt("Invalid bet. Rewrite your bet:"));
        }
    }
    updateInfo();
    round_step++;
    cardDealing();
    checkHand(true);
    checkHand(false);
    round_step++;
    updateDesk();
    enableButtons();
    round_step++;
}

/**
 * This function deals cards, by dealing 2 cards to the dealer and the player if `round_step == 1`, or just one to the player if `round_step != 1`
 */
function cardDealing() {
    if (round_step == 1) { 
        dealer_hand.push(used_deck.pop());
        player_hand.push(used_deck.pop());
        dealer_hand.push(used_deck.pop());
        player_hand.push(used_deck.pop());
    } else {
        player_hand.push(used_deck.pop());
    }
}

/**
 * This function checks the cards in a hand, and adjust the score appropriately.
 * @param {boolean} playerhand Boolean that indicates if the hand being checked is the player's (`true`), or the dealer's (`false`)
 */
function checkHand(playerhand) {
    var current_hand = [];
    var current_score = [];
    playerhand ? current_hand = player_hand : current_hand = dealer_hand;
    for (var i = 0; i < current_hand.length; i++) {
        var value = cardValue(current_hand[i]);
        current_score.push(value);
    }
    if (checkScore(current_score)) playerhand ? player_score = checkScore(current_score) : dealer_score = checkScore(current_score);
}

/**
 * This function checks the score of a hand
 * @param {Array} hand Array that contains the cards in a hand
 * @returns {int} Score of said hand.
 */
function checkScore(hand) {
    var sum = 0;
    var aces = 0;
    console.log('sum :', sum);
    for (var i = 0; i < hand.length; i++) {
        if (hand[i] == 11) {
            aces++;
        }
        sum += hand[i];
        console.log('sum :', sum);
    }
    if (sum > 21 && aces != 0) {
        for (let i = 0; i < hand.length; i++) {
            if (hand[i] == 11) {
                hand[i] = 1;
                aces--;
                break;
            }
            console.log('sum :', sum);
        }
    }
    console.log('new_sum :', sum);
    return sum;
}

/**
 * This function updates the desk with all the cards in both the dealer and the player's hand.
 */
function updateDesk() {
    var dealer_zone = document.getElementById('dealer_card_container');
    var player_zone = document.getElementById('player_card_container');
    dealer_zone.innerHTML = "";
    player_zone.innerHTML = "";
    for (var i = 0; i < dealer_hand.length; i++) {
        var image = document.createElement('img');
        if (i === 0) image.src = "img/Back.svg"
        else image.src = "img/"+dealer_hand[i]+".svg";
        dealer_zone.appendChild(image);
    }
    for (var i = 0; i < player_hand.length; i++) {
        var image = document.createElement('img');
        image.src = "img/"+player_hand[i]+".svg";
        player_zone.appendChild(image);
    }
    document.getElementById("player_score_container").innerHTML = "<h3>"+player_score+"</h3>";
}

/**
 * This function checks a card and then assigns a numeric value to this card
 * @param {String} cardstring String of the card that we're gonna give a value
 */
function cardValue(cardstring) {
    switch (cardstring.charAt(0)) {
        case "A":
            return 11;
        case "2":
            return 2;
        case "3":
            return 3;
        case "4":
            return 4;
        case "5":
            return 5;
        case "6":
            return 6;
        case "7":
            return 7;
        case "8":
            return 8;
        case "9":
            return 9;
        default:
            return 10;
    }
}

/**
 * This function does the whole process of hitting and getting more cards
 */
function hit() {
    if (round_step === 3) {
        document.getElementById('double_button').disabled = true;
        document.getElementById('surrender_button').disabled = true;
        cardDealing();
        round_step++;
    } else cardDealing();
    checkHand(true);
    updateDesk();
}

/**
 * This function does the process of standing and stops the game
 */
function stand() {
    console.log("Action: Stand");
    // TODO: Implement Stand
    disableButtons();
    addDealButton();
    round_step++;
    endGame(false);
}

/**
 * This function doubles the current bet, hits one card and then immediately stands
 * 
 * *Only to be used in the FIRST round*
 */
function double() {
    console.log("Action: Double");
    // TODO: Implement Double
    disableButtons();
    addDealButton();
    round_step = 5;
    endGame(false);
}

/**
 * This function surrenders the hand irrelevant of score
 * 
 * *Only to be used in the FIRST round*
 */
function surrender() {
    console.log("Action: Surrender");
    // TODO: Implement Surrender
    disableButtons();
    addDealButton();
    round_step = 5;
    endGame(true);
}


/**
 * This function just disables the buttons in the control section.
 */
function disableButtons() {
    document.getElementById('hit_button').disabled = true;
    document.getElementById('stand_button').disabled = true;
    document.getElementById('double_button').disabled = true;
    document.getElementById('surrender_button').disabled = true;
}

/**
 * This function just enables the buttons in the control section.
 */
function enableButtons() {
    document.getElementById('hit_button').disabled = false;
    document.getElementById('stand_button').disabled = false;
    document.getElementById('double_button').disabled = false;
    document.getElementById('surrender_button').disabled = false;
}

/**
 * This function adds a deal button to the results section.
 */
function addDealButton() {
    var div = document.getElementById('deal_div');
    var button = document.createElement('button');
    button.id = "deal_button";
    button.addEventListener('click', matchPreparation);
    button.innerHTML = "Deal";
    div.appendChild(button);
}

/**
 * This function clears the hands, then gets a new deck and allows a new game to start.
 * @param {boolean} surrendered Has the player surrendered
 */
function endGame(surrendered) {
    player_score = checkScore(player_hand);
    if (surrendered || player_score > 21) {
        current_funds -= current_bet;
        current_bet = 0;
    } else {
        var dealer_score = checkScore(dealer_score);
        if (dealer_score === player_score) {
            //* We go here when it's a Draw
        } else {
            if (dealer_score > player_score) {
                //* We go here when it's a Loss
            } else {
                //* We go here when it's a Win
                won++;
            }
        }
    }
    round_step++;

}

function deckSetup() {
    dealer_hand = [];
    player_hand = [];
    dealer_score = [];
    player_score = [];
    used_deck = shuffle(base_deck);
    round++;
}

/**
 * Fisher-Yates implementation of array shuffle.
 * @param {Array} a items An array containing the items.
 */
function shuffle(a) {
    var j, x, i;
    for (i = a.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = a[i];
        a[i] = a[j];
        a[j] = x;
    }
    return a;
}