
<tr>
	<td>
		<a class="task-link" href="<?php echo get_site_url() . '/edit/' . $args['id']; ?>"><?php echo $args['name'];?></a>
	</td>
	<td><?php echo $args['dueDate'];?></td>
	<td>
		<div class="form-check">
            <?php echo '<input class="form-check-input" value="'. $args['id'] .'" 
                         type="checkbox"' . checked( $args['state'], 'true', false) . '>';?>
		</div>
	</td>
</tr>
