<?php
class Admin extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	#	$this->load->library("ga");
	}
	
	
	public function index() {
		$data['rs'] = new User($this->session->userdata('id'));
		$this->template->build("index", @$data);
	}
	
	public function profile_save($id = false) {
		if(empty($_POST['pass'])) {
			unset($_POST['pass']); 	
		} else {
			if($_POST['pass'] == $_POST['repass']) {
				$_POST['pass'] = md5($_POST['pass']);
			} else {
				unset($_POST['pass']);
			}
		}
		//save data
			$data['rs']  = new User($id);
			$data['rs']->from_array($_POST);
			$data['rs']->save();
		//End - save data

		redirect('admin');
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
	
	
	//Contact (about us, contact us)
	private function call_contact($data = false) {
		$data['rs'] = new Contact();
		$data['rs']->where('type', @$data['type']);
		$data['rs']->get(1);
		
		$this->template->build('contact', @$data);
	}
	public function about_us() {
		$this->call_contact(array('title'=>'About us', 'type'=>'about_us'));
	}
	
	public function contact_us() {
		$this->call_contact(array('title'=>'Contact us', 'type' => 'contact_us'));
	}
	
	public function contact_save() {
		$data = new Contact();
		$data->where('type', @$_POST['type']);
		$data->get(1);
		
		$id = $data->id;
		
		$data = new Contact($id);
		$data->from_array($_POST);
		$data->save();
		
		redirect('admin/'.$_POST['type']);
	}
}