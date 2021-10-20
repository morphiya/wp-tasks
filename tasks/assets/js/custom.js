jQuery(document).ready( function( $ ){
    $('input[type="checkbox"]').on('change', function() {
        let checkboxState
        let taskId = $(this).attr("value")

        if($(this).is(':checked')) {
            checkboxState = 'true'
        } else {
            checkboxState = 'false'
        }

        let testMessage = "The new value of checkbox#"+taskId+" is: "+checkboxState
        $.ajax({
            url: tasksAjax.ajaxurl,
            method: 'post',
            data: {
                action: 'complete',
                testMessage: testMessage
            },
            success: function (response) {
                console.log(response)
            }
        });
    });
} );


