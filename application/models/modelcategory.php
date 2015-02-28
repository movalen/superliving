<?php
/**
 * User Model
 */
class ModelCategory extends ORM {
	
	var $table = "category";
	
	public $has_one = array(
		'parent' => array(
            'class' => 'ModelCategory',
            'other_field' => 'child'
        )
	);
	
	public $has_many = array(
		'child' => array(
            'class' => 'ModelCategory',
            'other_field' => 'parent'
        )
	);
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}