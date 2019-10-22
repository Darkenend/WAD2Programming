let day, month, year;
let date = [];
let d = new Date();
day = d.getDate();
month = d.getMonth();
year = d.getFullYear();
if (confirm("Click OK to get the current date in MM/DD/YYYY, Cancel to get it in DD/MM/YYYY")) {
    // American Format
    date[0] = month+"/"+day+"/"+year;
    date[1] = month+"-"+day+"-"+year;
} else {
    // RoW Format
    date[0] = day+"/"+month+"/"+year;
    date[1] = day+"-"+month+"-"+year;
}
console.log(date);
alert("Today's date is: "+date[0]+" | "+date[1]);
