let servResponse = document.querySelector('#response');

let CheckForm = document.querySelector('#CheckForm');
document.forms['CheckForm'].onsubmit = function (e){
    e.preventDefault();

    let choice = document.forms['CheckForm'].value;
    alert(choice);
    let xhr = new XMLHttpRequest();

    xhr.open('POST', 'display.php?');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // xhr.onreadystatechange = function (){
    //     if(xhr.readyState === 4 && xhr.status === 200){
    //         servResponse.textContent = xhr.responseText;
    //     }
    // }

    xhr.send('SortBy' + choice);
};

