<?php
/**
 * User Model
 */
class Int_sharefile_access extends ORM {
	
	var $table = "int_sharefile_access";
	
	var $has_one = array("int_sharefile");
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}
