/**
 * Aquí se recogen las funciones JS  que piden datos al servidor
 *  y modifican la estructura de la página
 */

 /**
  * Solicita al servidor los datos de las categorías por GET asíncrono a 
  * acategoriasJSON.php --> respuesta JSON
  * y crea una lista de vínculos. Cuando recibe la respuesta del servidor:
  *     - La convierte en un objeto JS que será un array. Cada elemento 
  *     del array es un objeto con campos codCat y nombre
  *     - Crea un elemento ul
  *     - Por cada elemento del array crea un vínculo usando el nombre y el código
  *     - Ese vínculo se introduce en un elemento li
  *     - El elemento li se introduce en la lista
  *     - Elimina el contenido de la sección "contenido" y luego introduce la lista en ella
  * @returns false. Para queno se recarge la página
  */
function cargarCategorias() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){

        if (this.readyState == 4 && this.status == 200) {
            //alert(this.responseText); //depuración
            // objeto JS (array)
            var cats = JSON.parse(this.responseText);
            var lista = document.createElement("ul");
        
            for (var i = 0; i < cats.length; i++) {
                var elem = document.createElement("li");
                //<a href="productosJSON.php?categoria=(cod)" onclick="cargarProductos(this);" >(nom)</a>
                var vinculo = crearVinculoCategorias(cats[i].nombre, cats[i].codCat);
                elem.appendChild(vinculo);
                lista.appendChild(elem);
            }
        
            var contenido = document.getElementById("contenido");
            //limpiar contenido previo
            contenido.innerHTML = "";
            var titulo = document.getElementById("titulo");
            //poner título
            titulo.innerHTML = "Categorías";
            //cargar rama DOM en el el contenedor contenido
            contenido.appendChild(lista);
        }
    };
    xhttp.open("GET", "categoriasJSON.php", true);
    xhttp.send();
    return false;
}

/**
 * Crea un vínculo
 * @param {string} nom. Nombre de la categoría 
 * @param {int} cod. Código de la categoría
 * @returns {HTMLAnchorElement} objeto. <a href="productosJSON.php?categoria=(cod)" onclick="cargarProductos(this);" >(nom)</a>
 */
function crearVinculoCategorias(nom, cod) {
    var vinculo = document.createElement("a");
    var ruta = "productosJSON.php?categoria=" + cod;
    vinculo.href = ruta;
    vinculo.innerHTML = nom;
    //mediante el atributo onclick este vínculo se asocia a la función cargarProductos()
    //this se refiere al elemento XHTML que ha provocado el evento -> el vínculo (la ruta del vínculo)
    vinculo.onclick = function() {return cargarProductos(this);};
    return vinculo;
    
}

/**
 * función que se encarga de cargar los productos de una categoría
 * @param {HTMLAnchorElement} destino. Es la ruta href del vínculo que lleva el query string para GET
 *  - Pide los datos por GET asíncrono al servidor productosJSON.php -> retorna JSON
 *  - Crea la tabla de productos mediante DOM
 *  - Elimina el contenido de la sección "contenido" para enganchar la tabla en ella.
 * @returns false. Para evitar que se recarge la página
 */
function cargarProductos(destino) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){

        if (this.readyState == 4 && this.status == 200) {

            var prod = document.getElementById("contenido");
            var titulo = document.getElementById("titulo");
            titulo.innerHTML = "Productos";
            //si hay error es porque la categoría no tiene productos
            try {
                var filas = JSON.parse(this.responseText);
                var tabla = crearTablaProductos(filas);
                prod.innerHTML = "";
                prod.appendChild(tabla);
            } catch(e) {
                var mensaje = document.createElement("p");
                mensaje.innerHTML = "Categoría sin productos";
                prod.innerHTML = "";
                prod.appendChild(mensaje);
            }

        }
    };

    xhttp.open("GET", destino, true);
    xhttp.send();
    return false;

}

/**
 * Función que toma un array de productos y devuelve un elemento table
 * con una fila por cada producto
 * @param {array} productos. Array JSON de productos
 * @returns {HTMLTableElement} objeto. Tabla HTML con todos los productos
 */
function crearTablaProductos(productos) {
    
    var tabla = document.createElement("table");
    var cabecera = crearFila(["Código", "Nombre", "Descripción", "Stock", "Comprar"], "th");
    tabla.appendChild(cabecera);
    for (var i = 0; i < productos.length; i++) {
        //formulario
        formu = crearFormulario("Añadir", productos[i].CodProd, anadirProductos);
        fila = crearFila([productos[i].CodProd, productos[i].Nombre, productos[i].Descripcion, productos[i].Stock], "td");
        celdaForm = document.createElement("td");
        celdaForm.appendChild(formu);
        fila.appendChild(celdaForm);
        tabla.appendChild(fila);
    }
    return tabla;
}

/**
 * Crea una fila "tr" rellenando de "th" o "td" según el parámetro tipo
 * @param {array} campos. Array con los nombres (string) de los campos o con los valores de los campos 
 * @param {string} tipo. "th" o "td" 
 * @returns HTMLTableRowElement objeto.
 */
function crearFila(campos, tipo) {
    var fila = document.createElement("tr");
    for (var i = 0; i < campos.length; i++) {
        var celda = document.createElement(tipo);
        celda.innerHTML = campos[i];
        fila.appendChild(celda);
    }
    return fila;
}

/**
 * Crea el formulario de cada fila
 * @param {string} texto. Texto del botón del formulario 
 * @param {int} cod. El código del producto  
 * @param {CallableFunction} funcion. Función que se encarga de enviar el formulario
 * @returns {HTMLFormElement} formulario.
 */
function crearFormulario(texto, cod, funcion) {
    var formu = document.createElement("form");
    //input para las unidades
    var unidades = document.createElement("input");
    unidades.value = 1;
    unidades.name = "unidades";
    //input oculto para el código del producto
    var codigo = document.createElement("input");
    codigo.value = cod;
    codigo.type = "hidden";
    codigo.name ="cod";
    //botón de envío
    var bsubmit = document.createElement("input");
    bsubmit.type = "submit";
    bsubmit.value = texto;
    //this -> objeto formulario. Se llamará a anadirProductos(objFormulario)
    formu.onsubmit = function() { return funcion(this);};
    formu.appendChild(unidades);
    formu.appendChild(codigo);
    formu.appendChild(bsubmit);
    return formu;
}

/**
 * Función asociada al formulario de la tabla de productos. Cuando se envía el formulario
 * se ejecuta esta función. El argumento de la función es el propio formulario.
 * La función se encarga de recoger los datos del formulario y enviarlos a anadirJSON.php.
 * El envío es POST asíncrono: se envía la cabecera y una cadena con parámetros.
 * Al recibir la respuesta muestra una alerta y llama a cargarCarrito()
 * @param {HTMLFormElement} formulario.
 * @returns false. Para que no se recarge la página.  
 */
function anadirProductos(formulario) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("producto añadido con éxito");
            cargarCarrito();
        }
    };

    //query string de anadirJOSN.php que se pasa como parámetro
    var params = "cod=" + formulario.elements.cod.value + "&unidades=" + formulario.elements.unidades.value;
    xhttp.open("POST", "anadirJSON.php", true);
    //mandar cabecera
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //mandar parámetros
    xhttp.send(params);
    return false;
}

/**
 * Función asociada al formulario de la tabla del carrito. Cuando se envía el formulario
 * se ejecuta esta función. El argumento de la función es el propio formulario.
 * La función se encarga de recoger los datos del formulario y enviarlos a eliminarJSON.php.
 * El envío es POST asíncrono: se envía la cabecera y una cadena con parámetros.
 * Al recibir la respuesta muestra una alerta y llama a cargarCarrito()
 * @param {HTMLFormElement} formulario.
 * @returns false. Para que no se recarge la página. 
 */
function eliminarProductos(formulario) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("producto eliminado con éxito");
            cargarCarrito();
        }
    };
    var params = "cod=" + formulario.elements.cod.value + "&unidades=" + formulario.elements.unidades.value;
    xhttp.open("POST", "eliminarJSON.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    return false;
}

/**
 * Función que muestra el carrito:
 * Pide por GET asíncrono a carritoJSON.php que devuelve un array JSON 
 * con todos los productos del carrito. Cuando llega:
 *  - borra la sección contenido y pone el título
 *  Si hay productos:
 *  - llama a crearTablaCarrito que monta una tabla HTML con todo
 *  - crea un link al final para procesar el pedido que será manejado por procesarPedido()
 *  Si no hay productos:
 *  - se informa y no se crea nada.
 * @returns false. Para evitar recargar la página
 */
function cargarCarrito() {
    //alert("Cargar carrito");
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var contenido = document.getElementById("contenido");
            contenido.innerHTML = "";
            var titulo = document.getElementById("titulo");
            titulo.innerHTML = "Carrito de la compra";
            // si no hay productos se produce una excepción
            try {
                var filas = JSON.parse(this.responseText);
                tabla = crearTablaCarrito(filas);
                contenido.appendChild(tabla);
                //link de procesar pedido
                var procesar = document.createElement("a");
                procesar.href = "#";
                procesar.innerHTML = "Realizar pedido";
                procesar.onclick = function() { return procesarPedido(); };
                contenido.appendChild(procesar);
            } catch (e) {
                var mensaje = document.createElement("p");
                mensaje.innerHTML = "Aún no tiene productos";
                contenido.appendChild(mensaje);
            }

        }
    };

    xhttp.open("GET", "carritoJSON.php", true);
    xhttp.send();
    return false;
}

/**
 * Función que retorna una tabla con todos los productos del carrito:
 *  - Toma un array de objetos. Cada objeto es un producto
 *  - Formará una cabecera con los nombres de las columnas
 *  - Formará una fila por cada producto.
 *  - Añadirá un formulario al final de cada producto para eliminar unidades del pedido.
 * @param {array} productos. Array de objetos. Cada objeto es un producto
 * @returns {HTMLTableElement} objeto.
 */
function crearTablaCarrito(productos) {

    var tabla = document.createElement("table");
    var cabecera = crearFila(["Código", "Nombre", "Descripción", "Unidades", "Eliminar"], "th");
    tabla.appendChild(cabecera);
    
    for (var i = 0; i < productos.length; i++) {
        //formulario
        formu = crearFormulario("Eliminar", productos[i].CodProd, eliminarProductos);
        fila = crearFila([productos[i].CodProd, productos[i].Nombre, productos[i].Descripcion, productos[i].unidades], "td");
        celdaForm = document.createElement("td");
        celdaForm.appendChild(formu);
        fila.appendChild(celdaForm);
        tabla.appendChild(fila);
    }

    return tabla;

}

/**
 * Esta función solicita al servidor procesarPedidoJSON.php
 * Muestra un mensaje de confirmación o error según reciba 
 * las cadenas "TRUE" o "FALSE" en la respuesta del servidor.
 * @returns false. Para no recargar la página.
 */
function procesarPedido() {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var contenido = document.getElementById("contenido");
            contenido.innerHTML = "";
            var titulo = document.getElementById("titulo");
            titulo.innerHTML = "Estado del pedido";
            alert(this.responseText);
            //Aquí habría que ir con ojo !==FALSE por los WARNING
            if (this.responseText == "TRUE") {
                contenido.innerHTML = "Pedido realizado";
            } else {
                contenido.innerHTML = "Error al procesar el pedido";
            }
        }
    };

    xhttp.open("GET", "procesarPedidoJSON.php", true);
    xhttp.send();
    return false;

}