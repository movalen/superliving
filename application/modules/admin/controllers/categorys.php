<?php
class categorys extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	
	public function index($parent_id = false) {
		$data['parent_id'] = $parent_id;
		
		$data['row'] = new Category();
		if(!$parent_id) {
			$data['row']->where('parent_id is null or parent_id = 0');
		} else {
			$data['row']->where('parent_id', $parent_id);
		}
		$data['row']->get_page();
		$data['no'] = 0;
		
		//Setting header
		$data['head_title'] = (empty($parent_id))?'Category':anchor('admin/categorys', 'Category');
		$tmp = $this->get_headTitle($parent_id);
		$data['head_title'] .= $tmp['head_title'];
		$data['layer_index'] = $tmp['layer_index']; 

		$this->template->append_metadata("<script src='media/script/confirm_delete.js'></script>");
		$this->template->build("categorys/index", @$data);
	}
	
		private function get_headTitle($id = false, $layer_index = 0) {
			if(!$id) { return false; }
			
			$cat = new Category($id);
			$rs = ($layer_index == 0)?' > '.$cat->title:' > '.anchor('admin/categorys/index/'.$cat->id,$cat->title);
			
			if(!empty($cat->parent->id)) {
				$layer_index++;
				$tmp = $this->get_headTitle($cat->parent->id, $layer_index);
				$index  = $tmp['layer_index'];
				$rs = $tmp['head_title'].$rs;
			}
			
			return array('head_title'=>$rs, 'layer_index' => $layer_index);
		}
	
	
	public function form($parent_id = false, $id = false) {
		$data = $this->get_headTitle($parent_id);
		
		
		$data['parent_id'] = (empty($parent_id))?0:$parent_id;
		
		$data['rs'] = new Category($id);
		
		$data['sub_cat_status'] = (empty($id))?1:$data['rs']->sub_cat_status;
		
		$this->template->append_metadata('<script src="media/addon/jquery_validate/jquery-validation-1.13.1/dist/jquery.validate.min.js"></script>');
		$this->template->build('categorys/form', @$data);
	}
	/*
	public function reset_parentid() {
			$tmp = new Category();
			$tmp->where('parent_id', null);
			$tmp->get();
			foreach($tmp as $item) {
				$item->parent_id = 0;
				$item->save();
			}
		echo 'Reset parent id complete';
	}
	/*
	public function form($id=false) {
		$data['rs'] = new Category($id);
		$this->template->append_metadata('<script src="media/addon/jquery_validate/jquery-validation-1.13.1/dist/jquery.validate.min.js"></script>');
		$this->template->build('categorys/form', @$data);
	}
	 * 
	 */

	public function save($id = false) {
		$_POST['sub_cat_status'] = ($_POST['sub_cat_status'] == 1)?1:0;
		
		$data['rs']  = new Category($id);
		$data['rs']->from_array($_POST);
		$data['rs']->save();
		
		
		set_notify('success', 'Save complete.');
		if(empty($data['rs']->parent_id)) {
			redirect('admin/categorys');
		} else {
			redirect('admin/categorys/index/'.$data['rs']->parent_id);
		}	
	}
	
	public function delete($id = false) {
		$data['rs'] = new Category($id);
		$link = (empty($data['rs']->parent_id)) ? 'admin/categorys' : 'admin/categorys/index/'.$data['rs']->parent_id ;
		if($id) {
			$data['rs']->delete();	
		}
		
		set_notify('success', 'Delete complete.');	
		redirect($link);
	}
	/*
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
	 *
	 */	
}