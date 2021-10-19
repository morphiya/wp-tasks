<?php


namespace app\controllers;


class ListController extends BaseController
{
	public function createPage() {
		$this->model->listTask();
		//$this->view->renderPage('list');
	}
}