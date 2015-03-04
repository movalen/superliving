<?php
class Catalogs extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->template->set('active', 'catalogs');
	}
	
	public function index() {
		$data['rs'] = new Catalog();
		$data['rs']->get_page();
		
		$this->template->build("catalogs/index",@$data);
	}
	
	public function detail() {
		$this->template->build("catalogs/detail",@$data);
	}
	
	public function read_pdf($file_name = null){
		$data['file_name'] = $file_name;
		$this->load->view("catalogs/read_pdf",@$data);
	}
}