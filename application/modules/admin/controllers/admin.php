<?php
class Admin extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	#	$this->load->library("ga");
	}
	
	
	public function index() {
		$this->template->build("index");
	}
	
	
	public function switch_status($model,$id) {
		$model = ucfirst($model);
		$foo = new $model($id);
		$foo->status = ($foo->status == 1)?0:1;
		$foo->save();
		echo $foo->status;
	}
	
	public function signout() {
		logout();
		redirect('admin');
	}
}