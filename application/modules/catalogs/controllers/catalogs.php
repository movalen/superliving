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
	
	public function detail($id = false) {
		if(!$id) {
			redirect('catalogs');
		}
		
		$data['catalog'] = new Catalog($id);
		$this->template->build("catalogs/detail",@$data);
	}
	
	public function read_pdf($file_name = null){
		$data['file_name'] = $file_name;
		$this->load->view("catalogs/read_pdf",@$data);
	}
	
	public function download_pdf($id = false) {
		if(!$id) { return false; }
		
		$data['file'] = new Catalog($id);

		if(isset($data['file']->path_file) and $data['file']->path_file!="") {
		    $file = $data['file']->path_file;
		    $len = filesize($file);
			$filename = $data['file']->title.'.'.pathinfo( $file , PATHINFO_EXTENSION ) ;

		    header("Pragma: public");
		    header("Expires: 0");
		    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		    header("Cache-Control: public");
		    header("Content-Description: File Transfer");
		    header("Content-Type: application/force-download");
		    $header="Content-Disposition: attachment; filename=".basename($filename).";";
		    header($header);
		    header("Content-Transfer-Encoding: binary");
		    header("Content-Length: ".$len);
		    @readfile($file);
		    exit;
		}
	}
}