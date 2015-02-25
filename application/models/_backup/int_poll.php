<?php
/**
 * User Model
 */
class Int_poll extends ORM {
	
	var $table = "int_poll";
	
	var $has_many = array("int_poll_detail", "int_poll_answer");
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}
