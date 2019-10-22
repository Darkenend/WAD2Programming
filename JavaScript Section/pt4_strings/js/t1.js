let myWord = prompt("Inserta una palabra");
let pos = prompt("Inserta la posicion del caracter que quieres eliminar (1-"+myWord.length+")");
let endString = myWord.slice(0, pos-1) + myWord.slice(pos, myWord.length);
alert("El resultado es: "+endString);