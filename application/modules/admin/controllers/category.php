<?php
class Category extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	
	public function index() {
		$data['row'] = new ModelCategory();
		$data['row']->get_page();
		$data['no'] = 0;
		
		$this->template->build("category/index", @$data);
	}
	
	public function form($id=false) {
		$data['rs'] = new ModelCategory($id);

		$this->template->build('category/form', @$data);
	}

	public function save($id = false) {
		$data['rs']  = new ModelCategory($id);
		$data['rs']->from_array($_POST);
		$data['rs']->save();
		
		
		if(empty($data['rs']->parent_id)) {
			redirect('admin/category');
		} else {
			redirect('admin/category/sub_index/'.$data['rs']->parent_id);
		}	
	}
	
	public function delete($id = false) {
		$data['rs'] = new ModelCategory($id);
		$link = (empty($data['rs']->parent_id)) ? 'admin/category' : 'admin/category/sub_index/'.$data['rs']->parent_id ;
		if($id) {
			$data['rs']->delete();	
		}	
		redirect($link);
	}
	
	//--Sub category
	public function sub_index($id = false) {
		$data['cat'] = new ModelCategory($id);
		$data['cat']->get(1);
		
		$data['row'] = new ModelCategory();
		$data['row']->where('parent_id', $id);
		$data['row']->get_page();
		
		$data['no'] = 0;
		
		$this->template->build('category/sub_index', @$data);
	}
	
	public function sub_form($parent_id = false, $id = false) {
		$data['parent'] = new ModelCategory($parent_id);
		$data['parent']->get(1);
		
		$data['rs'] = new ModelCategory($id);
		
		$this->template->build('category/sub_form', @$data);
	}	
}