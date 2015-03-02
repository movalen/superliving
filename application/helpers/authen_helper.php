<?php

if(!function_exists('is_login')) {
	function is_login() {
		$CI =& get_instance();
		
		if($CI->session->userdata('id')) {
			return true;
		} else {
			return false;
		}
	}
}


if(!function_exists('login')) {
	function login($user, $pass){
		$CI =& get_instance();
		$foo = new User();
		$foo->where('status', 1)
			->where('user',$user)
			->where('pass', md5($pass))
			->get(1);
		
		if($foo->id) {
			$CI->session->set_userdata('id', $foo->id);
			return true;
		} else {
			return false;
		}
	}
}

if(!function_exists('logout')) {
	function logout() {
		$CI =& get_instance();
		$CI->session->unset_userdata('id');
	}
}
