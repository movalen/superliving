<?php
class Products extends Public_Controller {

	public function __construct() {
		parent::__construct();
		#$this->template->set('active', 'product_list');
	}
	
	public function lists($id = false, $child_id = false) {
		//--Category
			$data['cat_1'] = new Category($id);
			$child_id = (empty($child_id))?$data['cat_1']->child->id:$child_id;
			$data['child'] = new Category($child_id);
		//-- End - Category
			
		//--Nav
			$data['nav'] = anchor('', 'HOME');
			if(!empty($data['cat_1']->id)) {
				$data['nav'] .= ' > ';
				$data['nav'] .= (empty($data['cat_2']->id)) ? $data['cat_1']->title : anchor('products/lists/'.$data['cat_1']->id, $data['cat_1']->title) ; 
			}
			$data['nav'] .= (!empty($data['child']->id)) ? ' > '.$data['child']->title : null; 
		//--End - Nav
		
		//-- Product
			$data['rs'] = new Product();
			$data['rs']	-> where('status', 1)
						-> where('category_id', $data['child']->id);
			
			if(!empty($_GET['s_box'])) {
				$data['rs']	-> like('model_number', $_GET['s_box'])
							-> or_like('model_size', $_GET['s_box']);
			}
			
			$data['rs']->get_page(6);
		//-- End - product
		
		
		$this->template->build("lists",@$data);
	}

}