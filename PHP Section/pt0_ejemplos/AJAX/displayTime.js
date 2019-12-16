var xhttp = new HMLHttpRequest();
setInterval(function() {
    xhttp.open("GET", "horaServidor.php", false);
    xhttp.send();
    document.getElementById('principal').innerHTML = this.response;
}, 5000);