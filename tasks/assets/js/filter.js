jQuery(document).ready( function( $ ) {
    let fActive = '';

    function filterColor(state, notState){
        if(fActive != state){
            $('div').filter('.'+state).slideDown();
            $('div').filter('.'+notState).slideUp();
            fActive = state;
        }
    }

    $('#task-filter-done').click(function(){ filterColor('done', 'not-done'); });
    $('#task-filter-not-done').click(function(){ filterColor('not-done', 'done'); });

    $('#task-filter-all').click(function(){
        $('div').filter('.task-list-row').slideDown();
        fActive = 'all';
    });
});