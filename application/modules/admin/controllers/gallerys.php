<?php
class Gallerys extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function coption_category($id = false) {
		if(!$id) {
			echo 0;
			return false;
		} else {
			$data['parent'] = new Category();
			$data['parent']->where('parent_id', $id);
			$data['parent']->get();
			
			
			if(empty($data['parent']->all)) {
				echo 0 	;
				return false;
			} else {
				echo '<option value="">--หมวดหมู่ย่อย--</option>';
				foreach($data['parent'] as $item) {
					echo '<option value="'.$item->id.'">'.$item->title.'</option>';
				}
			}	
		}
	}
	
	public function delete_image($id = false) {
		if(!$id) { redirect('admin/gallerys'); }
		$data = new Gallery($id);
		unlink($data->path_cover);
		$data->path_cover = null;
		$data->save();
		set_notify('success', 'Delete image complete.');
		redirect('admin/gallerys/form/'.$id);
	}
	
	
	public function index() {
		$data['row'] = new Gallery();
		$data['row']->get_page();
		$data['no'] = 0;

		$this->template->append_metadata("<script src='media/script/confirm_delete.js'></script>");
		$this->template->build("gallerys/index", @$data);
	}
	
	public function form($id=false) {
		$data['rs'] = new Gallery($id);

		$this->template->append_metadata("<script src='media/script/confirm_delete.js'></script>");
		$this->template->build('gallerys/form', @$data);
	}

	public function save($id = false) {
		$data['rs']  = new Gallery($id);
		
			//Upload files	
				//Clear old image
					if(!empty($data['rs']->path_cover)) {
						@unlink($data['rs']->path_cover);
						$_POST['path_cover'] = '';
					}
				//End - clear old image
				
				$config['upload_path'] = 'uploads/gallery';
				$config['allowed_types'] = 'jpg|gif|png';
	
				$this->load->library('upload', $config);
				if($this->upload->do_upload('path_cover')) {
					$file = $this->upload->data();
					$file_name = uniqid();
					$_POST['path_cover'] = $config['upload_path'].'/'.$file_name.$file['file_ext'];
					rename($file['full_path'], $_POST['path_cover']);
					
					//create - Thumbnail
						$config['image_library'] = 'gd2';
						$config['source_image'] =  $_POST['path_cover'];
						$config['width'] = 280;
						$config['height'] = 150;
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
					//end - create - thumbnail
				} else {
					set_notify('error', 'Please attach files.');
					redirect('admin/gallerys/form/'.$id);
				}
			//End - upload files
		
		
		//save data
			$data['rs']->from_array($_POST);
			$data['rs']->save();
		//End - save data
		set_notify('success', 'Save complete.');
		redirect('admin/gallerys');
	}
	
	public function delete($id = false) {
		$data['rs'] = new Gallery($id);
		if(!empty($data['rs']->path_cover)) {
			unlink($data['rs']->path_cover);
			$_POST['path_cover'] = '';
		}
		$data['rs']->delete();
		set_notify('success', 'Delete complete.');
		redirect('admin/gallerys');
	}	 	
}