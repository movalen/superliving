<?php
class Home extends Public_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		
		$data['hilight'] = new Hilight();
		$data['hilight']->where('status', 1)->get(null, true);
		
		
		$this->template->build("index",@$data);
	}
}