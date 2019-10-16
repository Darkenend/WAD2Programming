const JUNIOR_PAY = 18000;
// Asking for data
const NAME = prompt("What's your name?");
const SURNAME = prompt("What's your surname");
const AGE = prompt("Write your date of birth (DD/MM/YYYY)");
const OF_AGE = confirm("Click 'OK' if you're over 18.");
// In case the user is of age
if (OF_AGE) {
    // Get the employment status
    let status = confirm("Click 'OK' if you're working, 'Cancel' if you're studying");
    if (status) {
        // Here if it's working, asking how much they make
        let pay = prompt("How much money do you earn monthly?");
        if (pay*12 === JUNIOR_PAY) {
            // Same pay as Junior
            alert("You get paid as much as our Junior Programmers");
        } else {
            // Different pay
            if (pay*12 > JUNIOR_PAY) {
                alert("You get paid more than our Junior Programmers");
            } else {
                alert("You get paid less than our Junior Programmers");
            }
        }
    } else {
        // Here if it's studying, displaying the message
        alert("Work hard my friend and enjoy learning!");
    }
}
