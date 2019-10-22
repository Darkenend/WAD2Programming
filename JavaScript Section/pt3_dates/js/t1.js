let currentTime = new Date();
let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
let stringPrint = "Today is: "+days[currentTime.getDay()]+" Current time is: "+get12Hour(currentTime.getHours())+":"+currentTime.getMinutes()+":"+currentTime.getSeconds();
alert(stringPrint);
console.log(stringPrint);

/**
 * Function that takes a date's hour and converts it to a formatted string
 * @param hour Date to be converted and formatted
 * @return string String formatted with the XX YM format, being XX a number between 1 and 12, Y being either A or P
 */
function get12Hour(hour) {
    if (hour === 0) {
        return "12 AM";
    } else if (hour < 12) {
        return hour+" AM";
    } else if (hour === 12) {
        return hour+" PM";
    } else {
        return (hour-12)+" PM";
    }
}