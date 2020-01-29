// We're declaring the usable variables
var fsnombre = document.getElementById('name-search');
var fsapellido = document.getElementById('lastname-search');
var fnombre = document.getElementById('name');
var fapellido = document.getElementById('lastname');
var fcalle = document.getElementById('street');
var fnumero = document.getElementById('number');
var fextra = document.getElementById('extra');
var ffecha = document.getElementById('date');
var results = document.getElementById('results');
//* JSON Loaded directly, we'll learn to read/write files later
var pedidosjson = JSON.parse('{"pedidos":[{"nombre":"Juan","apellidos":"Delgado Martinez","contenido":{"bicicleta":"A2023"},"direccion":{"calle":"Barco","numero":4,"extra":"Tercer Piso A"},"fecha":"2000-5-19"},{"nombre":"Álvaro","apellidos":"Real Gomez","contenido":{"guantes":"CUSTOM"},"direccion":{"calle":"Turia","numero":39,"extra":"Puerta 6"},"fecha":"2020-1-12"},{"nombre":"John","apellidos":"Doe","contenido":{"rifle":"M1 Garand"},"direccion":{"calle":"Fake Address","numero":123,"extra":""},"fecha":"1945-1-1"}]}');
var pedidos = [];
// Loop where you work with each thing
for (i = 0; i < pedidosjson.pedidos.length; i++) {
    pedidos[i] = new Pedido(pedidosjson.pedidos[i].nombre, pedidosjson.pedidos[i].apellidos, pedidosjson.pedidos[i].contenido, pedidosjson.pedidos[i].direccion, pedidosjson.pedidos[i].fecha);
}

console.log('pedidosjson :', pedidosjson);
for (i in pedidosjson.pedidos) {
    console.log('nombre :', pedidosjson.pedidos[i].nombre);
}


/**
 * Object 'pedido' with which we'll work
 * @param {String} nombre Name of Recipient
 * @param {String} apellidos Last Name of Recipient
 * @param {Array} contenido Content of the 'pedido'
 * @param {*} direccion Address to which it's shipped
 * @param {String} fecha Date when the 'pedido' was made
 */
function Pedido(nombre, apellidos, contenido, direccion, fecha) {
    this.nombre = nombre;
    this.apellidos = apellidos;
    this.contenido = contenido;
    this.direccion = direccion;
    this.fecha = fecha;
    this.getInfo = function() {
        return "Nombre: "+this.nombre+
            "<br>Apellido: "+this.apellidos+
            "<br>Pedido: "+this.pedido+
            "<br>Dirección: "+this.direccion+
            "<br>Fecha: "+this.fecha;
    }
}

function buscarPedido() {
    results.innerHTML = "";
    var snombre = fsnombre.value;
    console.log('snombre :', snombre);
    var sapellidos = fsapellido.value;
    console.log('sapellidos :', sapellidos);
    for (i = 0; i < pedidosjson.pedidos.length; i++) {
        console.log('pedidosjson.pedidos[i].nombre :', pedidosjson.pedidos[i].nombre);
        if (snombre === pedidosjson.pedidos[i].nombre && sapellidos === pedidosjson.pedidos[i].apellidos) {
            results.innerHTML += "Nombre: "+pedidosjson.pedidos[i].nombre+
            "<br>Apellido: "+pedidosjson.pedidos[i].apellidos+
            "<br>Pedido: "+pedidosjson.pedidos[i].contenido+
            "<br>Dirección: Calle "+pedidosjson.pedidos[i].direccion.calle+" Nº"+pedidosjson.pedidos[i].direccion.numero+" "+pedidosjson.pedidos[i].direccion.extra+
            "<br>Fecha: "+pedidosjson.pedidos[i].fecha+"<hr>";
        }
    }
}