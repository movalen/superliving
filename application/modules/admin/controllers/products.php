<?php
class Products extends Admin_Controller {

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
		if(!$id) { redirect('admin/product'); }
		$data = new Product($id);
		unlink($data->path_image);
		$data->path_image = null;
		unlink($data->path_thumb);
		$data->path_thumb = null;
		$data->save();
		
		redirect('admin/products/form/'.$id);
	}
	
	
	public function index() {
		$data['row'] = new Product();
		$data['row']->get_page();
		$data['no'] = 0;

		$this->template->append_metadata("<script src='media/script/confirm_delete.js'></script>");
		$this->template->build("products/index", @$data);
	}
	
	public function form($id=false) {
		$data['rs'] = new Product($id);
		
		$this->template->append_metadata("<script src='media/script/confirm_delete.js'></script>");
		$this->template->build('products/form', @$data);
	}

	public function save($id = false) {
		$data['rs']  = new Product($id);
		
		//Upload files
			//Clear old image
				if(!empty($_POST['path_thumb'])) {
					unlink($data['rs']->path_thumb);
					$_POST['path_thumb'] = '';
				}
				if(!empty($_POST['path_image'])) {
					unlink($data['rs']->path_image);
					$_POST['path_image'] = '';
				}
			//End - clear old image
			

#			if(!empty($_FILES['path_image']['tmp_name'])) {
				$config['upload_path'] = 'uploads/product';
				$config['allowed_types'] = 'jpg|gif|png';
				$config['create_thumb'] = true;
				#$config['max_height'] =
				#$config['max_width'] = 
				
				$this->load->library('upload', $config);
				if($this->upload->do_upload('path_image')) {
					$file = $this->upload->data();
					$file_name = uniqid();
					$_POST['path_image'] = 'uploads/product/'.$file_name.$file['file_ext'];
					$_POST['path_thumb'] = 'uploads/product/'.$file_name.'_thumb'.$file['file_ext'];
					rename($file['full_path'], $_POST['path_image']);
					
					//create - Thumbnail
					$config['image_library'] = 'gd2';
					$config['source_image'] =  $_POST['path_image'];
					$config['width'] = 50;
					$config['height'] = 50;
					$config['create_thumb'] = true;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
	
					//end - create - thumbnail
				} else {
					set_notify('error', 'Please attach files.');
					redirect('admin/products/form/'.$id);
				}
			#}
		//End - upload files

		//save data
			
			$data['rs']->from_array($_POST);
			$data['rs']->save();
		//End - save data
		set_notify('success', 'Save complete.');
		redirect('admin/products');
	}
	
	public function delete($id = false) {
		$data['rs'] = new Product($id);
		if(!empty($data['rs']->path_thumb)) {
			unlink($data['rs']->path_thumb);
			$_POST['path_thumb'] = '';
		}
		if(!empty($data['rs']->path_image)) {
			unlink($data['rs']->path_image);
			$_POST['path_image'] = '';
		}
		$data['rs']->delete();
		set_notify('success', 'Delete complete.');
		redirect('admin/products');
	}	 	
}