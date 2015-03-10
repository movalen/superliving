<?php
class Users extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	
	public function index() {
		$data['row'] = new User();
		$data['row']->where('id !=', $this->session->userdata('id'));
		$data['row']->get_page();
		$data['no'] = 0;
	
		$this->template->append_metadata("<script src='media/script/confirm_delete.js'></script>");
		$this->template->build("users/index", @$data);
	}
	
	public function form($id=false) {
		$data['rs'] = new User($id);

		$this->template->append_metadata("<script src='media/addon/jquery_validate/jquery-validation-1.13.1/dist/jquery.validate.min.js'></script>");
		$this->template->build('Users/form', @$data);
	}

	public function save($id = false) {
		if(empty($_POST['pass'])) {
			unset($_POST['pass']); 	
		} else {
			if($_POST['pass'] == $_POST['repass']) {
				$_POST['pass_text'] = $_POST['pass'];
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
		set_notify('success', 'Save complete.');
		redirect('admin/users');
	}
	
	public function delete($id = false) {
		$data['rs'] = new User($id);
		$data['rs']->delete();
		set_notify('success', 'Delete complete.');
		redirect('admin/Users');
	}	 	
}