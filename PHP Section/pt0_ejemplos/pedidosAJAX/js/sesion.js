/**
 * Aquí se recogen las funciones JS para
 * hacer login y cerrar sesion
 */

/**
 * Función que envía a logoutJSON.php la petición de cerrar sesión
 * La petición se envía por GET y asíncrona.
 * Una vez el servidor ha terminado (no hay response):
 *  - Se oculta la sección principal.
 *  - Se muestra la sección de login.
 *  - se borra la sección contenido.
 * Es decir, se deja la paǵina como si fuera la primera vez que se entra
 */
function cerrarSesionUnaPagina() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //cambiar visibilidades de las secciones
            document.getElementById("principal").style.display = "none";
            document.getElementById("login").style.display = "block";
            document.getElementById("contenido").innerHTML = "";
            alert("Sesion cerrada con éxito");
        }
    };
    xhttp.open("GET", "logoutJSON.php", true);
    xhttp.send();
    
    //para no cargar una nueva página
    return false;
}

/**
 * Función que envía a loginJSON.php los datos del formulario.
 * Al tratarse de un formulario la petición se envía por el método POST
 * y, por tanto, se añade cabecera y parámetros. 
 * Si son correctos ("TRUE"):
 *  - Muestra la sección principal
 *  - Oculta la sección del formulario
 *  - Introduce el nombre del usuario en la parte apropiada de la cabecera (cabeceraJSON.php)
 * Si no son correctos ("FALSE"):
 *  - Muestra un mensaje de error con una alerta 
 */
function login() {
    //nuevo objeto XMLhttpRequest
    var xhttp = new XMLHttpRequest();
    
    //función de respuesta cuando conteste el servidor
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert (this.responseText); //para depurar
            //OJO que en responseText pueden ir mensajes de error/warnings de PHP
            //con this.responseTest === "FALSE" no irá si hay errores
            if (this.responseText !== "TRUE") {
                alert("Revise usuario y contraseña");
            } else {
                //mostramos sección principal
                document.getElementById("principal").style.display = "block";
                //ocultamos sección login
                document.getElementById("login").style.display = "none";
                //ponemos usuario devuelto en el hueco correspondiente
                document.getElementById("cabUsuario").innerHTML = "Usuario: " + usuario;
                cargarCategorias();
            }
        }
    };

    //recoger parámetros formulario
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;

    //montar cadena de parámetros formato query string
    var params = "usuario=" + usuario + "&clave=" + clave;
    
    //preparar tipo petición POST asíncrona
    xhttp.open("POST", "loginJSON.php", true);
    
    //envio por POST requiere cabecera y cadena de parámetros
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);

    //para no cargar nueva página
    return false;
}