function eventHandler(evento){
    let event = evento || window.event;
    switch (event.type) {
        case "keyup":
            console.log("Key Up: "+event.keyCode);
            break;
        case "keydown":
            console.log("Key Down: "+event.keyCode);
            break;
        case "keypress":
            console.log("Key Pressed: "+event.key);
            break;
        case "click":
            console.log(event.clientX+" "+event.clientY);
            break;
    }
}
document.getElementById("myObject").addEventListener("click",eventHandler);
document.addEventListener("keyup",eventHandler);
document.addEventListener("keydown",eventHandler);
document.addEventListener("keypress",eventHandler);