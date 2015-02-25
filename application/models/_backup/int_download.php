<?php
/**
 * User Model
 */
class Int_download extends ORM {
	
	var $table = "int_download";
	
	#var $has_one = array("int_news");

	#var $has_many = array("forum_comment","forum_topic");
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}
