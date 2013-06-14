<?php

class page_franchiseeForm extends Page {
	function init(){
		parent::init();
		
		$form = $this->add('Form');
		$form->addField('line','your_name');
		$form->addField('line','city');
		$form->addField('line','state');
		$form->addField('radio','country')->enum(array('India','Singapore'));

	}	
}