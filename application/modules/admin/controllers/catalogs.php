<?php
class Catalogs extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$data['row'] = new Catalog();
		$data['row']->get_page();
		$data['no'] = 0;
		
		$this->template->append_metadata("<script src='media/script/confirm_delete.js'></script>");
		$this->template->build("catalogs/index", @$data);
	}
	
	public function form($id=false) {
		$data['rs'] = new Catalog($id);

		$this->template->append_metadata("<script src='media/script/confirm_delete.js'></script>");
		$this->template->append_metadata("<script src='media/addon/jquery_validate/jquery-validation-1.13.1/dist/jquery.validate.min.js'></script>");
		$this->template->append_metadata("<script src='media/addon/jquery_validate/jquery-validation-1.13.1/dist/additional-methods.min.js'></script>");
		$this->template->build('catalogs/form', @$data);
	}
		public function delete_file($field = false, $id = false) {
			if(!$id) { redirect('admin/catalog'); }
			if(!$field) { redirect('admin/catalogs/form/'.$id); }
			
			$data = new Catalog($id);
			
			unlink($data->{$field});
			$data->{$field} = null;
			
			$data->save();
			set_notify('succes', 'Delete file complete.');
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
					set_notify('error', 'Please attach files.');
					redirect('admin/catalogs/form/'.$id);
				}
			}
			
			//file
			if(!empty($_FILES['path_file']['tmp_name'])) {
				//Clear old file
				if(!empty($data->path_file)) {
					unlink($data->path_file);
					$_POST['path_file'] = '';
				}
				
				 $correct_type = array('.pdf');
				 $type_file = strrchr($_FILES['path_file']['name'],".");
				 $name =  'uploads/catalog/file/'.uniqid().$type_file;
				if(in_array($type_file, $correct_type)) {
						$file = array(
							'tmp'=> $_FILES['path_file']['tmp_name'],
							'target'=> $name
						);

					if(!move_uploaded_file($file['tmp'], $file['target'])) {
						set_notify('error', 'Error:Can\'t upload files.');
					}else{
						$_POST['path_file'] = $name;
					}
				}else{
					set_notify('error', 'Please attach files type PDF');
					redirect('admin/catalogs/form/'.$id);
				}
			}
			
		//End - upload files
		
		$data->from_array($_POST);
		$data->save();
		set_notify('success', 'Save complete.');
		redirect('admin/catalogs');
	}
	
	public function delete($id) {
		$data = new Catalog($id);
		if(!empty($data->path_file)) {
			unlink($data->path_file);
		}
		if(!empty($data->path_cover)) {
			unlink($data->path_cover);
		}
		$data->delete();
		set_notify('success', 'Delete complete.');
		redirect('admin/catalogs');
	}
}