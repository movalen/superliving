<?php
/**
 * User Model
 */
class Contact extends ORM {
	
	var $table = "contact";
	/*
	public $has_one = array(
		'parent' => array(
            'class' => 'Catalog',
            'other_field' => 'child'
        )
	);
	
	public $has_many = array(
		'child' => array(
            'class' => 'catalog',
            'other_field' => 'parent'
        ),
        'product'
        
	);
	*/
	function __construct($id=null) {
		parent::__construct($id);
	}
}