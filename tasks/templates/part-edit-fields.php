<input type="hidden" name="id" value="<?php echo $args['id'];?>">
<div class="row row-mb-10"> <!-- task name row begin -->
	<div class="col-3">
		<label for="taskNameInput" class="col-form-label">Task Name</label>
	</div>
	<div class="col">
		<input type="text" name="taskName" id="taskNameInput" class="form-control" value="<?php echo $args['name'];?>">
	</div>
</div> <!-- task name row end -->
<div class="row row-mb-10"> <!-- task due date row begin -->
	<div class="col-3">
		<label for="taskDateInput" class="col-form-label">Due Date</label>
	</div>
	<div class="col-6">
		<input type="date" name="dueDate" id="taskDateInput" class="form-control" value="<?php echo $args['dueDate'];?>">
	</div>
</div> <!-- task due date row end -->
