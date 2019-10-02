const PERCENT_EXERCISES = 0.4;
const PERCENT_TESTS = 0.5;
const PERCENT_ATTITUDE = 0.1;
const NAMES = ["Aziz", "Ravgic", "Mara", "Thaax", "Phesh", "Endrax"];
const LASTNAMES = ["Sol", "Cov", "Sas"];

function calculateYear() {
    let mark_ex_1, mark_ex_2, mark_te_1, mark_te_2, mark_at_1, mark_at_2;
    mark_at_1 = getRandomArbitrary(5, 10);
    console.log("MA1: "+mark_at_1);
    mark_at_2 = getRandomArbitrary(5, 10);
    console.log("MA2: "+mark_at_2);
    mark_ex_1 = getRandomArbitrary(5, 10);
    console.log("ME1: "+mark_ex_1);
    mark_ex_2 = getRandomArbitrary(5, 10);
    console.log("ME2: "+mark_ex_2);
    mark_te_1 = getRandomArbitrary(5, 10);
    console.log("MT1: "+mark_te_1);
    mark_te_2 = getRandomArbitrary(5, 10);
    console.log("MT2: "+mark_te_2);
    let stu_name = NAMES[getRandomInt(0, names.length)]+" "+LASTNAMES[getRandomInt(0, lastname.length)];
    console.log(stu_name);
    eval_1 = calculateEval(mark_ex_1, mark_te_1, mark_at_1);
    console.log("Evaluation 1: "+eval_1);
    eval_2 = calculateEval(mark_ex_2, mark_te_2, mark_at_2);
    console.log("Evaluation 2: "+eval_2);
    year = (eval_1 + eval_2) / 2;
    console.log("Year: "+year);
    document.getElementById('notas').innerHTML = "Las nota de "+stu_name+" es un <i>"+eval_1+"</i> en la primera evaluacion, un <i>"+eval_2+"</i> en la segunda evaluacion, en la final tiene un <strong>"+year+"</strong>";
}

function calculateEval(exercices, tests, attitude) {
    res = exercices * PERCENT_EXERCISES + tests * PERCENT_TESTS + attitude * PERCENT_ATTITUDE;
    return res;
}

// Retorna un número aleatorio entre min (incluido) y max (excluido)
function getRandomArbitrary(min, max) {
    return Math.random() * (max - min) + min;
}

// Retorna un número aleatorio entero entre min (incluido) y max (excluido)
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}