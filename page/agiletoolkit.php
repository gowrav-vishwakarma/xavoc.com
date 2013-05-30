<?php

class page_agiletoolkit extends Page {
	function init(){
        parent::init();
		
		$ch=$this->add('chart/Chart')
		->setTitle("My Title",null,"my sub title")
		->setChartType('line')
		->setXAxisTitle("Months")	
		->setYAxisTitle("Sales")
		->setXAxis(array("Jan","Feb","Mar","Apr","May","jun","july","Aug","sep","oct","nov","dec"))
		->setLegendsOptions(array("layout"=>"vertical","align"=>"right","verticalAlign"=>"top"))
		;

		$btn2=$this->add('Button','btn2')->set('JSCLICKED')->js('click')->univ()->addSeries(array(
						"name"=>"london",
						"data"=>array(rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10))
						));

		$jv=$this->add('View');
		$this->add('Button','btn')
			->js('click',$jv->js()->reload(array('btn'=>true)));
		
		if($_GET['btn']){
			$jv->js(true)->_selector("#".$ch->name)->univ()->addSeries(array(
						"name"=>"london",
						"data"=>array(rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10))
						))->execute();
		}
    }

	function defaultTemplate(){
		return array('page/agiletoolkit');
	}
}