jQuery(document).ready( function( $ ){
    $('input[type="checkbox"]').on('change', function() {
        let checkboxState
        let taskId = $(this).attr("value")

        if($(this).is(':checked')) {
            checkboxState = 'true'
            $('div[id="'+ taskId +'"]').removeClass('not-done').addClass('done')
        } else {
            checkboxState = 'false'
            $('div[id="'+ taskId +'"]').removeClass('done').addClass('not-done')
        }

        let testMessage = "The new value of checkbox#"+taskId+" is: "+checkboxState
        $.ajax({
            url: tasksAjax.ajaxurl,
            method: 'post',
            data: {
                action: 'complete',
                ajax_taskID: taskId,
                ajax_checkboxState: checkboxState
            },
            success: function (response) {
                console.log(response)
            }
        });
    });
} );


