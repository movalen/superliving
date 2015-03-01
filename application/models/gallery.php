.<?php
/**
 * User Model
 */
class Gallery extends ORM {
	
	var $table = "gallery";
	
	var $has_many = array("gallery_dtl");
	
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}