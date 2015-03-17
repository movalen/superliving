<?php
class categorys extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	
	public function index() {
		$data['row'] = new Category();
		$data['row']->where('parent_id is null')->get_page();
		$data['no'] = 0;
		
		$this->template->append_metadata("<script src='media/script/confirm_delete.js'></script>");
		$this->template->build("categorys/index", @$data);
	}
	
	public function form($id=false) {
		$data['rs'] = new Category($id);
		$this->template->append_metadata('<script src="media/addon/jquery_validate/jquery-validation-1.13.1/dist/jquery.validate.min.js"></script>');
		$this->template->build('categorys/form', @$data);
	}

	public function save($id = false) {
		$data['rs']  = new Category($id);
		$data['rs']->from_array($_POST);
		$data['rs']->save();
		
		
		set_notify('success', 'Save complete.');
		if(empty($data['rs']->parent_id)) {
			redirect('admin/categorys');
		} else {
			redirect('admin/categorys/sub_index/'.$data['rs']->parent_id);
		}	
	}
	
	public function delete($id = false) {
		$data['rs'] = new Category($id);
		$link = (empty($data['rs']->parent_id)) ? 'admin/categorys' : 'admin/categorys/sub_index/'.$data['rs']->parent_id ;
		if($id) {
			$data['rs']->delete();	
		}
		
		set_notify('success', 'Delete complete.');	
		redirect($link);
	}
	
	//--Sub categorys
	public function sub_index($id = false) {
		$data['cat'] = new Category($id);
		
		$data['row'] = new Category();
		$data['row']->where('parent_id', $id);
		$data['row']->get_page();
		
		$data['no'] = 0;
		
		$this->template->append_metadata("<script src='media/script/confirm_delete.js'></script>");
		$this->template->build('categorys/sub_index', @$data);
	}
	
	public function sub_form($parent_id = false, $id = false) {
		$data['parent'] = new Category($parent_id);
		
		$data['rs'] = new Category($id);
		
		$this->template->append_metadata('<script src="media/addon/jquery_validate/jquery-validation-1.13.1/dist/jquery.validate.min.js"></script>');
		$this->template->build('categorys/sub_form', @$data);
	}	
}