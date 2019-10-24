let vacDays = 1;

function addVacationDay() {
    let hiddenOnes = document.getElementById('dayVacationDiv').children;
    hiddenOnes[vacDays*2].removeAttribute('hidden');
    hiddenOnes[vacDays*2+1].removeAttribute('hidden');
    vacDays++;
    if (vacDays === 12) {
        document.getElementById('addDayButton').setAttribute('hidden', true);
    }
}


function hideAllExtraDays() {
    let hiddenOnes = document.getElementById('dayVacationDiv').children;
    vacDays = 1;
    for (let i = 2; i < 24; i++) {
        hiddenOnes[i].setAttribute('hidden', true);
    }
}
