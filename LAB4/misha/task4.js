let arr = [1,2,3,332,2,23,4,5,3,87,54,63];
function sort(arr){
    let arr1 = [];let arr2 = [];let arr3 = [];let arr4 = [];
    for (let i = 0;i<arr.length; i++){
        if (arr[i] % 2 === 0){
            arr[i] % 3 === 0 ? arr2.push(arr[i]) : arr1.push(arr[i]);
        }
        else if (arr[i] % 3===0)
            arr3.push(arr[i]);
        else
            arr4.push(arr[i]);
    }
    console.log(arr1, arr2.length, arr3.length, arr4.length)
    return arr1.concat(arr2).concat(arr3).concat(arr4);
}
function quickSort(arr) {
    if (arr.length < 2) return arr;
    let pivot = arr[0];
    const left = [];
    const right = [];
    for (let i = 1; i < arr.length; i++) {
        if (pivot > arr[i]) {
            left.push(arr[i]);
        } else {
            right.push(arr[i]);
        }
    }
    return quickSort(left).concat(pivot, quickSort(right));
}
console.log(arr);
arr = sort(arr);
console.log(arr);
arr = quickSort(arr);
console.log(arr);

let wordList = ['word', 'worm', 'minecraft', 'postavte max', 'okay', 'warn'];
let inputIn = document.querySelector('.task4Input');

function autocompleteMatch(input) {
    if (input == '') {
        return [];
    }
    let reg = new RegExp(input)
    return wordList.filter(function(term) {
        if (term.match(reg)) {
            return term;
        }
    });
}

function showResults(val) {
    res = document.getElementById("result");
    res.innerHTML = '';
    let list = '';
    let terms = autocompleteMatch(val);
    for (i=0; i<terms.length; i++) {
        list += '<li>' + terms[i] + '</li>';
    }
    res.innerHTML = '<ul>' + list + '</ul>';
}