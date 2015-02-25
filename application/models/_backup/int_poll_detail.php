<?php
/**
 * User Model
 */
class Int_poll_detail extends ORM {
	
	var $table = "int_poll_detail";
	
	var $has_one = array("int_poll", "int_poll_answer");
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}
