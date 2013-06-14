<?php

class page_franchiseeForm extends Page {
	function init(){
		parent::init();
		
		$form = $this->add('Form');
		$form->addClass('atk-row');

		$form->addSeparator('span6');
		$form->add('H3')->set('Contact Details');
		$form->addField('line','your_name')->validateNotNull();
		$form->addField('line','company_name')->validateNotNull();
		$form->addField('line','contact_number')->validateNotNull();
		$form->addField('line','email_id')->validateNotNull();
		$form->addField('text','address')->validateNotNull();
		$form->addField('line','city')->validateNotNull();
		$form->addField('line','state')->validateNotNull();
		$form->addField('radio','country')->setValueList(array('India','Singapore'))->validateNotNull();
		
		$form->addSeparator('span6');
		$form->add('H3')->set('Technical Details');
		$form->addField('line','area_popullation');
		$form->addField('line','current_area_premises');
		$form->addField('line','number_of_lab');
		$form->addField('line','number_of_computer_system');
		$form->addField('line','average_intake_of_students_per_year');

		$form->addSubmit('Submit Request');

		$form->onSubmit(function($form){
			$tm=$form->add( 'TMail_Transport_PHPMailer' );

			$msg=$form->add( 'SMLite' );
			$msg->loadTemplate( 'mail/franchiseeapply' );
			$msg->trySet( 'your_name', $form->get('your_name') );
			$msg->trySet( 'company_name', $form->get('company_name') );
			$msg->trySet( 'contact_number', $form->get('contact_number') );
			$msg->trySet( 'email_id', $form->get('email_id') );
			$msg->trySet( 'address', $form->get('address') );
			$msg->trySet( 'city', $form->get('city') );
			$msg->trySet( 'state', $form->get('state') );
			$msg->trySet( 'country', $form->get('country') );
			$msg->trySet( 'area_popullation', $form->get('area_popullation') );
			$msg->trySet( 'current_area_premises', $form->get('current_area_premises') );
			$msg->trySet( 'number_of_lab', $form->get('number_of_lab') );
			$msg->trySet( 'number_of_computer_system', $form->get('number_of_computer_system') );
			$msg->trySet( 'average_intake_of_students_per_year', $form->get('average_intake_of_students_per_year') );
			

			$email_body=$msg->render();
			$subject ="New Franchisee Application from xavoc.com.";
			try{
				$emails_array= explode( ',', "info@xavoc.com,gowravvishwakarma@gmail.com" );
				foreach ( $emails_array as $email_id ) {
					$tm->send( $email_id, "", $subject, $email_body, "", $form->get('email'), $form->get('name') );
				}
			}catch( phpmailerException $e ) {
				throw $form->exception( $e->errorMessage() );
			}catch( Exception $e ) {
				throw $e;
			}
			
			$form->js()->univ()->closeDialog()->execute();
		});

	}	
}