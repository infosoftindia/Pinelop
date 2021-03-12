<?php

class Sales_model extends CI_Model{
		
	public function listing($id = FALSE){
		if($id){
			$this->db->select('*');
			$this->db->from('orders');
			$this->db->where('orders_id', $id);
			$this->db->where('orders_seller', $this->session->userdata('user_id'));
			$this->db->join('coupons','orders_coupon = coupons_id','left');
			$this->db->join('users', 'users_id = orders_user', 'left');
			return $this->db->get()->row_array();
		}
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->where('orders_seller', $this->session->userdata('user_id'));
		$this->db->join('coupons','orders_coupon = coupons_id','left');
		$this->db->join('users', 'users_id = orders_user', 'left');
		return $this->db->get()->result_array();
	}
		
	public function listing_product($id){
		$this->db->select('*');
		$this->db->from('order_products');
		$this->db->where('order_products_order', $id);
		return $this->db->get()->result_array();
	}

	public function monthly_Sale($month, $year){
		$sales = $this->listing();
		$monthly_Sales = [];
		foreach($sales as $sale){
			if(date('m', strtotime($sale['orders_created_on'])) == $month && date('Y', strtotime($sale['orders_created_on'])) == $year)
				$monthly_Sales[] = $sale;
		}
		$data = [];
		$days = month($year, $month);
		foreach($days as $day){
			foreach($monthly_Sales as $monthly_Sale){
				if("'".date('Y-m-d', strtotime($monthly_Sale['orders_created_on']))."'" == $day)
					$data[date('Y-m-d', strtotime($monthly_Sale['orders_created_on']))][] = $monthly_Sale;
			}
		}
		return $data;
	}

	public function yearly_Sale($year){
		$sales = $this->listing();
		$monthly_Sales = [];
		foreach($sales as $sale){
			if(date('Y', strtotime($sale['orders_created_on'])) == $year)
				$monthly_Sales[] = $sale;
		}
		$data = [];
		for($i=1; $i<=12; $i++){
			foreach($monthly_Sales as $monthly_Sale){
				if(date('m', strtotime($monthly_Sale['orders_created_on'])) == str_pad($i, 2, '0', STR_PAD_LEFT))
					$data[date('m', strtotime($monthly_Sale['orders_created_on']))][] = $monthly_Sale;
			}
		}
		return $data;
	}

	public function yearly_Sale_Products($year){
		$stock = 0;
		$sale_Count = 0;

		$this->db->where('posts_type', 'product');
		$this->db->where('posts_author', $this->session->userdata('user_id'));
		$this->db->join('products', 'products_post = posts_id', 'left');
		$this->db->join('categories', 'products_category = categories_id', 'left');
		$this->db->order_by('posts_id', 'DESC');
		$posts = $this->db->get('posts')->result_array();

		foreach($posts as $post){
			$stock+=$post['products_stock'];
		}
		$sales = $this->listing();
		foreach($sales as $sale){
			$products = $this->listing_product($sale['orders_id']);
			foreach($products as $product){
				$sale_Count+=$product['order_products_quantity'];
			}
		}
		return array(
			'stock' => $stock,
			'sales' => $sale_Count,
		);
	}
}

























