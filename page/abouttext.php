<?php

class page_abouttext extends Page {
	function init(){
		parent::init();

	}

	function defaultTemplate(){
		return array('page/aboutustext');
	}

	function render(){
		$this->template->tryDel('Menu');
		parent::render();
	}
}