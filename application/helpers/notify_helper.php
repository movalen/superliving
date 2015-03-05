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

if(!function_exists('notify')) {
	function js_notify() {
		$CI =& get_instance();
		if($CI->session->flashdata('notify')) {
		    $js = '<script type="text/javascript" src="'.site_url().'media/addon/jsnotify/notify.min.js"></script>';
		    $js .= '<script type="text/javascript">
		    	$(function(){
		    		$.notify("'.$CI->session->flashdata('msg').'", "'.$CI->session->flashdata('type').'");
		    	});
			</script>';
			return $js; 
		}
	}
}
//ใส่ที่ controller (ด้วย append_metadata) เวลาใช้ให้ใช้ set_notify($type, $msg) ก่อนทำการ redirect 
//:: ต้องใส่หลังจาก include jquery ด้วย
?>