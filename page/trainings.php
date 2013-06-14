<?php

class page_trainings extends Page {
	function init(){
		parent::init();

		$this->api->template->trySet('keywords','php training, php education, industrial training in php, internship in php in india, codeigniter, joomla, template, component development, udaipur, rajasthan, india');

		$heading= $this->add('View');
		$heading->add('H4')->set('Xavoc\'s Training: PHP + MySQL + Agiletoolkit [UK Based Certification]');
		$heading->add('HtmlElement')->setElement('blockquote')->setStyle('color','white')
			->set('Not being another IT institute, 
				Xavoc in collaboration with Agile Toolkit Ltd. UK, is providing extensive and exclusive training in PHP with Agiletoolkit. 
				Agiletoolkit is the World\'s fastest PHP framework. Xavoc prouds to be its exclusive business partner in India and Singapore.
				Here is what you are goining to get.
				');


		$v=$this->add('View',null,'jobs');
		$v->add('H3')->set('Xavoc Announces Official Jobs');
		$v->add('P')->set('Xavoc is open to accept approx 200+ Jobs for Trainers and Devleopers in PHP+MySQL+Agiletoolkit with in Next 12 Months.');
		$v->add('P')->set('If you are good in agiletoolkit, you can apply right now. if Not you can join any of our course and get assured job if passes the exam as per required standards.');
		$form = $v->add('Form');
		if($_GET['submitted'])
			$form->add('View_Info')->set('Thank You for Applying');
		else
			$form->add('View_Info')->set('Apply For Job Now');
		$form->addField('line','name')->validateNotNull();
		$form->addField('line','email')->validateNotNull();
		$form->addField('radio','apply_for')
			->setValueList(
				array(
					'Job'=>'Applying for Job',
					'course'=>'Applying job after course'
					)
				)
			->validateNotNull();
		$form->addField('Text','message');
		$form->addSubmit('Apply');

		$form->onSubmit(function($form){
			$tm=$form->add( 'TMail_Transport_PHPMailer' );

			$msg=$form->add( 'SMLite' );
			$msg->loadTemplate( 'mail/jobapply' );
			$msg->trySet( 'Name', $form->get('name') );
			$msg->trySet( 'EMail', $form->get( 'email' ) );
			$msg->trySet( 'JobType', $form->get( 'apply_for' ) );
			$msg->trySet( 'Message', $form->get( 'message' ) );

			$email_body=$msg->render();
			$subject ="New Job Application from xavoc.com.";
			try{
				$emails_array= explode( ',', "info@xavoc.com,gowravvishwakarma@gmail.com" );
				foreach ( $emails_array as $email_id ) {
					$tm->send( $email_id, "", $subject, $email_body, "", $form->get('email'), $form->get('name') );
				}
			}catch( phpmailerException $e ) {
				throw $this->exception( $e->errorMessage() );
			}catch( Exception $e ) {
				throw $e;
			}
			
			$form->js()->reload(array('submitted'=>true))->execute();
		});

		$franchisee_form=$this->add('Button',null,'bottom');//	,'Appy For Franchisee');
		$franchisee_form->set('Apply For Franchisee');
		$franchisee_form->addClass('btn btn-large');
		$franchisee_form->js('click')->univ()->frameURL("Apply For Franchisee",$this->api->url('franchiseeForm'));

	}

	function defaultTemplate(){
		return array('page/trainings');
	}
}