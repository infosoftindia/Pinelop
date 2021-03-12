<?php

	class Payment_model extends CI_Model{
		
		
	public function pending_Payment($id = FALSE){
		if($id){
			$this->db->where('payments_id', $id);
			$this->db->join('users', 'payments_user = users_id', 'left');
			return $this->db->get('payments')->row_array();
		}
		$this->db->where('payments_status', '0');
		$this->db->join('users', 'payments_user = users_id', 'left');
		return $this->db->get('payments')->result_array();
	}
		
	public function completed_Payment($id = FALSE){
		if($id){
			$this->db->where('payments_id', $id);
			$this->db->join('users', 'payments_user = users_id', 'left');
			return $this->db->get('payments')->row_array();
		}
		$this->db->where('payments_status<>', '0');
		$this->db->order_by('payments_id', 'DESC');
		$this->db->join('users', 'payments_user = users_id', 'left');
		return $this->db->get('payments')->result_array();
	}
		
	public function update_Payment($id){
		$data = array(
			
			'payments_status' => $this->input->post('status'),
			'payments_note' => $this->input->post('note'),
		);
		$this->db->where('payments_id', $id);
		$this->db->update('payments', $data);
	}
		
	
}



