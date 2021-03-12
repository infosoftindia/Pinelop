<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Newsletter {
	
	public function get_All_List(){
		$MailChimp = new Mailchimp(getenv('MAILCHIMP_APIKEY'));
		$Mailchimp_Lists = new Mailchimp_Lists( $MailChimp );
		return $Mailchimp_Lists->getList();
	}
	
	public function subscribe_Email($email){
		$MailChimp = new Mailchimp(getenv('MAILCHIMP_APIKEY'));
		$Mailchimp_Lists = new Mailchimp_Lists( $MailChimp );
		try{
			$subscriber = $Mailchimp_Lists->subscribe(getenv('MAILCHIMP_LIST_ID'), ['email' => $email]);
			if (!empty($subscriber['leid'])){
				return $subscriber['leid'];
			}else{
				return FALSE;
			}
		}catch(Exception $e){
			return FALSE;
		}
	}
	
	public function unsubscribe_Email($email){
		$MailChimp = new Mailchimp(getenv('MAILCHIMP_APIKEY'));
		$Mailchimp_Lists = new Mailchimp_Lists( $MailChimp );
		try{
			$subscriber = $Mailchimp_Lists->unsubscribe(getenv('MAILCHIMP_LIST_ID'), ['email' => $email]);
			if ($subscriber){
				return true;
			}else{
				return FALSE;
			}
		}catch(Exception $e){
			return FALSE;
		}
	}
	
	public function send_Email($to, $subject, $body){
		$MailChimp = new Mailchimp(getenv('MAILCHIMP_APIKEY'));
		$Mailchimp_Campaigns = new Mailchimp_Campaigns( $MailChimp );
		$options = [
			'list_id' => getenv('MAILCHIMP_LIST_ID'),
			'subject' => $subject,
			'from_email' => getenv('email'),
			'from_name' => getenv('title'),
			'to_name' => $to
		];
		$content = [
			'html' => $body
		];
		$campaign = $Mailchimp_Campaigns->create('regular', $options, $content);
		// print_r($mail);
		$Mailchimp_Campaigns->send($campaign['id']);
	}

	
}


























