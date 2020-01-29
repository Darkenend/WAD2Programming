//* Declare variable and call to load data to start the display of data
var htmlwrapper = document.getElementById('wrapper');
loadData();

/**
 * This function loads the data in the JSON file at the same level
 */
function loadData() {
    const xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            showData(this.responseText);
        }
    };

    xhttp.open('GET', '/Javascript Section/pt12_json/ejercicios/ejercicio5/ejercicio5.json', true);
    xhttp.send();
}

/**
 * This function takes care of displaying everything in the page
 * @param {String} response String with the JSON that we'll work with
 */
function showData(response) {
    var append_string = "";
    var data = JSON.parse(response);

    for (i in data.arboles) {
        // Container for each tree
        var container = document.createElement('div');

        // Title with Scientific Name of the Tree
        var title = document.createElement('h3');
        title.appendChild(document.createTextNode(data.arboles[i].nombrecientifico));
        container.appendChild(title);
        
        // Subtitle that leads the list of common names
        var subtitle = document.createElement('h4');
        subtitle.appendChild(document.createTextNode("Nombre"));
        container.appendChild(subtitle);

        // List of common names
        var namelist = document.createElement('ul');
        for (j in data.arboles[i].nombre) {
            var listelement = document.createElement('li');
            listelement.appendChild(document.createTextNode(data.arboles[i].nombre[j]));
            namelist.appendChild(listelement);
        }
        container.appendChild(namelist);

        // Vegetation
        var vegetation = document.createElement('p');
        var vegetation_string = "Vegetacion: "+data.arboles[i].vegetacion;
        vegetation.appendChild(document.createTextNode(vegetation_string));
        container.appendChild(vegetation);

        // Height
        var height = document.createElement('p');
        if (data.arboles[i].altura.minima === data.arboles[i].altura.maxima) {

        } else {
            
        }

        // Structure

        // Color
        var color = document.createElement('p');
        color.appendChild(document.createTextNode('Color:'));
        var listacolor = document.createElement('ul');
        var primavera = document.createElement('li').appendChild(document.createTextNode('Primavera'));
        listacolor.appendChild(primavera);
        var listaprimavera = document.createElement('ul');
        /* Spring */
        if (data.arboles[i].color.primavera.hojasjovenes !== "") {
            var newleaf = document.createElement('li').appendChild(document.createTextNode("Hojas Jovenes: "+data.arboles[i].color.primavera.hojasjovenes));
            listaprimavera.appendChild(newleaf);
        }
        if (data.arboles[i].color.primavera.hojasantiguas !== "") {
            // TODO: Loop this for futureproofing and improvements
            var oldleaf1 = document.createElement('li');
            oldleaf1.appendChild(document.createTextNode("Haz: "+data.arboles[i].color.primavera.hojasantiguas.haz));
            var oldleaf2 = document.createElement('li');
            oldleaf2.appendChild(document.createTextNode("Enves: "+data.arboles[i].color.primavera.hojasantiguas.enves));
            listaprimavera.appendChild(oldleaf1);
            listaprimavera.appendChild(oldleaf2);
        }
        listacolor.appendChild(listaprimavera);
        /* Fall */
        if (data.arboles[i].color.otono !== "") {
            var otono = document.createElement('li').appendChild(document.createTextNode('Otoño: '+data.arboles[i].color.otono));
            listacolor.appendChild(otono);
        }
        color.appendChild(listacolor);
        container.appendChild(color);

        // Frost Resistance

        // Add Tree container to the body
        htmlwrapper.appendChild(container);
    }
} 