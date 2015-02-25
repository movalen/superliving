<?php
class Project_gallery extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->template->set('active', 'project_gallery');
	}
	
	public function index() {
		$this->template->build("project_gallery/index",@$data);
	}
	
	public function detail() {
		$this->template->build("project_gallery/detail",@$data);
	}
}