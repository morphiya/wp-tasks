<div class="container container-list">
    <fieldset class="filter-task-fieldset">
        <div class="row">
            <div class="col filter-task-col">
                <label for="task-filter-done" class="filter-radio-label">Done</label>
                <input type="radio" name="taskFilter" id="task-filter-done">
                <label for="task-filter-not-done" class="filter-radio-label">Not done</label>
                <input type="radio" name="taskFilter" id="task-filter-not-done">
                <label for="task-filter-all" class="filter-radio-label">All</label>
                <input type="radio" name="taskFilter" id="task-filter-all">
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
