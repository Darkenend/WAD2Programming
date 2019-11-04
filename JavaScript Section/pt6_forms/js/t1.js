function fValidate() {
    let name = document.getElementById('name').value;
    if (validateWord(name)) {
        document.getElementById('name').style.borderColor = "green";
    } else {
        document.getElementById('name').style.borderColor = "red";
    }
    let lastname1 = document.getElementById('lastname1').value;
    if (validateWord(lastname1)) {
        document.getElementById('lastname1').style.borderColor = "green";
    } else {
        document.getElementById('lastname1').style.borderColor = "red";
    }
    let lastname2 = document.getElementById('lastname2').value;
    if (validateWord(lastname2)) {
        document.getElementById('lastname2').style.borderColor = "green";
    } else {
        document.getElementById('lastname2').style.borderColor = "red";
    }
    let address = document.getElementById('address').value;
    if (validateWord(address)) {
        document.getElementById('address').style.borderColor = "green";
    } else {
        document.getElementById('address').style.borderColor = "red";
    }
    let stNumber = document.getElementById('stNumber').value;
    if (validateNumber(stNumber)) {
        document.getElementById('stNumber').style.borderColor = "green";
    } else {
        document.getElementById('stNumber').style.borderColor = "red";
    }
    let door = document.getElementById('door').value;
    if (validateWord(door)) {
        document.getElementById('door').style.borderColor = "green";
    } else {
        document.getElementById('door').style.borderColor = "red";
    }
    let postcode = document.getElementById('postcode').value;
    if (validateNumber(postcode)) {
        document.getElementById('postcode').style.borderColor = "green";
    } else {
        document.getElementById('postcode').style.borderColor = "red";
    }
    let homephone = document.getElementById('homephone').value;
    if (validatePhone(homephone)) {
        document.getElementById('homephone').style.borderColor = "green";
    } else {
        document.getElementById('homephone').style.borderColor = "red";
    }
    let cellphone = document.getElementById('cellphone').value;
    if (validatePhone(cellphone)) {
        document.getElementById('cellphone').style.borderColor = "green";
    } else {
        document.getElementById('cellphone').style.borderColor = "red";
    }
    let email = document.getElementById('email').value;
    if (validateEmail(email)) {
        document.getElementById('email').style.borderColor = "green";
    } else {
        document.getElementById('email').style.borderColor = "red";
    }
    let gender;
    for (let i = 0; i < 3; i++) {
        if (document.getElementById('gender'+(i+1)).checked) gender = document.getElementById('gender' + (i + 1)).value;
    }

    if (lastname1.toLowerCase() === lastname2.toLowerCase()) {
        alert("¡Tus padres son hermanos!");
    }
}

function validateWord(myString) {
    let myRegEx = new RegExp(/(\w||[À-ÿ]||\u00f1\u00d1)+/g);
    return myRegEx.test(myString);
}

function validatePhone(myString) {
    let myRegEx = [new RegExp(/(\+\d{1,3})\d{9}/g), new RegExp(/0{2}\d{10,13}/g), new RegExp(/\d{9,12}/g)];
    let valid = false;
    // for then if
    for (let i = 0; i < 3; i++) {
        if (myRegEx[i].test(myString)) {
            valid = true;
        }
    }
    return valid;
}

function validateEmail(myString) {
    let myRegEx = new RegExp(/(\w||.)+@\w+.\w+/g);
    return myRegEx.test(myString);
}

function validateNumber(myString) {
    let myRegEx = new RegExp(/[0-9]+/g);
    return myRegEx.test(myString);
}