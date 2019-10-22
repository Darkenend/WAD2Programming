let result;
let accTok = confirm("Press 'OK' if you want to input a military hour time or 'Cancel' a UTC time");
let userInput = prompt("Insert the number:");
let pat;
if (accTok) {
    pat = new RegExp(/[0-9]{4}/);
    while (!pat.test(userInput)) {
        userInput = prompt("Insert the number in XXXX format:");
    }
    result = userInput.charAt(0)+userInput.charAt(1)+":"+userInput.charAt(2)+userInput.charAt(3);
} else {
    pat = new RegExp(/[0-9]+/);
    while (!pat.test(userInput) || userInput > 8640000000000000 || userInput < -8640000000000000) {
        userInput = prompt("Insert the number in a numeric format:");
    }
    xd = new Date(parseInt(userInput));
    console.log(xd.toString());
    result = xd.getHours()+":"+xd.getMinutes();
}
alert("The end result is: "+result);