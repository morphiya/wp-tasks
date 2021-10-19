<div class="container container-edit">
	<div class="row row-mb-15">
		<h2>Add a new Task ...</h2>
	</div>
	<form action="<?php echo get_site_url() . '/add'; ?>" method="post">
		<?php get_template_part('templates/part-edit-fields', 'template', $args); ?>

		<div class="row"> <!-- buttons row begin -->
			<div class="col-3"></div>
			<div class="col-6">
				<button type="submit" name="addBtn" value="add" class="btn btn-primary btn-tasks">Add Task</button>
			</div>
		</div> <!-- buttons row end -->
	</form>
</div>
