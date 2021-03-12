<?php

	class Campaign_model extends CI_Model{
		
	public function pending_Campaign($id = FALSE){
		if($id){
			$this->db->where('ads_id', $id);
			$this->db->join('users', 'users_id = ads_user', 'left');
			$this->db->join('posts', 'posts_id = ads_product', 'left');
			return $this->db->get('ads')->row_array();
		}
		$this->db->where('ads_approved', '0');
		$this->db->join('users', 'users_id = ads_user', 'left');
		$this->db->join('posts', 'posts_id = ads_product', 'left');
		return $this->db->get('ads')->result_array();
	}
	
	public function completed_Campaign($id = FALSE){
		if($id){
			$this->db->where('ads_id', $id);
			$this->db->join('users', 'users_id = ads_user', 'left');
			$this->db->join('posts', 'posts_id = ads_product', 'left');
			return $this->db->get('ads')->row_array();
		}
		$this->db->where('ads_approved<>', '0');
		$this->db->join('users', 'users_id = ads_user', 'left');
		$this->db->join('posts', 'posts_id = ads_product', 'left');
		return $this->db->get('ads')->result_array();
	}
	
	public function emailCampaign($id){
		$data['campaign'] = $this->Campaign_model->allCampaign($id);
		$users_name		=	$data['campaign']['users_name'];
		$users_email	=	$data['campaign']['users_email'];
		$users_phone	=	$data['campaign']['users_phone'];
		$posts_title	=	$data['campaign']['posts_title'];
		$ads_title		=	$data['campaign']['ads_title'];
		
		$to = 'prashant@pearlorganisation.com';//$users_email;
		$subject = 'Thanks for your invitation';
		$body = 'Start new Advertisement Campaign Name: Select Product: Select Image: Ads Value: Number of Value: Ads Position: ';

		sendMail($to, $subject, $body);
	}
	
	
	public function update_campaign($id){
		$data = array(
			
			'ads_approved' => $this->input->post('status'),
			'ads_amount' => $this->input->post('amount'),
		);
		$this->db->where('ads_id', $id);
		$this->db->update('ads', $data);
	}
	
	
	
}






