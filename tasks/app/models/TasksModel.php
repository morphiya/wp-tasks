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
		'state'	=> '',
		'listTasks' => []
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

	public function listTask() {
		$this->selectTask();
		$this->modelState['page'] = 'list';
		$this->notify();
	}

	public function editTask($id) {
		$this->selectTask($id);
		$this->modelState['page'] = 'edit';
		$this->notify();
	}

	public function updateTask() {
		$this->insertTask($_POST['id']);
		$this->listTask();
	}

	public function deleteTask() {
		wp_delete_post($_POST['id']);
		$this->listTask();
	}

	private function insertTask($postID = '') {
		$id = $postID == '' ? $this->modelState['id'] : intval($postID);
		$post_data = array(
			'ID'		 => $id,
			'post_type'  => 'tasks',
			'post_title' => sanitize_text_field($_POST['taskName']),
			'post_status'=> 'publish',
			'post_author'=> 1,
			'meta_input' => [
				'dueDate' => $_POST['dueDate'],
				'state'	  => 'false'
			]
		);
		wp_insert_post($post_data);
	}

	private function selectTask($id = '') {
		$query = new \WP_Query(['post_type' => 'tasks',
								'p' => $id,
								'orderby' => 'dueDate',
        						'order' => 'ASC']);
		while ( $query->have_posts() ) {
			$query->the_post();
			$result = get_post();

			$date = get_post_meta($result->ID, 'dueDate', true);
			$date = date('m / d / Y', strtotime($date));

			$this->modelState['listTasks'][] = [
				'id' => $result->ID,
				'name' => $result->post_title,
				'dueDate' => $date,
				'state' => get_post_meta($result->ID, 'state', true)
			];
		}
	}

	public function setTaskState(string $newState) {
		$post_data = array(
			'ID'		 => $_POST['ajax_taskID'],
			'meta_input' => [
				'state'	  => $newState
			]
		);
		wp_update_post($post_data);

		return "\n The new state set in db";
	}
}