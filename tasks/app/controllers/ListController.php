<?php


namespace app\controllers;


class ListController extends BaseController
{
	public function createPage($param = '') {
		if (isset($_POST['editBtn']) && $_POST['taskName'] && $_POST['dueDate']) {
			$method = $_POST['editBtn'].'Task';
			$this->model->$method();
		} else {
			$this->model->listTask();
		}

	}
}