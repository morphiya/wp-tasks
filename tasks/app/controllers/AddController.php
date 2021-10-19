<?php


namespace app\controllers;

class AddController extends BaseController
{
	public function createPage($param = '') {
		if (isset($_POST['addBtn']) && $_POST['taskName'] && $_POST['dueDate']) {
			$this->model->addTask();
		} else {
			$this->view->renderPage('add');
		}
	}
}