

$(document).ready(function() {
    let testForm = $('#ConfirmForm');
    testForm.submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: testForm.attr('action'),
            type: 'POST',
            data: testForm.serialize(),
            dataType: 'html',
            success: function(result) {
                switch (result[0]){
                    case 'F1': $('#kek').css('font-family', 'Algerian');
                    case 'F2': $('#kek').css('font-family',  "Comic Sans MS"); break;
                    case 'F3': $('#kek').css('font-family', 'Open Sans');break;
                }
                switch (result[1]){
                    case 'img1': $('body').css('background-image', 'url(img/back4.jpg)');break;
                    case 'img2': $('body').css('background-image', 'url(img/back2.jpg)');break;
                    case 'img3': $('body').css('background-image', 'url(img/back3.jpg)');
                }
            },
        });
        return false;
    });
});



