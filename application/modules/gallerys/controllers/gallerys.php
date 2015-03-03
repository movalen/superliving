<?php
class Gallerys extends Public_Controller {

	public function __construct() {
		parent::__construct();
		#$this->template->set('active', 'product_list');
	}
	
	public function index() {
		$data['album'] = new Gallery();
		$data['album']->get_page();
		
		$this->template->build("index",@$data);
	}
	
	public function detail($id = false) {
		
		if(!$id) {
			redirect('gallerys');
		}
		
		$data['album'] = new Gallery($id);
		
		//Nav
		$data['head'] = $data['album']->title;
		$data['nav'] = anchor('', 'HOME').' > ';
		$data['nav'] .= anchor('gallerys', 'PROJECT GALLERY');
		$data['nav'] .= ' > '.$data['head'];
		
		$this->template->build('detail', @$data);
	}

}