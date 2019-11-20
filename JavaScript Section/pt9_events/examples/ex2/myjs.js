function mostrarMensaje(evento){
    if(evento.type=="keyup"){
        console.log(evento.keyCode);
    } else if(evento.type=="click"){
        console.log(evento.clientX+" "+evento.clientY);
    }
}
document.getElementById("miObjeto").addEventListener("click",mostrarMensaje);
document.addEventListener("keyup",mostrarMensaje);
document.getElementById("miObjeto").addEventListener("dblclick",function (){
    console.log("Double Click");
});