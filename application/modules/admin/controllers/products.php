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
				echo '<option value="">--Sub category--</option>';
				foreach($data['parent'] as $item) {
					echo '<option value="'.$item->id.'" >'.$item->title.'</option>';
				}
			}	
		}
	}
	
	public function delete_image($id = false, $type = false) {
		if(!$id) { redirect('admin/product'); }
		
		
		$data = new Product($id);
		
		if($type == 'thumb') {
			$path_unlink = $data->path_thumb;
			$data->path_thumb = null;
		} else {
			$path_unlink = $data->path_image;
			$data->path_image = null;
		}
		
		unlink($path_unlink);
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
		
		
		$tmp = $this->get_headTitle($data['rs']->category_id);
		if(!empty($tmp)) {
			foreach($tmp as $key => $item) {
				$data['cat']['cat_'.(count($tmp)-$key)] = $item;
			}
		}

		$this->template->append_metadata("<script src='media/script/confirm_delete.js'></script>");
		$this->template->append_metadata("<script src='media/addon/jquery_validate/jquery-validation-1.13.1/dist/jquery.validate.min.js'></script>");
		$this->template->append_metadata("<script src='media/addon/jquery_validate/jquery-validation-1.13.1/dist/additional-methods.min.js'></script>");
		$this->template->build('products/form', @$data);
	}
		private function get_headTitle($id = false, $layer_index = 0) {
			if(!$id) { return false; }
			
			$cat = new Category($id);
			$rs[$layer_index] = $cat->id;
			
			if(!empty($cat->parent->id)) {
				$layer_index++;
				$tmp = $this->get_headTitle($cat->parent->id, $layer_index);
				$rs = array_merge($rs, $tmp);
			}
			
			return $rs;
		}

	public function save($id = false) {
		$data['rs']  = new Product($id);
		
		//Upload files
			//Clear old image
				if(!empty($_FILES['path_image']['tmp_name']) && !empty($data['rs']->path_image)) {
					unlink($data['rs']->path_image);
					$_POST['path_image'] = '';
				}
			//End - clear old image
			
			//Clear old thumb
				if(!empty($_FILES['path_thumb']['tmp_name']) && !empty($data['rs']->path_thumb)) {
					unlink($data['rs']->path_thumb);
					$_POST['path_thumb'] = '';
				}
			//End-  clear old thumb
			
			if(!empty($_FILES['path_thumb']['tmp_name'])) {
				$config['upload_path'] = 'uploads/product';
				$config['allowed_types'] = 'jpg|gif|png';
				
				$this->load->library('upload', $config);
				if($this->upload->do_upload('path_thumb')) {
					$file = $this->upload->data();
					$file_name = uniqid();
					$_POST['path_thumb'] = 'uploads/product/'.$file_name.$file['file_ext'];
					#$_POST['path_thumb'] = 'uploads/product/'.$file_name.'_thumb'.$file['file_ext'];
					rename($file['full_path'], $_POST['path_thumb']);
					
					$config['image_library'] = 'gd2';
					$config['source_image'] =  $_POST['path_thumb'];
					$config['width'] = 180;
					$config['height'] = 180;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					
					
					//create - Thumbnail
					/*
					$config['image_library'] = 'gd2';
					$config['source_image'] =  $_POST['path_thumb'];
					$config['width'] = 50;
					$config['height'] = 50;
					$config['create_thumb'] = true;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					/**/
					//end - create - thumbnail
				} else {
					set_notify('error', 'Please attach files.');
					redirect('admin/products/form/'.$id);
				}
			}

			if(!empty($_FILES['path_image']['tmp_name'])) {
				$config['upload_path'] = 'uploads/product';
				$config['allowed_types'] = 'jpg|gif|png';
				
				$this->load->library('upload', $config);
				if($this->upload->do_upload('path_image')) {
					$file = $this->upload->data();
					$file_name = uniqid();
					$_POST['path_image'] = 'uploads/product/'.$file_name.$file['file_ext'];
					#$_POST['path_thumb'] = 'uploads/product/'.$file_name.'_thumb'.$file['file_ext'];
					rename($file['full_path'], $_POST['path_image']);
					
					//create - Thumbnail
					/*
					$config['image_library'] = 'gd2';
					$config['source_image'] =  $_POST['path_image'];
					$config['width'] = 50;
					$config['height'] = 50;
					$config['create_thumb'] = true;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					/**/
					//end - create - thumbnail
				} else {
					set_notify('error', 'Please attach files.');
					redirect('admin/products/form/'.$id);
				}
			}

			
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