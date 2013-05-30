<?php

class page_aboutus extends Page {
	function init(){
		parent::init();

		$aboutBtn=$this->add('Button',null, 'about_btn');
		$aboutBtn->set('Open About Us Details');
		$aboutBtn->addClass('btn btn-warning btn-large');
		$aboutBtn->js('click')->univ()->frameURL('About Xavoc',$this->api->url('abouttext'),array('width'=>'90%'));
	}

	function render(){
		$this->api->template->del('footer');
		parent::render();
	}

	function defaultTemplate(){
		return array('page/aboutus');
	}
}