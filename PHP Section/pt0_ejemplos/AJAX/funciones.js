function categorias() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // crear lista
            var lista = document.createElement("ul");
            //meter los datos de la respuesta en un array
            var cats = JSON.parse(this.response);
            //para cada elemento del array
            for (var i = 0; i < cats.length; i++) {
                //se crea un elemento ul con el campo nombre
                var elem = document.createElement("li");
                var link = document.createElement("a");
                link.href = "productos.php?categoria="+cats[i].cod;
                link.innerHTML = cats[i].nombre;
                elem.appendChild(link);
                //se añade a la lista
                lista.appendChild(elem);
            }
            //en realidad es la section donde se añade la lista
            var body = document.getElementById("principal");
            //eliminar contenido actual
            body.innerHTML = "";
            //añade la lista
            body.appendChild(lista);
        }
    }; //function
    xhttp.open("GET", "datosCategoriasJSON.php", true);
    xhttp.send();
    //para que no se siga el link se retorna false
    return false;
}