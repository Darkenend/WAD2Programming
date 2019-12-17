var animals = [];
var races = ["Perro", "Gato", "Conejo"];
var id_master = 1;
var animals_generated = rng(15, 5);
for (var i = 0; i < animals_generated; i++) {
    animals.push(new Animal(races[rng(races.length-1, 0)], rng(20, 0), Math.random() >= 0.5, Math.random() >= 0.5));
}
console.log(animals);

/**
 * The Object constructor for an animal.
 * @param {String} race Race del animal
 * @param {number} age Age of the animal
 * @param {boolean} vaccine If the animal is vaccinated 
 * @param {boolean} sterile If the animal is sterile 
 */
function Animal(race, age, vaccine, sterile) {
    this.race = race;
    this.age = parseInt(age);
    if (isNaN(this.age)) this.age = 4;
    this.id = id_master;
    id_master++;
    this.vaccine = vaccine;
    this.sterile = sterile;

    function sterilize() {
        if (this.sterile) return false;
        else {
            this.sterile = true;
            return true;
        }
    }

    function vaccinate() {
        if (this.vaccine) return false;
        else {
            this.vaccine = true;
            return true;
        }
    }
}

function adoptAnimal() {
    var animalID = document.getElementById('id_search_a').value;
    for (var i = 0; i < animals.length; i++) if (animalID == animals[i].id) animals.splice(animals.indexOf(animals[i]), 1);
    updateAnimalList();
}

function sterilizeAnimal() {
    for (var i = 0; i < animals.length; i++) {
        if (animals[i].id == myId) {
            if (animals[i].sterilize()) alert("El animal con ID "+animals[i].id+" ha sido vacunado.");
            else alert("El animal con ID "+animals[i].id+" ya estaba vacunado.");
        } else {
            
        }
    }
    updateAnimalList();
}

function showAnimal() {
    console.log("showing animal");
}

/**
 * This function updates the list of Animals
 */
function updateAnimalList() {
    var list_container = document.getElementById('animallist');
    list_container.innerHTML = "";
    var header = document.createElement('h4');
    header.appendChild(document.createTextNode('Animales'));
    list_container.appendChild(header);
    var list = document.createElement('ul');
    for (var i = 0; i < animals.length; i++) {
        var element = document.createElement('li');
        var text_inner = document.createTextNode(parseInt(animals[i].id));
        element.appendChild(text_inner);
        element.addEventListener('click', showAnimal);
        list.appendChild(element);
    }
    list_container.appendChild(list);
}

/**
 * This function returns a number between the maximum and minimum given
 * @param {number} max Maximum number possible
 * @param {number} min Minimum number possible
 */
function rng(max, min) {
    return Math.floor(Math.random() * max) + min;
}