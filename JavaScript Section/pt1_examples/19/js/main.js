$name = ["Álvaro", "Real", "Gomez"];
$hours_day = 1;

function addInfo() {
    console.log($name[0]+" "+$name[1]+" "+$name[2]);
    document.getElementById("name").innerHTML = $name[0]+" "+$name[1]+" "+$name[2];
    console.log('$hours_day = '+$hours_day);
    document.getElementById("hours_day").innerHTML = $hours_day;
    console.log('$hours_day*7 = '+$hours_day*7);
    document.getElementById("hours_week").innerHTML = $hours_day*7;
}