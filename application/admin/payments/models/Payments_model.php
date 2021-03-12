<?php

	class Payments_model extends CI_Model{
		
		public function list_Payment_History(){
			$user = $this->session->userdata('user_id');
			$this->db->select('*');
			$this->db->from('payments');
			$this->db->where('payments_user', $user);
			$this->db->order_by('payments_id', 'DESC');
			return $this->db->get()->result_array();
		}
		
		public function request_Payment(){
			$user = $this->session->userdata('user_id');
			$data = array(
				'payments_user' => $user,
				'payments_amount' => $this->input->post('withdrawal_amount'),
				'payments_methods' => $this->input->post('payment_method'),
				'payments_details' => $this->input->post('payment_detail'),
				'payments_created_on' => date('Y/m/d H:i:s')
			);
			$this->db->insert('payments', $data);
		}
	
		
		
	}