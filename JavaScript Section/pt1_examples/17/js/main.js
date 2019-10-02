/**
 * This is what the worker earns daily
 *
 * @type {number}
 */
var daily = 199.99;

function mainProcess() {
    setWeekly();
    setMonthly();
    setAnnual();


    function setWeekly() {
        console.log("Week:");
        console.log(daily * 7);
        document.getElementById('weekly').innerHTML = "The weekly pay is <b>" + (daily * 7) + "</b>";
    }

    function setMonthly() {
        console.log("Month:");
        console.log(daily * 30);
        document.getElementById('monthly').innerHTML = "The monthly pay is <b>" + (daily * 30) + "</b>";
    }

    function setAnnual() {
        console.log("Year:");
        console.log(daily * 365);
        document.getElementById('annual').innerHTML = "The annual pay is <b>" + (daily * 365) + "</b>";
    }
}