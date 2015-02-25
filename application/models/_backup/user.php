<?php
/**
 * User Model
 */
class User extends ORM {
	
	var $table = "ma_user";
	
	var $has_one = array("center","operation_center","user_type");

	var $has_many = array("forum_comment","forum_topic");
	
	function __construct($id=null) {
		parent::__construct($id);
	}
	
	public function center() {
		$value = new Center();
		$value->get_by_org_id($this->center_id);
		return $value;
	}
	
	public function heap() {
		$value = new Heap();
		$value->get_by_org_id($this->heap_id);
		return $value;
	}
	
}