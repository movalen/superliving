<?php
/**
 * User Model
 */
class Int_poll_answer extends ORM {
	
	var $table = "int_poll_answer";
	
	var $has_one = array("int_poll", "int_poll_detail", "user");
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}
