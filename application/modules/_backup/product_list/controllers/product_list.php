<?php
class Product_list extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->template->set('active', 'product_list');
	}
	
	public function index() {
		$this->template->build("product_list/index",@$data);
	}

}