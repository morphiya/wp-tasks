<div class="container container-list">
    <fieldset class="filter-task-fieldset">
        <div class="row">
            <div class="col filter-task-col">
                <label for="radio-1" class="filter-radio-label">Done</label>
                <input type="radio" name="taskFilter" id="radio-1">
                <label for="radio-2" class="filter-radio-label">Not done</label>
                <input type="radio" name="taskFilter" id="radio-2">
                <label for="radio-3" class="filter-radio-label">All</label>
                <input type="radio" name="taskFilter" id="radio-3">
            </div>
        </div>
    </fieldset>

    <div id="task-list">
        <div class="row task-list-title">
            <div class="col-6 task-list-col task-list-link" id="nameCol"> Name </div>
            <div class="col-4 task-list-col task-list-link" id="dateCol"> Due Date </div>
            <div class="col-2 task-list-col" id="stateCol"> Completed </div>
        </div>
		<?php do_action('render_table_row', $args); ?>

        <input type="hidden" id="nameOrder" value="asc">
        <input type="hidden" id="dateOrder" value="asc">
    </div>
</div>
