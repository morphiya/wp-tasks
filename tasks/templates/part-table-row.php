<div class="row task-list-row <?php echo $args['state'] === 'true' ? 'done' : 'not-done' ?>"
     id="<?php echo $args['id'] ?>">
    <div class="col-6 task-list-col">
        <a class="task-list-link" href="<?php echo get_site_url() . '/edit/' . $args['id']; ?>"><?php echo $args['name'];?></a>
    </div>
    <div class="col-4 task-list-col"> <?php echo $args['dueDate'];?> </div>
    <div class="col-2 task-list-col">
        <div class="form-check">
			<?php echo '<input class="form-check-input" value="'. $args['id'] .'"
                         type="checkbox"' . checked( $args['state'], 'true', false) . '>';?>
        </div>
    </div>
</div>
