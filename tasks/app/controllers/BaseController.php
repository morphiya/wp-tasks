<?php

namespace app\controllers;

use app\models\TasksModel;
use app\views\View;
use SplSubject;

abstract class BaseController
{
	protected TasksModel $model;
	protected View $view;

	public function __construct() {
		$this->model = new TasksModel();
		$this->view = new View($this->model);
	}
	abstract public function createPage($param = '');
}