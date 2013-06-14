<?php

class page_tutu extends Page {
	function init(){
		parent::init();

		if(!$_GET['tutu_id']){
			$this->api->redirect('index');
		}

		
	}
}