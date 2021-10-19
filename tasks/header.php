<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>
		<?php wp_title('|', 'echo', 'right'); ?> <?php bloginfo('name'); ?>
	</title>
	<?php wp_head(); ?>
</head>
<body>
<header class="header">
	<div class="container-xxl">
		<div class="row justify-content-center">
			<div class="col-sm site-header">
				<a href="<?php echo get_site_url(); ?>" class="site-logo"> My WP Site </a>
			</div>
		</div>
	</div>
</header>