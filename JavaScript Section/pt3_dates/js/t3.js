let sysDate;
let single_day = 1000*60*60*24;
if (confirm("Do you want to input your date? Otherwise, the day delta to christmas will be calculated from today.")) {
    let userDate = prompt("Insert the date in format YYYY-MM-DD").trim();
    let patt = new RegExp(/[0-9]{4}-[0-9]{2}-[0-9]{2}/g);
    while (!patt.test(userDate)) {
        userDate = prompt("Wrong format. Insert the date in format YYYY-MM-DD");
    }
    sysDate = new Date(userDate);
} else {
    sysDate = new Date();
}
console.log(sysDate);
let xmas = new Date(sysDate.getFullYear(), 11, 25);
if (sysDate.getDate() > 24 && sysDate.getMonth() === 11) {
    xmas.setFullYear(xmas.getFullYear()+1);
}
console.log(xmas);
alert(Math.ceil((xmas.getTime()-sysDate.getTime())/(single_day))+
    " days left until Christmas!");