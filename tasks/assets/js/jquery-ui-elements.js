jQuery(document).ready( function( $ ) {
    $( "input[type='radio']" ).checkboxradio({icon: false});
    $( "#datepicker" ).datepicker({
        minDate: 0
    });


    let isConfirm = false
    $('#upBtn').click(function() {
        $('input[name="editBtn"]').val('update')
        $('form#taskList').submit()
    })

    $('#delBtn').click(function() {
        let isConfirm = confirm("Are you sure?")
        if (isConfirm) {
            $('input[name="editBtn"]').val('delete')
            $('form#taskList').submit()
        }
    })
});
