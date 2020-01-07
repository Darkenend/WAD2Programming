var intervalid = 0;
var word = ["R", "A", "I", "N", "M", "A", "K", "E", "R"];
var word_length = word.length;

/**
 * This function prepares the new round
 */
function matchPreparation() {
    var temp_word = prompt("Introduce la nueva palabra:");
    word = temp_word.toUpperCase().split("");
    word_length = word.length;
    var res_stat = document.getElementById('result_status');
    res_stat.innerHTML = "";
    var table = document.createElement("table");
    for (var i = 0; i<word_length;i++) {
        var cell = document.createElement("th");
        cell.innerHTML = word[i];
        table.appendChild(cell);
    }
    res_stat.appendChild(table);
}