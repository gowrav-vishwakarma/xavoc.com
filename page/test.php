<?php
class page_test extends Page {
	function init(){
		parent::init();

		$cols=$this->add('Columns');
		$left=$cols->addColumn(6);
		$right=$cols->addColumn(6);

		$v=$right->add('View_Info')->set('Hi There');

		$f=$left->add('Form');
		$f->addfield('line','num1')->validateNotNull('must fill this');
		$f->addfield('line','num2');

		$btn=$f->addSubmit('check');
		$btn->js('click',$v->js()->slideUp());

		if($f->isSubmitted()){
			if($f->get('num1') != $f->get('num2'))
				$f->displayError('num2','Both must be same');
		}

	}
}