<?php
class About_us extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->template->set('active', 'about_us');
	}
	
	public function index() {
   		$data['aboutus'] = new Contact();
		$data['aboutus']->where('type', 'about_us')
						->get(1);
						
		$this->template->build("about_us/index",@$data);
	}

}