$( function() {
    var dateFormat = "yy-mm-dd",
        from = $( "#searchDateFrom" )
            .datepicker({
                showButtonPanel: true,
                minDate:0,
                numberOfMonths: 2,
                maxDate: "+6m",
                dateFormat : dateFormat
            })
            .on( "change", function() {
                to.datepicker( "option", "minDate", getDate( this ) );
            }),
        to = $( "#searchDateTo" ).datepicker({
            showButtonPanel: true,
            numberOfMonths: 2,
            minDate:0,
            maxDate: "+6m",
            dateFormat:dateFormat
        })
            .on( "change", function() {
                from.datepicker( "option", "maxDate", getDate( this ) );
            });

    function getDate( element ) {
        var date;
        try {
            date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
            date = null;
        }

        return date;
    }
} );