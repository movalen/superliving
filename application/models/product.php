<?php
/**
 * User Model
 */
class Product extends ORM {
	
	var $table = "product";
	
	var $has_one = array(
		'category'
	);
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}