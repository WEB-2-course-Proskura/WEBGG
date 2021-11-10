$( function() {
    $( "#datepicker" ).datepicker();
} );

$( function() {
    $( "#slider" ).slider(
        {
            change: function (){$('#sliderInfo').text($( "#slider" ).slider("option","value"))},
            classes: {
                "ui-slider": "highlight"
            },
            animate:'fast',
            max:100,
            min:0,
            value:40,
            //values: [10,20,30,40,50,60,70,80,90]
        }
    );
} );
