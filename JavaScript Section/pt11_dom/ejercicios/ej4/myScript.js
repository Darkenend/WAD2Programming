var id_counter = 3;
var div = document.getElementById("paragraphs");
var timeout = 0;

function hideParagraph(event) {
    timeout = setTimeout(function() {
        var myEvent = event || window.event;
        myEvent.target.hidden = true;
    }, 1500);
}

function removeParagraph(event) {
    clearTimeout(timeout);
    var myEvent = event || window.event;
    var myId = myEvent.target.id;
    removedElement = document.getElementById(myId);
    div.removeChild(removedElement);
}

function showParagraphs() {
    var elements = document.getElementsByTagName("p");
    for (var i = 0; i < elements.length; i++) elements[i].hidden = false;
}

function addParagraph() {
    var element = document.createElement("p");
    element.id = parseInt(id_counter);
    element.addEventListener("click", hideParagraph);
    element.addEventListener("dblclick", removeParagraph);
    id_counter++;
    var content = document.createTextNode("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.");
    element.appendChild(content);
    div.appendChild(element);
}