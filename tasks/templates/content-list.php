<div class="container container-list">
	<table class="table table-hover" id="taskTable">
		<thead>
		<tr>
			<th scope="col" class="table-col-50" id="nameCol"> Name </th>
			<th scope="col" class="table-col-30" id="dateCol"> Due Date </th>
			<th scope="col" class="table-col-20" id="stateCol"> Completed</th>
		</tr>
		</thead>
		<tbody id="taskTBody">
		    <?php do_action('render_table_row', $args); ?>
		</tbody>
	</table>

    <input type="hidden" id="nameOrder" value="asc">
    <input type="hidden" id="dateOrder" value="asc">
</div>
