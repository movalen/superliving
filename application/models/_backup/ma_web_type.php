<?php
/*
 * Content Model
 */
class Ma_web_type extends ORM {

	var $table = "ma_web_type";

	var $has_many = array("content");

    function __construct($id = NULL) {
		parent::__construct($id);
    }
}