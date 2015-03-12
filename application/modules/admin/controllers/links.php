<?php
class Links extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	private $type = array(
		'link_interior' => array('title' => 'INTERIOR DESIGN'),
		'link_architecture' => array('title' => 'ARCHITECTURE SERVICES'),
		'link_construction' => array('title' => 'CONSTRUCTION SERVICES'),
		'link_budget' => array('title' => 'BUDGET CONTROL'),
		'link_supply' => array('title' => 'ONE-STOP PRODUCT SUPPLY')
	);
	
	
	public function index() {		 
		$data['no'] = 0;
		$data['row'] = $this->type;
		
		$data['rs'] = new Contact();
		$data['rs']->like('type', 'link_%');
		$data['rs']->get();
		
		
		foreach($data['rs'] as $item) {
			$data['row'][$item->type]['id'] = $item->id;
			$data['row'][$item->type]['detail'] = $item->detail;
		}
		 
		$this->template->build("links/index", @$data);
	}
	

	public function form($type) {
		if(!$type) {
			redirect('admin/links');
		}
		$data['type'] = $type;
		$data['data_type'] = $this->type;
		
		$data['rs'] = new Contact();
		$data['rs']->where('type', $type);
		$data['rs']->get(1);
		
		$data['head'] = $data['data_type'][$type];
		
		$this->template->build('links/form', @$data);
	}
	
	public function delete_image($id = false) {
		if(!$id) { redirect('admin/product'); }
		$data = new Hilight($id);
		unlink($data->path_image);
		$data->path_image = null;
		unlink($data->path_thumb);
		$data->path_thumb = null;
		$data->save();
		
		redirect('admin/	form/'.$id);
	}
	
	

	public function save($id = false) {
		
		$data['rs']  = new Contact($id);
		
		//save data
			$data['rs']->from_array($_POST);
			$data['rs']->save();
			
		//End - save data
			set_notify('success', 'Save complete.');
			redirect('admin/links');
	}	 	
}