<?php
/**
 * Center Model
 * กลุ่ม / ฝ่าย (ต่ำกว่าสำนัก/กอง)
 */
class Center extends ORM {
	
	public $table = "ma_center";
	
	public $has_one = array("heap");
	
	public $has_many = array("user");
	
	public function __construct($id=null) {
		parent::__construct($id);
	}
	
	public function user() {
		$value = new User();
		$value->where("center_id",$this->org_id)->get();
		return $value;
	}
	
}