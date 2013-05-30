<?php
class page_xbank extends Page {
	function init(){
		parent::init();
		$livebtn=$this->add('Button',null,'live_btn')->set('Live Demo');
		$livebtn->addClass('btn btn-primary btn-large');

		$livebtn->js('click')->univ()->frameURL("xBank Demo",$this->api->url('bankDemo'));
	}


	function defaultTemplate(){
		return array('page/xbank');
	}
}