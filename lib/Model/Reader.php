<?php


class Model_Reader extends Model_Table {
	var $table= "booksreader";
	function init(){
		parent::init();
		$this->addField('name');
		$this->hasOne('Book','book_id');
		$this->hasMany('Follower','reader_id');
	}
}