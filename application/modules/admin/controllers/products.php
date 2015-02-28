<?php
class Products extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function coption_category($id = false) {
		if(!$id) {
			echo 0;
			return false;
		} else {
			$data['parent'] = new Categorys();
			$data['parent']->where('parent_id', $id);
			$data['parent']->get();
			
			
			if(empty($data['parent']->all)) {
				echo 0 	;
				return false;
			} else {
				echo '<option value="">--หมวดหมู่ย่อย--</option>';
				foreach($data['parent'] as $item) {
					echo '<option value="'.$item->id.'">';
						echo $item->title;
					echo '</option>';
				}
			}
				
		}
	}
	
	
	public function index() {
		$data['row'] = new Product();
		$data['row']->get_page();
		$data['no'] = 0;

		$this->template->build("products/index", @$data);
	}
	
	public function form($id=false) {
		$data['rs'] = new Product($id);

		$this->template->build('products/form', @$data);
	}

	public function save($id = false) {
		$data['rs']  = new Product($id);
		$data['rs']->from_array($_POST);
		$data['rs']->save();
		
		redirect('admin/product');
	}
	
	public function delete($id = false) {
		$data['rs'] = new Product($id);
		$link = (empty($data['rs']->parent_id)) ? 'admin/product' : 'admin/product/sub_index/'.$data['rs']->parent_id ;
		if($id) {
			$data['rs']->delete();	
		}	
		redirect($link);
	}
	/*
	//--Sub product
	public function sub_index($id = false) {
		$data['cat'] = new Product($id);
		$data['cat']->get(1);
		
		$data['row'] = new Product();
		$data['row']->where('parent_id', $id);
		$data['row']->get_page();
		
		$data['no'] = 0;
		
		$this->template->build('product/sub_index', @$data);
	}
	
	public function sub_form($parent_id = false, $id = false) {
		$data['parent'] = new Product($parent_id);
		$data['parent']->get(1);
		
		$data['rs'] = new Product($id);
		
		$this->template->build('product/sub_form', @$data);
	}
	 */
	 	
}