<?php

	class Advertise_model extends CI_Model{

		public function get_My_Product(){
			$this->db->select('*');
			$this->db->from('posts');
			$this->db->where('posts_type', 'product');
			$this->db->where('posts_status', '1');
			$this->db->where('posts_author', $this->session->userdata('user_id'));
			$this->db->join('products', 'posts_id = products_post', 'left');
			// $this->db->join('categories', 'categories_id = products_categories', 'left');
			$this->db->join('users', 'users_id = posts_author', 'left');
			return $this->db->get()->result_array();
		}

		public function insert_Advertise(){
			$user = $this->session->userdata('user_id');
			$data = array(
				'ads_user' => $user,
				'ads_title' => $this->input->post('campaign_name'),
				'ads_product' => $this->input->post('product'),
				'ads_day' => $this->input->post('days'),
				'ads_amount' => $this->input->post('budget'),
				'ads_status' => '0',
				'ads_approved' => '0',
				'ads_created_on' => date('Y/m/d H:i:s')
			);
			$this->db->insert('ads', $data);
		}

		public function listingMyAds($id = FALSE){
			if($id){
				$this->db->where('posts_type', 'product');
				$this->db->where('ads_user', $this->session->userdata('user_id'));
				$this->db->where('ads_id', $id);
				$this->db->join('posts', 'posts_id = ads_product', 'left');
				$this->db->join('products', 'posts_id = products_post', 'left');
				$this->db->join('users', 'users_id = posts_author', 'left');
				return $this->db->get('ads')->row_array();
			}
			$this->db->where('posts_type', 'product');
			$this->db->where('ads_user', $this->session->userdata('user_id'));
			$this->db->join('posts', 'posts_id = ads_product', 'left');
			$this->db->join('products', 'posts_id = products_post', 'left');
			$this->db->join('users', 'users_id = posts_author', 'left');
			return $this->db->get('ads')->result_array();
		}
		
	
	}
	
	
	
	
	
	