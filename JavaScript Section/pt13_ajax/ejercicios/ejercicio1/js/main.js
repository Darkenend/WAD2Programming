var number;
var reply = document.getElementById('reply');

document.getElementById('submitnum').onclick = function() {
    number = parseInt(document.getElementById('evalnum').value);
    if (isNaN(number)) alert("Write an actual number");
    else loadData();
}

function loadData() {   
    const xobj = new XMLHttpRequest();
    
    xobj.onreadystatechange = function () {
        if (xobj.readyState == 4 && xobj.status == "200") {
            var responsestring = "";
            responsestring += number;
            if (parseInt(this.responseText) == 0) responsestring += " es primo";
            else responsestring += " no es primo";
            responsestring += checkPalindrome(number);
            reply.innerHTML = responsestring;
        }
    };

    xobj.open('POST', 'form.php', true);
    xobj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xobj.send("numero="+number);  
}

function checkPalindrome(num) {
    var straight = String(num).split('');
    var reverse = Array.from(straight);
    reverse.reverse();
    for (var i = 0; i < straight.length; i++) if (straight[i] !== reverse[i]) return " y no es palindromo.";
    return " y es palindromo.";
}