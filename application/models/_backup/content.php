	<?php
/*
 * Content Model
 */
class Content extends ORM {

	var $table = "ma_content";

	var $has_one = array("ma_web_type");

    function __construct($id = NULL) {
		parent::__construct($id);
		$this->where('content_group_id', 6);
    }
}