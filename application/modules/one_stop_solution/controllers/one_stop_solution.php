<?php
class One_stop_solution extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->template->set('active', 'one_stop_solution');
	}
	
	private $type = array(
		'link_interior' => array('icon' => 'fa-puzzle-piece', 'title' => 'INTERIOR DESIGN'),
		'link_architecture' => array('icon' => 'fa-pencil-square-o', 'title' => 'ARCHITECTURE SERVICES'),
		'link_construction' => array('icon' => 'fa-building-o', 'title' => 'CONSTRUCTION SERVICES'),
		'link_budget' => array('icon' => 'fa-usd', 'title' => 'BUDGET CONTROL'),
		'link_supply' => array('icon' => 'fa-spinner', 'title' => 'ONE-STOP PRODUCT SUPPLY')
	);
	
	
	public function index() {
		$data['type'] = $this->type;
		
		$data['rs'] = new Contact();
		$data['rs']->like('type', 'link_%');
		$data['rs']->get();
		
		
		foreach($data['rs'] as $item) {
			$data['type'][$item->type]['id'] = $item->id;
			$data['type'][$item->type]['detail'] = $item->detail;
		}
		
		$this->template->build("one_stop_solution/index",@$data);
	}
	
	public function detail($type) {
		if(!$type) {
			redirect('admin/links');
		}
		$data['type'] = $type;
		$data['data_type'] = $this->type;
		
		$data['rs'] = new Contact();
		$data['rs']->where('type', $type);
		$data['rs']->get(1);
		
		$data['head'] = $data['data_type'][$type];
		
		$this->template->build('one_stop_solution/detail', @$data);
	}
	
}