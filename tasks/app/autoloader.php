<?php

// class autoloading
spl_autoload_register(function ($class_name) {
	$class_name = str_replace('\\', '/', $class_name);
	// TODO add exceptions
	include_once __DIR__ . "/../" . $class_name . '.php';
});
