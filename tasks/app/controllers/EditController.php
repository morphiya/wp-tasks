<?php


namespace app\controllers;

class EditController extends BaseController
{
	public function createPage($param = '') {
		$this->model->editTask(intval($param));
	}
}