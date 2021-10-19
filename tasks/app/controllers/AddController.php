<?php


namespace app\controllers;

use SplSubject;

class AddController extends BaseController
{
	public function createPage() {
		if (isset($_POST['addBtn'])) {
			$this->model->addTask();
		} else {
			$this->view->renderPage('add');
		}
	}
}