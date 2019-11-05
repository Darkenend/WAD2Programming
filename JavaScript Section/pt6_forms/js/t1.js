function checkName() {
    let name = document.getElementById('name').value;
    if (validateWord(name)) {
        document.getElementById('name').style.borderColor = "green";
        document.getElementById('name_error').setAttribute('hidden');
    } else {
        document.getElementById('name').style.borderColor = "red";
        document.getElementById('name_error').removeAttribute('hidden');
    }
}

function checkLastName1() {
    let lastname1 = document.getElementById('lastname1').value;
    if (validateWord(lastname1)) {
        document.getElementById('lastname1').style.borderColor = "green";
        document.getElementById('ln1_error').setAttribute('hidden');
    } else {
        document.getElementById('lastname1').style.borderColor = "red";
        document.getElementById('ln1_error').removeAttribute('hidden');
    }
}

function checkLastName2() {
    let lastname2 = document.getElementById('lastname2').value;
    if (validateWord(lastname2)) {
        document.getElementById('lastname2').style.borderColor = "green";
        document.getElementById('ln2_error').setAttribute('hidden');
    } else {
        document.getElementById('lastname2').style.borderColor = "red";
        document.getElementById('ln2_error').removeAttribute('hidden');
    }
}

function checkStreetName() {
    let address = document.getElementById('address').value;
    if (validateWord(address)) {
        document.getElementById('address').style.borderColor = "green";
        document.getElementById('add_error').setAttribute('hidden');
    } else {
        document.getElementById('address').style.borderColor = "red";
        document.getElementById('add_error').removeAttribute('hidden');
    }
}

function checkStreetNumber() {
    let stNumber = document.getElementById('stNumber').value;
    if (validateNumber(stNumber)) {
        document.getElementById('stNumber').style.borderColor = "green";
        document.getElementById('stNu_error').setAttribute('hidden');
    } else {
        document.getElementById('stNumber').style.borderColor = "red";
        document.getElementById('stNu_error').removeAttribute('hidden');
    }
}

function checkDoor() {
    let door = document.getElementById('door').value;
    if (validateDoor(door)) {
        document.getElementById('door').style.borderColor = "green";
        document.getElementById('door_error').setAttribute('hidden');
    } else {
        document.getElementById('door').style.borderColor = "red";
        document.getElementById('door_error').removeAttribute('hidden');
    }

    function validateDoor(door) {
        let myRegExp = new RegExp(/[a-zA-Z]/g);
        let valid = false;
        if (myRegExp.test(door)) valid = true;
        myRegExp = new RegExp(/[0-9]{1,3}/g);
        if (myRegExp.test(door)) valid = true;
        return valid;
    }
}

function checkPostCode() {
    let postcode = document.getElementById('postcode').value;
    if (validateNumber(postcode)) {
        document.getElementById('postcode').style.borderColor = "green";
        document.getElementById('poco_error').setAttribute('hidden');
    } else {
        document.getElementById('postcode').style.borderColor = "red";
        document.getElementById('poco_error').removeAttribute('hidden');
    }
}

function checkHomePhone() {
    let homephone = document.getElementById('homephone').value;
    if (validatePhone(homephone)) {
        document.getElementById('homephone').style.borderColor = "green";
        document.getElementById('hpho_error').setAttribute('hidden');
    } else {
        document.getElementById('homephone').style.borderColor = "red";
        document.getElementById('hpho_error').removeAttribute('hidden');
    }
}

function checkCellPhone() {
    let cellphone = document.getElementById('cellphone').value;
    if (validatePhone(cellphone)) {
        document.getElementById('cellphone').style.borderColor = "green";
        document.getElementById('cpho_error').setAttribute('hidden');
    } else {
        document.getElementById('cellphone').style.borderColor = "red";
        document.getElementById('cpho_error').removeAttribute('hidden');
    }
}

function checkEmail() {
    let email = document.getElementById('email').value;
    if (validateEmail(email)) {
        document.getElementById('email').style.borderColor = "green";
    } else {
        document.getElementById('email').style.borderColor = "red";
        document.getElementById('email_error').removeAttribute('hidden');
    }
}

function validateWord(myString) {
    let myRegEx = new RegExp(/[a-zA-ZÀ-ÿ]+\b/g);
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