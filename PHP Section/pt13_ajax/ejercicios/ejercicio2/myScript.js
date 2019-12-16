function sum() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            switch (this.status) {
                case 200:
                    document.getElementById('result').innerHTML = this.response;
                    break;
                case 404:
                    alert("Error 404: NOT FOUND");
                    break;
                case 400:
                    alert("Error 400: BAD REQUEST");
                    break;
                case 500:
                    alert("Error 500: INTERNAL SERVER ERROR");
                    break;
            }
        }
    };
    n1 = document.getElementById('n1').value;
    n2 = document.getElementById('n2').value;
    xhttp.open("POST", "sum.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("n1="+n1+"&n2="+n2);
    return false;
}