<?php

class Model_User extends Model_Table {
	var $table= "users";
	function init(){
		parent::init();

		$this->addField('username')->mandatory('User name is must');
		$this->addField('password')->type('password');
		$this->addField('is_system_admin')->type('boolean');
	}
}