jQuery(document).ready( function( $ ) {

    let list = $('#task-list');

    $('#nameCol').click(function () {
        list.find('.task-list-row').sort(function(a, b) {
           if($('#nameOrder').val()=='asc') {
               return $('.col-6:first', a).text().localeCompare($('.col-6:first', b).text());
           } else {
               return $('.col-6:first', b).text().localeCompare($('.col-6:first', a).text());
           }
        }).appendTo(list);

        let sortOrder=$('#nameOrder').val();
        if(sortOrder=="asc") {
            document.getElementById("nameOrder").value="desc";
        }
        if(sortOrder=="desc") {
            document.getElementById("nameOrder").value="asc";
        }
    });

    $('#dateCol').click(function() {
        list.find('.task-list-row').sort(function(a, b) {
            if($('#dateOrder').val()=='asc') {
                return $('.col-4:first', a).text().localeCompare($('.col-4:first', b).text());
            } else {
                return $('.col-4:first', b).text().localeCompare($('.col-4:first', a).text());
            }
        }).appendTo(list);

        let sortOrder=$('#dateOrder').val();
        if(sortOrder=="asc") {
            document.getElementById("dateOrder").value="desc";
        }
        if(sortOrder=="desc") {
            document.getElementById("dateOrder").value="asc";
        }
    });
});
