<?php

	class Vendors_model extends CI_Model{
		
		public function listing($id = FALSE){
			if($id){
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('users_id', $id);
				$this->db->where('users_role', '2');
				return $this->db->get()->row_array();
			}else{
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('users_role', '2');
				$this->db->order_by('users_id', 'DESC');
				return $this->db->get()->result_array();
			}
		}
		
		public function RequestListing($id = FALSE){
			if($id){
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('users_id', $id);
				$this->db->where('users_role', '2');
				$this->db->where('users_status', '0');
				return $this->db->get()->row_array();
			}else{
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('users_role', '2');
				$this->db->where('users_status', '0');
				$this->db->order_by('users_id', 'DESC');
				return $this->db->get()->result_array();
			}
		}
		
	public function changeStatus($user_id, $status){
		$data = array(
			'users_status' => $status
		);
		$this->db->where('users_id', $user_id);
		return $this->db->update('users', $data);
		
	}
	
	
	
	}
	
	
	
	