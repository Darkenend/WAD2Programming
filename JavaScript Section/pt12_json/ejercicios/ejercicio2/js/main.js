loadJSON(function(response) {
    // Parse JSON string into object
    var actual_JSON = JSON.parse(response);
    mydata = actual_JSON.mensaje;
    
    // HTML Elements for ease of access
    var sender = document.getElementById('sender');
    var reciever = document.getElementById('reciever');
    var subject = document.getElementById('subject');
    var message = document.getElementById('message');
    
    // From who it is
    sender.innerHTML = "De: "+mydata.remite.nombre+" ("+mydata.remite.email+")";
    
    // To who it sent
    reciever.innerHTML = "Para: "+mydata.destinatario.nombre+" ("+mydata.destinatario.email+")";
    
    // Subject
    subject.innerHTML = mydata.asunto;
    
    // Message
    for (i in mydata.texto) {
        var p = document.createElement('p');
        p.className = "col-12 col-lg-8 offset-lg-2";
        p.appendChild(document.createTextNode(mydata.texto[i]));
        message.appendChild(p);
    }
});

function loadJSON(callback) {   
    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', 'js/ejercicio2.json', true);
    xobj.onreadystatechange = function () {
        if (xobj.readyState == 4 && xobj.status == "200") callback(xobj.responseText);
    };
    xobj.send(null);  
}

