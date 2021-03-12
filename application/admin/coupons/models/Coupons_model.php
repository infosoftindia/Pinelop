<?php

class Coupons_model extends CI_Model{

	public function all_Coupons($id = FALSE){
		if($id){
			$this->db->where('coupons_id', $id);
			return $this->db->get('coupons')->row_array();
		}
		$this->db->where('coupons_status<>', '111');
		$this->db->order_by('coupons_id', 'DESC');
		return $this->db->get('coupons')->result_array();
	}

	public function get_Coupons($code){
		$this->db->where('coupons_code', $code);
		return $this->db->get('coupons')->row_array();
	}

	public function insert_Coupon(){
		$data = array(
			'coupons_name' => $this->input->post('name'),
			'coupons_code' => $this->input->post('code'),
			'coupons_type' => $this->input->post('type'),
			'coupons_amount' => $this->input->post('amount'),
			'coupons_max_usage' => $this->input->post('max_usage'),
			'coupons_min_order' => $this->input->post('min_order'),
			'coupons_max_discount' => $this->input->post('discount'),
			'coupons_status' => $this->input->post('status'),
			'coupons_created' => now(),
		);
		$this->db->insert('coupons', $data);
	}

	public function update_Coupon($id){
		$data = array(
			'coupons_name' => $this->input->post('name'),
			'coupons_code' => $this->input->post('code'),
			'coupons_type' => $this->input->post('type'),
			'coupons_amount' => $this->input->post('amount'),
			'coupons_max_usage' => $this->input->post('max_usage'),
			'coupons_min_order' => $this->input->post('min_order'),
			'coupons_max_discount' => $this->input->post('discount'),
			'coupons_status' => $this->input->post('status'),
		);
		$this->db->where('coupons_id', $id);
		$this->db->update('coupons', $data);
	}

	public function get_Cart(){
		$user_ses = get_cookie('users_local_session');
		$user = $this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->from('carts');
		if (!is_null($user)) {
			$this->db->where('carts_token = "'.$user_ses.'" OR carts_user = "'.$user.'"');
		}else{
			$this->db->where('carts_token', $user_ses);
		}
		$this->db->join('posts', 'posts_id = carts_product', 'left');
		$this->db->join('products', 'posts_id = products_post', 'left');
		$result = $this->db->get();
		return $result->result_array();
	}

	
	
	
}