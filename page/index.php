<?php

class page_index extends Page {
	function init(){
		parent::init();

		if($_GET['option']=='com_xavocnews'){
			echo "NEED PROFESSIONAL HELP IN XCI PROJECT... Drop us an EMAIL at info@xavoc.com";
			exit;
		}
	}

	function defaultTemplate(){
		return array('page/index');
	}
}