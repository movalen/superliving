<?php
/**
 * User Model
 */
class Int_sharefile_detail extends ORM {
	
	var $table = "int_sharefile_detail";
	
	var $has_one = array("int_sharefile");

	#var $has_many = array("forum_comment","forum_topic");
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}
