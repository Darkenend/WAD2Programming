let userString = prompt("Input a string:");
if (userString.substring(4, 10) !== "Script") alert("The end result is " + userString); else {
    let endString = userString.replace("Script", "");
    alert("The end result is "+endString);
}