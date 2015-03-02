<?php
class Catalogs extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$data['row'] = new Catalog();
		$data['row']->get_page();
		$data['no'] = 0;

		$this->template->build("catalogs/index", @$data);
	}
	
	public function form($id=false) {
		$data['rs'] = new Catalog($id);

		$this->template->build('catalogs/form', @$data);
	}
		public function delete_file($field = false, $id = false) {
			if(!$id) { redirect('admin/catalog'); }
			if(!$field) { redirect('admin/catalogs/form/'.$id); }
			
			$data = new Catalog($id);
			
			unlink($data->{$field});
			$data->{$field} = null;
			
			$data->save();
			
			redirect('admin/catalogs/form/'.$id);
		}

	public function save($id) {
		$data = new Catalog($id);
		
		//Upload files
			//-cover 
			if(!empty($_FILES['path_cover']['tmp_name'])) {
				//Clear old image
				if(!empty($data->path_cover)) {
					unlink($data->path_cover);
					$_POST['path_cover'] = '';
				}
				
				$config['upload_path'] = 'uploads/catalog/cover/';
				$config['allowed_types'] = 'jpg|gif|png';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('path_cover')) {
					$file = $this->upload->data();
					$file_name = uniqid();
					$_POST['path_cover'] = $config['upload_path'].$file_name.$file['file_ext'];
					rename($file['full_path'], $_POST['path_cover']);
				} else {
					#echo $this->upload->display_error();
					redirect('admin/catalogs/form/'.$id);
				}
			}
			
			//file
			if(!empty($_FILES['path_file']['tmp_name'])) {
				//Clear old image
				if(!empty($data->path_file)) {
					unlink($data->path_file);
					$_POST['path_file'] = '';
				}
				
				$config['upload_path'] = 'uploads/catalog/file/';
				$config['allowed_types'] = 'pdf';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('path_file')) {
					$file = $this->upload->data();
					$file_name = uniqid();
					$_POST['path_file'] = $config['upload_path'].$file_name.$file['file_ext'];
					rename($file['full_path'], $_POST['path_file']);
				} else {
					#echo $this->upload->display_error();
					redirect('admin/catalogs/form/'.$id);
				}
			}
		//End - upload files
		
		$data->from_array($_POST);
		$data->save();

		redirect('admin/catalogs');
	}
	
	public function delete($id) {
		$data = new Catalog($id);
		$data->delete();
		
		redirect('admin/catalogs');
	}
/*
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
		if(!$id) { redirect('admin/catalog'); }
		$data = new catalog($id);
		unlink($data->path_image);
		$data->path_image = null;
		unlink($data->path_thumb);
		$data->path_thumb = null;
		$data->save();
		
		redirect('admin/catalogs/form/'.$id);
	}
	
	
	public function index() {
		$data['row'] = new catalog();
		$data['row']->get_page();
		$data['no'] = 0;

		$this->template->build("catalogs/index", @$data);
	}
	
	public function form($id=false) {
		$data['rs'] = new catalog($id);

		$this->template->build('catalogs/form', @$data);
	}

	public function save($id = false) {
		$data['rs']  = new catalog($id);
		
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
			

			$config['upload_path'] = 'uploads/catalog';
			$config['allowed_types'] = 'jpg|gif|png';
			$config['create_thumb'] = true;
			#$config['max_height'] =
			#$config['max_width'] = 
			
			$this->load->library('upload', $config);
			if($this->upload->do_upload('path_image')) {
				$file = $this->upload->data();
				$file_name = uniqid();
				$_POST['path_image'] = 'uploads/catalog/'.$file_name.$file['file_ext'];
				$_POST['path_thumb'] = 'uploads/catalog/'.$file_name.'_thumb'.$file['file_ext'];
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
				echo $this->upload->display_error();
			}
		//End - upload files

		//save data
			
			$data['rs']->from_array($_POST);
			$data['rs']->save();
		//End - save data

		redirect('admin/catalogs');
	}
	
	public function delete($id = false) {
		$data['rs'] = new catalog($id);
		if(!empty($data['rs']->path_thumb)) {
			unlink($data['rs']->path_thumb);
			$_POST['path_thumb'] = '';
		}
		if(!empty($data['rs']->path_image)) {
			unlink($data['rs']->path_image);
			$_POST['path_image'] = '';
		}
		$data['rs']->delete();
		redirect('admin/catalogs');
	}
 * 
 */	 	
}