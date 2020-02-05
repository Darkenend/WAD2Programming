var linkine = 'https://servicios.ine.es/wstempus/js/ES/VARIABLES_OPERACION/353?page=1';
loadJSON(function(response) {
    // Parse JSON string into object
    var actual_JSON = JSON.parse(response);
    console.log('actual_JSON :', actual_JSON);
    var tbody = document.getElementById('tbody');
    for (i in actual_JSON) {
        var row = document.createElement('tr');
        var id = document.createElement('td');
        id.appendChild(document.createTextNode(actual_JSON[i].Id));
        var nombre = document.createElement('td');
        nombre.appendChild(document.createTextNode(actual_JSON[i].Nombre));
        var codigo = document.createElement('td');
        codigo.appendChild(document.createTextNode(actual_JSON[i].Codigo));
        row.appendChild(id);
        row.appendChild(nombre);
        row.appendChild(codigo);
        tbody.appendChild(row);
    }
});

function loadJSON(callback) {   
    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', linkine, true);
    xobj.onreadystatechange = function () {
        if (xobj.readyState == 4 && xobj.status == "200") callback(xobj.responseText);
    };
    xobj.send(null);  
}