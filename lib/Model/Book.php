<?php

class Model_Book extends Model_Table {
	var $table='books';
	function init(){
		parent::init();

		$this->hasOne('User','user_id');
		$this->addField('name');
		$this->hasMany('Reader','book_id');
	}
}