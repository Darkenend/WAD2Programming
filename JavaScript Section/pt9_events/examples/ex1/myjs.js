function mostrarMensaje(evento) {
    if (evento.type=="keyup") {
        alert(evento.keyCode);
    } else if(evento.type=="click") {
        alert(evento.clientX+" "+evento.clientY);
    }
}
document.getElementById("miObjeto").onclick=mostrarMensaje;
document.onkeyup=mostrarMensaje;