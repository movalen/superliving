<?php
class Signin extends Admin_each_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		if(!empty($_POST)) {
			login($_POST['user'], $_POST['pass']);
		}
		if(is_login()) {
			set_notify('success', 'Welcome '.$this->session->userdata('user_name'));
			redirect('admin');
		}
		$this->load->view("signin");
	}
}