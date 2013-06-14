<?php

class Model_User extends Model_Table {
	var $table='users';

	function init(){
		parent::init();

		$this->addField('name')->mandatory('Must fill the name');
		$this->addField('username')->display(array('grid'=>'grid/inline'));
		$this->addField('password')->display(array('form'=>'password'));
		$this->addField('is_admin')->type('boolean');
		$this->addField('dob')->type('date')->defaultValue(date('Y-m-d'))->system(true);

		$this->hasMany('Book','user_id');

		$this->addExpression('new_field')->set('concat(name, " ", username)');
		$this->addExpression('books_count')->set(function ($m,$q){
			return $m->refSQL('Book')->count();
		});

		$this->addHook('beforeDelete',$this);

	}

	function beforeDelete(){
		if($this['books_count']>0) $this->api->js()->univ()->errorMessage('This user got books')->execute();
	}

}