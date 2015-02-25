<?php
/**
 * User Model
 */
class Int_sharefile extends ORM {
	
	var $table = "int_sharefile";
	
	#var $has_one = array("int_news");

	var $has_many = array("int_sharefile_detail", "int_sharefile_access");
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}
