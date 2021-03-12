<?php

class Users_model extends CI_Model{
	
	public function insert_User(){
		$data = array(
			'users_first_name' => $this->input->post('fname'),
			'users_last_name' => $this->input->post('lname'),
			'users_email' => $this->input->post('email'),
			'users_password' => $this->input->post('password'),
			'users_mobile' => $this->input->post('phone'),
			'users_role' => $this->input->post('role'),
			'users_status' => $this->input->post('status'),
			'users_created' => now(),
		);
		$this->db->insert('users', $data);
	}
	
	public function all_User($id = FALSE){
		if($id){
			$this->db->where('users_id', $id);
			return $this->db->get('users')->row_array();
		}
		$this->db->where('(users_status = 1 OR users_status = 0)');
		$this->db->order_by('users_id', 'DESC');
		return $this->db->get('users')->result_array();
	}
	
	public function changeStatus($user_id, $status){
		$data = array(
			'users_status' => $status
		);
		$this->db->where('users_id', $user_id);
		return $this->db->update('users', $data);
		
	}
	
	
	
	
}