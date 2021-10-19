<div class="container container-edit">
	<div class="row row-mb-15">
		<h2>Edit a task ...</h2>
	</div>
	<form action="<?php echo get_site_url() . '/list'; ?>" method="post">
		<?php get_template_part('templates/part-edit-fields', 'template', $args); ?>
		<div class="row"> <!-- button row begin -->
			<div class="col-3"></div>
			<div class="col-6">
				<button type="submit" name="editBtn" value="update" class="btn btn-primary btn-tasks row-mb-10">Update Task</button>
			</div>
		</div> <!-- button row end -->
		<div class="row"> <!-- button row begin -->
			<div class="col-3"></div>
			<div class="col-6">
				<button type="submit" name="editBtn" value="delete" class="btn btn-primary btn-tasks row-mb-10">Delete Task</button>
			</div>
		</div> <!-- button row end -->
	</form>
</div>
