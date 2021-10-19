<?php

// class autoloading
spl_autoload_register(function ($class_name) {
	$class_name = str_replace('\\', '/', $class_name);
	if (!@include_once __DIR__ . "/../" . $class_name . '.php') {
		throw new \app\MyException("Cannot include class " . $class_name . ". Check file name and make sure that file exists");
	}
});
