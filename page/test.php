<?php

class page_test extends Page {
	function init(){
		parent::init();

		$tabs=$this->add('Tabs');
		$lt=$tabs->addTab('LEFT ONE');
		$rt=$tabs->addTab('RIGHT ONE');

		$cols=$lt->add('Columns');
		$right=$cols->addColumn(6);
		$left=$cols->addColumn(6);
		$v=$right->add('View_Info')->set('Hi There');

		$form=$left->add('Form');
		$form->addField('line','num1')->validateNotNull('Must fil this');
		$form->addField('line','num2');
		$btn=$form->addSubmit('Compare');

		$btn->js('click',$v->js()->hide());

		if($form->isSubmitted()){
			if($form->get('num1') != $form->get('num2')){
				$form->displayError('num1','Must be same');
			}
		}


		$cr=$rt->add('CRUD');
		$cr->setModel('User');

	}
}