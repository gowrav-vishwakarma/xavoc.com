<?php

class Model_User extends Model_Table {
	var $table='users';

	function init(){
		parent::init();

		// $this->addField('name')->mandatory('Must fill the name');
		$this->addField('username')->display(array('grid'=>'grid/inline'));
		$this->addField('password')->display(array('form'=>'password'));
		$this->addField('is_system_admin')->type('boolean');
		// $this->addField('dob')->type('date')->defaultValue(date('Y-m-d'))->system(true);

		$this->hasMany('Book','user_id');

		// $this->addExpression('new_field')->set('concat(name, " ", username)');
		$this->addExpression('books_count')->set(function ($m,$q){
			return $m->refSQL('Book')->count();
		});

		$this->addExpression('readers_count')->set(function ($m,$q){
			return $t=$m->refSQL('Book')->count()->join('booksreader.book_id','id');
			// $t->join('booksreader.book_id','id');
			// return $t->count();
		});
		
		$this->addExpression('follower_count')->set(function ($m,$q){

			$book=$m->refSQL('Book');
			$reader=$book->join('booksreader.book_id');
			$follower= $reader->join('readerfollower.reader_id');
			return $book->count();
			//complex
			$book=$m->add('Model_Book');
			// $t=$m->refSQL('Book');
			$reader=$book->join('booksreader.book_id','id');
			$reader->addField('bname','name');
			$followers=$reader->join('readerfollower.reader_id','id');
			$followers->addField('rname','name');
			$book->addCondition('user_id',$q->getField('id'));
			$book->addCondition('rname','like','%r%');
			$book->addCondition('bname','like','%22%');
			return $book->count();
			// return $t=$m->refSQL('Book')->count()->join('booksreader.book_id','id')->join('readerfollower.reader_id','id');
			// $t->join('booksreader.book_id','id');
			// return $t->count();
		});

		$this->addHook('beforeDelete',$this);
		// $this->debug();
	}

	function beforeDelete(){
		if($this['books_count']>0) $this->api->js()->univ()->errorMessage('This user got books')->execute();
	}

}