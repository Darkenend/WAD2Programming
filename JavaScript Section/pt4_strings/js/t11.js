let result, userInput, pat, accTok;
let accTok_h = prompt("Do you want to input a [M]ilitary time or a [U]TC Timestamp");
while (accTok_h !== "M" && accTok_h !== "U") {
    accTok_h = prompt("ERROR. [M]ilitary Time or [U]TC Timestamp");
}
accTok = accTok_h === "M";
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
    if (xd.getMinutes()<10) {
        result = xd.getHours()+":0"+xd.getMinutes();
    } else {
        result = xd.getHours()+":"+xd.getMinutes();
    }
}
alert("The end result is: "+result);