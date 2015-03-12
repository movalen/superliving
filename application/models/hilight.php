 	<?php
/**
 * User Model
 */
class Hilight extends ORM {
	
	var $table = "hilight";
	
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}