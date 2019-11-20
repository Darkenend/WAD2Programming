let dni_regexp = new RegExp("\\d{8}");
let nif_standard_regexp = new RegExp("\\d{8}[A-Z]{1}");
let nif_non_regular_regexp = new RegExp("[KLMXYZ]{1}\\d{7}[A-Z]{1}");
let email_regexp = new RegExp("[\\w.\\d]+@\\w+.\\w{2,3}");
let phone_regexp = new RegExp("\\d{9}");


function validatePhone() {
    let element = document.getElementById("phone");
    let myString = element.value;
    if (phone_regexp.test(myString)) {
        element.style.borderColor = "green";
    } else {
        element.style.borderColor = "red";
    }
}

function validateEmail() {
    let element = document.getElementById("email");
    let myString = element.value;
    if (email_regexp.test(myString)) {
        element.style.borderColor = "green";
    } else {
        element.style.borderColor = "red";
    }
}

function validateNIF() {
    let element = document.getElementById("nif");
    let myString = element.value;
    if (nif_standard_regexp.test(myString) || nif_non_regular_regexp.test(myString)) {
        element.style.borderColor = "green";
    } else {
        element.style.borderColor = "red";
    }
}

function validateDNI() {
    let element = document.getElementById("dni");
    let myString = element.value;
    if (dni_regexp.test(myString)) {
        element.style.borderColor = "green";
    } else {
        element.style.borderColor = "red";
    }
}