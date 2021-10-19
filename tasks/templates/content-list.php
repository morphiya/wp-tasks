<div class="container container-list">
	<table class="table table-hover">
		<thead>
		<tr>
			<th scope="col" class="table-col-50"> Name
				<a href="#">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/sort-down.svg"
						 width="20"
						 height="20"
						 alt="sort_down">
				</a>
			</th>

			<th scope="col" class="table-col-30"> Due Date </th>
			<th scope="col" class="table-col-20"> Completed
				<a href="#">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/sort-down.svg"
						 width="20"
						 height="20"
						 alt="sort_down">
				</a>
			</th>
		</tr>
		</thead>
		<tbody>
		    <?php do_action('render_table_row', $args); ?>
		</tbody>
	</table>
</div>
