jQuery(document).ready( function( $ ) {
    let table = $('#taskTable');
    let tbody = $('#taskTBody');

    $('#nameCol').click(function () {
        tbody.find('tr').sort(function(a, b) {
           if($('#nameOrder').val()=='asc') {
               return $('td:first', a).text().localeCompare($('td:first', b).text());
           } else {
               return $('td:first', b).text().localeCompare($('td:first', a).text());
           }
        }).appendTo(tbody);

        let sortOrder=$('#nameOrder').val();
        if(sortOrder=="asc") {
            document.getElementById("nameOrder").value="desc";
        }
        if(sortOrder=="desc") {
            document.getElementById("nameOrder").value="asc";
        }
    });

    $('#dateCol').click(function() {
        tbody.find('tr').sort(function(a, b) {
            if($('#dateOrder').val()=='asc') {
                return $('td:first', a).text().localeCompare($('td:first', b).text());
            } else {
                return $('td:first', b).text().localeCompare($('td:first', a).text());
            }
        }).appendTo(tbody);

        let sortOrder=$('#dateOrder').val();
        if(sortOrder=="asc") {
            document.getElementById("dateOrder").value="desc";
        }
        if(sortOrder=="desc") {
            document.getElementById("dateOrder").value="asc";
        }
    });
});
