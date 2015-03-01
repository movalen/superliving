 	<?php
/**
 * User Model
 */
class Gallery_dtl extends ORM {
	
	var $table = "gallery_dtl";
	
	var $has_one = array("gallery");
	
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}