<?php


namespace app\models;


use SplObserver;

class TasksModel implements \SplSubject
{
	public array $modelState = [
		'page'	=> '',
		'id'	=> '',
		'name'	=> '',
		'dueDate' => '',
		'state'	=> ''
	];
	private \SplObjectStorage $observers;

	public function __construct() {
		$this->observers = new \SplObjectStorage();
	}

	public function attach(SplObserver $observer) {
		$this->observers->attach($observer);
	}

	public function detach(SplObserver $observer) {
		$this->observers->detach($observer);
	}

	public function notify() {
		foreach ($this->observers as $observer) {
			$observer->update($this);
		}
	}

	public function addTask() {
		$this->insertTask();
		$this->modelState['page'] = 'add';
		$this->notify();
	}

	private function insertTask() {
		$post_data = array(
			'ID'		 => $this->modelState['id'],
			'post_type'  => 'tasks',
			'post_title' => sanitize_text_field($_POST['taskName']),
			'post_status'=> 'publish',
			'post_author'=> 1,
			'meta_input' => [
				'dueDate' => $_POST['dueDate'],
				'state'	  => 'not completed'
			]
		);
		wp_insert_post($post_data);
	}
}