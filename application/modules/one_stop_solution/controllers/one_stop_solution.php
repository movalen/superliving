<?php
class One_stop_solution extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->template->set('active', 'one_stop_solution');
	}
	
	public function index() {
		$this->template->build("one_stop_solution/index",@$data);
	}
	
	public function detail() {
		$this->template->build("one_stop_solution/detail",@$data);
	}
}