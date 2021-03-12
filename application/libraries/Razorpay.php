<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Razorpay {
	
	public function create_Customer($name, $email){
		$client = new Razorpay\Api\Api(getenv('razor_api_key'), getenv('razor_api_secret'));
		
		$customer = $client->customer->create(
			array(
				'name' => 'Razorpay User',
				'email' => 'customer@razorpay.com'
			)
		);
		return $customer['id'];
	}
	
	public function create_Order($data){
		$client = new Razorpay\Api\Api(getenv('razor_api_key'), getenv('razor_api_secret'));
		$order  = $client->order->create([
			'receipt'         => $data[1],
			'amount'          => $data[0]*100,
			'currency'        => $data[2],
			'payment_capture' =>  '0'
		]);
		return $order['id'];
	}
	
	public function check_Order($orderId){
		$client = new Razorpay\Api\Api(getenv('razor_api_key'), getenv('razor_api_secret'));
		return objectToArray($client->order->fetch($orderId));
		// return $client->payment->fetch($orderId);
	}

	
}