<?php

class Model_Admin extends Model_User {
	function init(){
		parent::init();
		$this->addCondition('is_admin',true);
	}
}