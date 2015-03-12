<?php
class Admin extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->template->build('index');
	}
	
	public function logos() {
		$data['rs'] = new Contact();
		$data['rs']->where('type', 'logo')->get(1);
		
		if(!empty($_FILES)) {
			$_POST['type'] = 'logo';
			$config['upload_path'] = 'uploads/site';
			$config['allowed_types'] = 'jpg|gif|png';
			
			$this->load->library('upload', $config);
			
			if($this->upload->do_upload('logo')) {
				//--Rename file thumb
				$file = $this->upload->data();
				$file_name = uniqid();
				$_POST['detail'] = $config['upload_path'].'/'.$file_name.$file['file_ext'];
				rename($file['full_path'], $_POST['detail']);
				
				//resize - files 
					$config['image_library'] = 'gd2';
					$config['source_image'] =  $_POST['detail'];
					$config['width'] = '50';
					$config['height'] = '50';
					$config['maintain_ratio'] = false;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

				
				if(!empty($data['rs']->detail)) {
					unlink($data['rs']->detail);
				}	
					
				@$data['rs']->type = 'logo';
				@$data['rs']->detail = $_POST['detail'];
				
				$data['rs']->save();
				set_notify('success', 'Save complete');
				redirect('admin/logos');
			} else {
				set_notify('error', 'Please attach files.');
				redirect('admin/logos');
			}
		}

		$this->template->build('logos', @$data);
	}
	public function delete_logo() {
		$logo = new Contact();
		$logo->where('type', 'logo')->get(1);
		
		
		if(!empty($logo->detail)) {
			unlink($logo->detail);
			$logo->detail = null;
			$logo->save();
		}
		set_notify('success', 'Delete complete.');
		redirect('admin/logos');
	}


	public function profiles() {
		$data['rs'] = new User($this->session->userdata('id'));
		$this->template->append_metadata('<script src="media/addon/jquery_validate/jquery-validation-1.13.1/dist/jquery.validate.min.js"></script>');
		$this->template->build("profiles", @$data);
	}
	
	public function profile_save($id = false) {
		if(empty($_POST['pass'])) {
			unset($_POST['pass']); 	
		} else {
			if($_POST['pass'] == $_POST['repass']) {
				$_POST['pass'] = md5($_POST['pass']);
			} else {
				unset($_POST['pass']);
			}
		}
		//save data
			$data['rs']  = new User($id);
			$data['rs']->from_array($_POST);
			$data['rs']->save();
		//End - save data
		set_notify('success', 'Save complete.');
		redirect('admin');
	}
	
	
	public function switch_status($model,$id) {
		$model = ucfirst($model);
		$foo = new $model($id);
		$foo->status = ($foo->status == 1)?0:1;
		$foo->save();
		echo $foo->status;
	}
	
	public function signout() {
		logout();
		set_notify('success', 'Sign out complete.');
		redirect('admin');
	}
	
	
	//Contact (about us, contact us)
	private function call_contact($data = false) {
		$data['rs'] = new Contact();
		$data['rs']->where('type', @$data['type']);
		$data['rs']->get(1);
		
		$this->template->append_metadata('<script src="media/addon/jquery_validate/jquery-validation-1.13.1/dist/jquery.validate.min.js"></script>');
		$this->template->build('contact', @$data);
	}
	public function about_us() {
		$this->call_contact(array('title'=>'About us', 'type'=>'about_us'));
	}
	
	public function contact_us() {
		$this->call_contact(array('title'=>'Contact us', 'type' => 'contact_us'));
	}
	
	public function contact_save() {
		$data = new Contact();
		$data->where('type', @$_POST['type']);
		$data->get(1);
		
		$id = $data->id;
		
		$data = new Contact($id);
		$data->from_array($_POST);
		$data->save();
		set_notify('success', 'Save complete.');
		redirect('admin/'.$_POST['type']);
	}
}