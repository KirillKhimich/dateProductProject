( function() {
            $( "#datepicker" ).datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });
            $.datepicker.formatDate("yy-mm-dd")
});