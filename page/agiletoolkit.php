<?php

class page_agiletoolkit extends Page {
	function init(){
        parent::init();
		
        $btn = $this->add('Button',null,'apply_entrance')->addClass('btn btn-primary btn-large')->set('Apply For Entrance Exam');
        $btn->js('click')->univ()->errorMessage("Kindly meil at info@xavoc.com for now");
    }

	function defaultTemplate(){
		return array('page/agiletoolkit');
	}
}