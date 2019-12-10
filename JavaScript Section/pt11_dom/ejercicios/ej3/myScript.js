var fieldset = document.getElementById("fieldset");
for (let i = 0; i < 100; i++) {
    var element = document.createElement("input");
    element.type = "checkbox";
    element.id = "check"+i;
    var label = document.createElement("label");
    label.htmlFor = "check"+i;
    label.appendChild(document.createTextNode(parseInt(rng(1000, 1))));
    var br = document.createElement("br");
    fieldset.appendChild(element);
    fieldset.appendChild(label);
    fieldset.appendChild(br);
}

function markAll() {
    console.log("Checking all");
    var elements = document.getElementsByTagName("input");
    for (let i = 0; i < elements.length; i++) if (elements[i].type == "checkbox") elements[i].checked = true;
}

function unmarkAll() {
    var elements = document.getElementsByTagName("input");
    for (let i = 0; i < elements.length; i++) if (elements[i].type == "checkbox") elements[i].checked = false;
}


/**
* This function returns a number between the maximum and minimum given
* @param {number} max Maximum number possible
* @param {number} min Minimum number possible
*/
function rng(max, min) {
    return Math.floor(Math.random() * max) + min;
}