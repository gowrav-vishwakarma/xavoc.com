<?php

class Model_Book extends Model_Table {
	var $table='books';
	function init(){
		parent::init();

		$this->addField('name');
		$this->hasOne('User','user_id');
	}
}