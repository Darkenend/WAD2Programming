cd1 = new cdMusica('The Spark', 'Enter Shikari', 2018);
cd2 = new cdMusica('American Idiot', 'Green Day', 2004);
cd3 = new cdMusica('Nevermind', 'Nirvana', 1991);
document.write(cd1.imprimir);
document.write(cd2.imprimir);
document.write(cd3.imprimir);

function cdMusica(titulo, grupo, fecha) {
    this.titulo = titulo;
    this.grupo = grupo;
    this.fecha = fecha;
    console.log(this.titulo);
    console.log(this.grupo);
    console.log(this.fecha);
    this.imprimir = aString();

    function aString() {
        return `Album: ${this.titulo}<br>Grupo: ${this.grupo}<br>Fecha: ${this.fecha}<br>`;
    }
}