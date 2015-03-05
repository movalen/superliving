<?
if(!function_exists('set_notify')) {
	function set_notify($type,$msg) {
		$config = array(
			'notify' => TRUE,
			'type' => $type,
			'msg' => $msg
		);
		$CI =& get_instance();
		$CI->session->set_flashdata($config);
	}
}

if(!function_exists('notify'))
{
	function js_notify()
	{
		$CI =& get_instance();
		echo ($CI->session->flashdata('notify'));
		
		$js = "";
		if($CI->session->flashdata('notify')) {
			$js .= '<script src="'.site_url().'media/template/admin/js/jquery.js"></script>';
		    $js .= '<script type="text/javascript" src="'.site_url().'media/addon/jsnotify/notify.min.js"></script>';
		    $js .= '<script type="text/javascript">
				$.notify("'.$CI->session->flashdata('msg').'", "'.$CI->session->flashdata('type').'");
			</script>';
			echo $js; 
		}
	}
}
?>