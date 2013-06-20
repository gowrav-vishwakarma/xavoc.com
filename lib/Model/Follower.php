<?php

class Model_Follower extends Model_Table {
	var $table= "readerfollower";
	function init(){
		parent::init();
		$this->addField('name');
		$this->hasOne('Reader','reader_id');
	}
}