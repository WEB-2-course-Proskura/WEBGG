function Random(max) {
  return Math.floor(Math.random() * max);
}


function Generator(count){
  let arr = [];
  for (var i = 0; i < count; i++) {
    arr.push(Random(100));
  }
  return arr;
}


function QSort(arr) {
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
    return QSort(left).concat(pivot, QSort(right));
}


function MinIndex(arr){
  min = arr[0];
  index = 0;
  for (let i = 0; i < arr.length; i++){
    if (arr[i] < min) {
      min = arr[i];
      index = i;
    }
  }
  return index;
}


function MaxIndex(arr){
  max = arr[0];
  index = 0;
  for (let i = 0; i < arr.length; i++){
    if (arr[i] > max) {
      max = arr[i];
      index = i;
    }
  }
  return index;
}


function Sum(arr){
  let sum = 0;
  if (MinIndex(arr) > MaxIndex(arr) + 1) {
    for (var i = MaxIndex(arr) + 1; i < MinIndex(arr); i++) {
      sum += arr[i];
    }
  }
  else if (MaxIndex(arr) > MinIndex(arr) + 1) {
    for (var i = MinIndex(arr) + 1; i < MaxIndex(arr); i++) {
      sum += arr[i];
    }
  }
  else{
    sum = 0;
  }
  return sum;
}


function ToText(arr){
  let text = '';
  for (var i = 0; i < arr.length; i++) {
    text.concat(str(arr[i]));
    text.concat(' ');
  }
}



var arr = new Array();
arr[arr.length] = 0;
arr[arr.length] = 1;
alert(arr.length);

let count = prompt('Введіть к-сть елементів');
arr = Generator(count);
alert("Заданий масив: " + arr + "\n" + "Сума елементів між min та max: " + Sum(arr) + '\n' + "Відсортований масив: " + QSort(arr));
