<?php
class Gallery_dtls extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index($id = false) {
		if(!$id) {
			redirect('admin/gallery');
		}
		
		$data['rs'] = new Gallery($id);
		$data['no'] = 0;

		$this->template->append_metadata("<script src='media/script/confirm_delete.js'></script>");
		$this->template->append_metadata("<script src='media/addon/jquery_validate/jquery-validation-1.13.1/dist/jquery.validate.min.js'></script>");
		$this->template->append_metadata("<script src='media/addon/jquery_validate/jquery-validation-1.13.1/dist/additional-methods.min.js'></script>");
		$this->template->build("gallery_dtls/index", @$data);
	}
	
	public function delete($id = false) {
		if(!$id) {
			redirect('admin/gallery');
		}
		
		$data = new Gallery_dtl($id);
		$gallery_id = $data->gallery_id;
		
		@unlink($data->path_image);
		#$data->path_image = null;
		
		@unlink($data->path_thumb);
		#$data->path_thumb = null;
		$data->delete();
		set_notify('success', 'Delete image complete.');
		redirect('admin/gallery_dtls/index/'.$gallery_id);
	}
	
	public function save() {
		$data['rs']  = new Gallery_dtl();
		
		//Upload files
			//Clear old image
				if(!empty($data['rs']->path_thumb)) {
					unlink($data['rs']->path_thumb);
					$_POST['path_thumb'] = '';
				}
				if(!empty($data['rs']->path_image)) {
					unlink($data['rs']->path_image);
					$_POST['path_image'] = '';
				}
			//End - clear old image
			

			//Upload file
				$config['upload_path'] = 'uploads/gallery';
				$config['allowed_types'] = 'jpg|gif|png';
				
			$this->load->library('upload', $config);
			
			if($this->upload->do_upload('path_image')) {
				//--Rename file thumb
				$file = $this->upload->data();
				$file_name = uniqid();
				$_POST['path_image'] = $config['upload_path'].'/'.$file_name.$file['file_ext'];
				$_POST['path_thumb'] = $config['upload_path'].'/'.$file_name.'_thumb'.$file['file_ext'];
				rename($file['full_path'], $_POST['path_thumb']);
				
				//resize - files 
					$config['image_library'] = 'gd2';
					$config['source_image'] =  $_POST['path_thumb'];
					$config['width'] = '980';
					$config['height'] = '400';
					$config['maintain_ratio'] = false;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
				
				//create thumb
					copy($_POST['path_thumb'], $_POST['path_image']);
				
				//resize thumb
					$config['source_image'] =  $_POST['path_thumb'];
					$config['width'] = '207';
					$config['height'] = '150';
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					$this->image_lib->clear();
						
			} else {
				set_notify('error', 'Please attach files.');
				redirect('admin/gallery_dtls/index/'.$_POST['gallery_id']);
			}
		//End - upload files

		//save data
			
			$data['rs']->from_array($_POST);
			$data['rs']->save();
		//End - save data
		set_notify('success', 'บันทึกข้อมูลเสร็จสิ้น');
		redirect('admin/gallery_dtls/index/'.$_POST['gallery_id']);
	}	 	
}