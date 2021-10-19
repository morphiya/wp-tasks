<?php


namespace app\views;
use app\models\TasksModel;
use SplSubject;

class View implements \SplObserver
{
	private TasksModel $model;
	private array $outputData;

	public function __construct(TasksModel $model) {
		$this->model = $model;
		$this->outputData = $this->model->modelState;
		$this->model->attach($this);
	}
	public function update(SplSubject $subject) {
		$this->outputData = $subject->modelState;
		$this->renderPage($this->outputData['page']);
	}

	public function renderPage(string $pageType) {
		get_template_part('templates/content-'.$pageType, '', $this->outputData);
	}
}