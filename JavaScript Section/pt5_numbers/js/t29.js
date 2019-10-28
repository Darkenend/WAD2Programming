let myArray = [];

if (Math.floor((Math.random() * 100) + 1) > 50) {
    myArray = [0, 0, 0];
} else {
    myArray = [0, 0, 0, 0, 0, 0];
}

for (let i = 0; i < myArray.length; $i++) {
    myArray[i] = parseInt(prompt("Introduce el numero "+(i+1)+" de "+myArray.length));
    while (isNaN(myArray[i])) {
        myArray[i] = parseInt(prompt("ERROR, NO ES UN NUMERO: Introduce el numero "+(i+1)+" de "+myArray.length));
    }
}
if (myArray[0] === myArray[myArray.length-1]) {
    alert("Los numeros extremos (primero y ultimo) son iguales");
} else {
    alert("Los numeros extremos (primero y ultimo) no son iguales");
}