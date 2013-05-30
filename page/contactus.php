<?php
class page_contactus extends Page {
	function init(){
		parent::init();

		$num1=rand(1,10);
		$num2=rand(1,10);

		$cols=$this->add('Columns');
		$left=$cols->addColumn(6);
		$right=$cols->addColumn(6);
		$left->add('H1')->set('Enquiry Form');
		$form=$left->add('Form');
		if($_GET['submitted']){
			$form->add('View_Info')->set('Thank you for your submition');
		}
		$form->addField('line','Name');
		$form->addField('line','EMail','E-Mail');
		$form->addField('text','Message');
		$form->add('Text')->set('Are you human? What is ');
		$form->add('Text')->set("$num1 + $num2 = ?");
		$form->addField('line','capcha','Answer');
		$form->addField('hidden','num1')->set($num1);
		$form->addField('hidden','num2')->set($num2);
		$sub = $form->addSubmit("Submit");

		// $gm=$right->add('google/View_Map');


		if($form->isSubmitted()){
			if($form->get('num1') + $form->get('num2') != $form->get('capcha')){
				$form->displayError('capcha',"Are you sure human!!!");
			}
			$tm=$this->add( 'TMail_Transport_PHPMailer' );

			$msg=$this->add( 'SMLite' );
			$msg->loadTemplate( 'mail/enquiry' );
			$msg->trySet( 'Name', $form->get('Name') );
			$msg->trySet( 'EMail', $form->get( 'EMail' ) );
			$msg->trySet( 'Message', $form->get( 'Message' ) );

			$email_body=$msg->render();
			$subject ="New Enquiry from xavoc.com.";
			try{
				$emails_array= explode( ',', "info@xavoc.com,gowravvishwakarma@gmail.com" );
				foreach ( $emails_array as $email_id ) {
					$tm->send( $email_id, "", $subject, $email_body );
				}
			}catch( phpmailerException $e ) {
				throw $this->exception( $e->errorMessage() );
			}catch( Exception $e ) {
				throw $e;
			}
			
			$form->js()->reload(array('submitted'=>true))->execute();
		}
	}

	function defaultTemplate(){
		return array('page/contactus');
	}
}