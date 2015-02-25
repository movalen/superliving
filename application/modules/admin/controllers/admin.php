<?php
class Admin extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	#	$this->load->library("ga");
	}
	
	
	public function index() {
		$this->template->build("index");
	}
	
}