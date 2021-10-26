function selectionSort(inputArr)
{
    let n = inputArr.length;

    for(let i = 0; i < n; i++)
    {
        let min = i;
        for(let j = i+1; j < n; j++)
        {
            if(inputArr[j] < inputArr[min])
            {
                min=j;
            }
        }
        if (min !== i)
        {
            let tmp = inputArr[i];
            inputArr[i] = inputArr[min];
            inputArr[min] = tmp;
        }
    }
    return inputArr;
}

function getRandomNumber(max)
{
    return Math.floor(Math.random()*max);
}

function generateRandomArray(intSize)
{
    let arr = [];
    for (let i=0;i<intSize;i++)
    {
        arr.unshift(getRandomNumber(1000));
    }
    return arr;
}

function moveToRightAndSetMin(arr)
{
    let min = arr.indexOf(Math.min(...arr));
    let minValue = arr[min];
    arr.splice(min,1);
    arr.unshift(minValue);
    console.log(min);
    return arr;
}


function addToolTip(objectId, tipText)
{
    document.getElementById(objectId.toString()).title = tipText.toString();
}

let size = prompt('Введіть к-сть елементів масиву:')
let arr = generateRandomArray(size);
console.log(arr);
alert('Масив згенеровано!'+'\n'+arr+'\n'+'Обрано мінімальний елемент та вставлено на початок(зсув вправо):'+'\n'+
    moveToRightAndSetMin(arr)+'\n'+'Відсортований масив(Selection Sort):'+'\n'+selectionSort(arr));
console.log(arr);
window.onload = function (){addToolTip("firstButton","Підказка");};







