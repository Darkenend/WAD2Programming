loadJSON(function(response) {
    // Parse JSON string into object
    var actual_JSON = JSON.parse(response);
    var menu = actual_JSON.menu;
    var list = document.getElementById('menu-list');
    for (i in menu) {
        var div_wrap = document.createElement('div');
        div_wrap.className = "row mx-3";
        var title = document.createElement('h3');
        title.className = "col-12 col-lg-10 offset-lg-2";
        title.appendChild(document.createTextNode(menu[i].nombre));
        var description = document.createElement('p');
        description.className = 'col-12 offset-lg-3 col-lg-6';
        description.appendChild(document.createTextNode(menu[i].descripcion));
        var price = document.createElement('p');
        price.className = 'col-12 col-sm-2 offset-lg-3';
        price.appendChild(document.createTextNode(menu[i].precio+"€"));
        var cal = document.createElement('p');
        cal.className = 'col-12 col-sm-2 offset-sm-4';
        cal.appendChild(document.createTextNode(menu[i].calorias+" Kcal"));
        div_wrap.appendChild(title);
        div_wrap.appendChild(description);
        div_wrap.appendChild(price);
        div_wrap.appendChild(cal);
        list.appendChild(div_wrap);
        list.appendChild(document.createElement('br'));
    }
});

function loadJSON(callback) {   
    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', 'js/ejercicio3.json', true);
    xobj.onreadystatechange = function () {
        if (xobj.readyState == 4 && xobj.status == "200") callback(xobj.responseText);
    };
    xobj.send(null);  
}