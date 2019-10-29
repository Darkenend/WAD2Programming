alert("This program is gonna ask for 10 numbers");
let daArray = [];
let keyCode;
let sortedArray = [];
let sortedArray2 = [];
for (let i = 0; i < 10; i++) {
    daArray[i] = parseInt(prompt("Please insert a number (" + (i + 1) + "/10)"));
    while (isNaN(daArray[i])) {
        daArray[i] = parseInt(prompt("ERROR, NOT A NUMBER.\n" +
            "Please insert a number (" + (i + 1) + "/10)"));
    }
}
console.log(daArray);
keyCode = parseInt(prompt("Choose a sorting algorithm.\n" +
    "[1] Quicksort\n[2] Mergesort\n[3] Bubble\n[4] System Sort\nAnything else to quit."));
while (isNaN(keyCode)) {
    keyCode = parseInt(prompt("ERROR, NOT A NUMBER.\n\nChoose a sorting algorithm." +
        "\n[1] Quicksort\n[2] Mergesort\n[3] Bubble\n[4] System Sort\nAnything else to quit."));
}
switch (keyCode) {
    default:
        alert("Have a nice day!");
        break;
    case 1:
        // Quicksort
        sortedArray = quickSort(daArray, 0, daArray.length - 1);
        sortedArray = sortedArray.reverse();
        break;
    case 2:
        // Mergesort
        sortedArray = mergeSort(daArray);
        sortedArray = sortedArray.reverse();
        break;
    case 3:
        // Bubble
        sortedArray = bubbleSort(daArray);
        sortedArray = sortedArray.reverse();
        break;
    case 4:
        // System Sort
        sortedArray = daArray.sort();
        sortedArray2 = sortedArray.reverse();
        break;
}
if (keyCode >= 1 && keyCode <= 4) {
    alert("The sorted numbers are:\n" +
        sortedArray[0] + ", " +
        sortedArray[1] + ", " +
        sortedArray[2] + ", " +
        sortedArray[3] + ", " +
        sortedArray[4] + ", " +
        sortedArray[5] + ", " +
        sortedArray[6] + ", " +
        sortedArray[7] + ", " +
        sortedArray[8] + ", " +
        sortedArray[9]);
}
if (keyCode === 4) {
    alert("The sorted numbers inverted are:\n" +
        sortedArray2[0] + ", " +
        sortedArray2[1] + ", " +
        sortedArray2[2] + ", " +
        sortedArray2[3] + ", " +
        sortedArray2[4] + ", " +
        sortedArray2[5] + ", " +
        sortedArray2[6] + ", " +
        sortedArray2[7] + ", " +
        sortedArray2[8] + ", " +
        sortedArray2[9]);
}

/**
 * Function that recursively sorts an array of data using the quicksort method
 * @param myArray Array to be sorted
 * @param left Index on the extreme left of the sector to sort
 * @param right Index on the extreme right of the sector to sort
 * @returns {*} Sorted array
 */
function quickSort(myArray, left, right) {
    let index;
    if (myArray.length > 1) {
        index = partition(myArray, left, right);
        if (left < index - 1) quickSort(myArray, left, index - 1);
        if (index < right) quickSort(myArray, index, right);
    }
    return myArray;
}

/**
 * Function that recursively sorts an array of data using the mergesort method
 * @param myArray Array to be sorted
 * @returns {*[]|*} Sorted array
 */
function mergeSort(myArray) {
    // Base case
    if (myArray.length <= 1) {
        return myArray;
    }
    const middle = Math.floor(myArray.length / 2);
    const left = myArray.slice(0, middle);
    const right = myArray.slice(middle);
    return merge(mergeSort(left), mergeSort(right));
}

/**
 * Function that recursively sorts an array of data using the bubble method
 * @param myArray Array to sort
 * @returns {*} Sorted array
 */
function bubbleSort(myArray) {
    if (myArray.length <= 1) {
        return myArray;
    }

    for (let i = 0; i < myArray.length; i++) {
        for (let j = 0; j < (myArray.length - i - 1); j++) {
            // Swap if the element is larger than the element right next to it
            if (myArray[j] > myArray[j + 1]) {
                [myArray[j], myArray[j + 1]] = [myArray[j + 1], myArray[j]]; // ES6 Swap
            }
        }
    }

    return myArray;
}

/**
 * Function that finds the partition of the array
 * @param myArray Array to be partitioned
 * @param left Left index
 * @param right Right index
 * @returns {*} Index from which do a partition
 */
function partition(myArray, left, right) {
    let pivot = myArray[Math.floor((right + left) / 2)];
    while (left <= right) {
        while (myArray[left] < pivot) left++;
        while (myArray[right] > pivot) right--;
        if (left <= right) {
            swap(myArray, left, right);
            left++;
            right--;
        }
    }
    return left;
}

/**
 * Function that swaps two elements in an array
 * @param myArray Array of elements to swap
 * @param leftIndex Index of the left item to swap
 * @param rightIndex Index of the right item to swap
 */
function swap(myArray, leftIndex, rightIndex) {
    let temp = myArray[leftIndex];
    myArray[leftIndex] = myArray[rightIndex];
    myArray[rightIndex] = temp;
}

/**
 * Merges 2 arrays
 * @param left Array to be placed at the "left"
 * @param right Array to be placed at the "right"
 * @returns {*[]} Merged array
 */
function merge(left, right) {
    let resultArray = [], leftIndex = 0, rightIndex = 0;

    while (leftIndex < left.length && rightIndex < right.length) {
        if (left[leftIndex] < right[rightIndex]) {
            resultArray.push(left[leftIndex]);
            leftIndex++;
        } else {
            resultArray.push(right[rightIndex]);
            rightIndex++;
        }
    }

    return resultArray.concat(left.slice(leftIndex)).concat(right.slice(rightIndex));
}
