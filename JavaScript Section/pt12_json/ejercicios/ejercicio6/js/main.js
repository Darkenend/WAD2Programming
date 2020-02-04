loadJSON(function(response) {
    // Parse JSON string into object
    var actual_JSON = JSON.parse(response);
    var peliculas = actual_JSON.peliculas;
    var cartelera = document.getElementById('cartelera');
    var headingclasses = 'col-12 col-lg-10 offset-lg-1 py-1 text-center'
    var panelclasses = 'col-12 col-lg-10 offset-lg-1 py-1';
    for (i in peliculas) {
        // Movie Wrapper
        var pelicula = document.createElement('div');
        pelicula.className = 'row col-12 col-lg-10 offset-lg-1 py-3 pelicula';
        var movietitle = document.createElement('h2');
        movietitle.className = headingclasses;
        movietitle.innerHTML = peliculas[i].titulo;
        pelicula.appendChild(movietitle);

        // Directors Label
        var directorslabel = document.createElement('h4');
        directorslabel.className = headingclasses;
        directorslabel.innerHTML = 'Dirección';
        pelicula.appendChild(directorslabel);
        // Movie Directors
        var moviedirectors = document.createElement('div');
        moviedirectors.className = panelclasses;
        var directorsstring = "";
        //* Small loop to add all directors
        for (j in peliculas[i].direccion) {
            if (parseInt(j) === 0) directorsstring += peliculas[i].direccion[j];
            else directorsstring += ", "+peliculas[i].direccion[j];
        }
        moviedirectors.innerHTML = directorsstring;
        pelicula.appendChild(moviedirectors);

        // Info Label
        var infolabel = document.createElement('h4');
        infolabel.className = headingclasses;
        infolabel.innerHTML = 'Información';
        pelicula.appendChild(infolabel);
        // Info about the movie
        var info = document.createElement('div');
        info.className = panelclasses;
        //* If the movie comes from Spain, it won't display the original title
        if (peliculas[i].informacion.pais === "España") info.innerHTML = peliculas[i].informacion.pais+", "+peliculas[i].informacion.anyo+" "+peliculas[i].informacion.minutos+"min";
        else info.innerHTML = "Titulo Original: "+peliculas[i].informacion.titulooriginal+" "+peliculas[i].informacion.pais+", "+peliculas[i].informacion.anyo+" "+peliculas[i].informacion.minutos+"min";
        pelicula.appendChild(info);

        // Starring Label
        var starlabel = document.createElement('h4');
        starlabel.className = headingclasses;
        starlabel.innerHTML = 'Interpretes';
        pelicula.appendChild(starlabel);
        // Starring
        var starelement = document.createElement('div');
        starelement.className = panelclasses;
        //* Loop to add all starring
        var interpretesstring = "";
        for (j in peliculas[i].interpretes) {
            if (parseInt(j) === 0) interpretesstring += peliculas[i].interpretes[j];
            else interpretesstring += ", "+peliculas[i].interpretes[j];
        }
        starelement.innerHTML = interpretesstring;
        pelicula.appendChild(starelement);
        
        // Description Label
        var desclabel = document.createElement('h4');
        desclabel.className = headingclasses;
        desclabel.innerHTML = 'Sinopsis';
        pelicula.appendChild(desclabel);
        // Description
        var descelement = document.createElement('div');
        descelement.className = panelclasses;
        descelement.innerHTML = peliculas[i].descripcion;
        pelicula.appendChild(descelement);

        if (peliculas[i].url !== "") {
            // URL Label
            var urllabel = document.createElement('h4');
            urllabel.className = headingclasses;
            urllabel.innerHTML = 'URL';
            pelicula.appendChild(urllabel);
            // URL
            var urlelement = document.createElement('div');
            urlelement.className = panelclasses;
            var link = document.createElement('a');
            link.href = peliculas[i].url;
            link.innerHTML = peliculas[i].url;
            urlelement.appendChild(link);
            pelicula.appendChild(urlelement);
        }

        // Genre and Rating Label
        var genratlabel = document.createElement('h4');
        genratlabel.className = headingclasses;
        genratlabel.innerHTML = 'Género y Clasificación';
        pelicula.appendChild(genratlabel);
        // Genre and Rating
        var genratelement = document.createElement('div');
        genratelement.className = panelclasses;
        if (peliculas[i].calificacion === "RP") genratelement.innerHTML = peliculas[i].genero+" pendiente de calificacion.";
        else if (peliculas[i].calificacion === "TP") genratelement.innerHTML = peliculas[i].genero+" para todos los publicos";
        else genratelement.innerHTML = peliculas[i].genero+" apto para mayores de "+peliculas[i].calificacion;
        pelicula.appendChild(genratelement);

        //Add Movie to Card
        cartelera.appendChild(pelicula);
    }
});

function loadJSON(callback) {   
    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', 'js/ejercicio6.json', true);
    xobj.onreadystatechange = function () {
        if (xobj.readyState == 4 && xobj.status == "200") callback(xobj.responseText);
    };
    xobj.send(null);  
}