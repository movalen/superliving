<?php
/**
 * User Model
 */
class Category extends ORM {
	
	var $table = "category";
	
	public $has_one = array(
		'parent' => array(
            'class' => 'category',
            'other_field' => 'child'
        )
	);
	
	public $has_many = array(
		'child' => array(
            'class' => 'category',
            'other_field' => 'parent'
        ),
        'product'
	);
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}