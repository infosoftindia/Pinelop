<?php
	class Orders_model extends CI_Model{
		
		/*
			# 0: Order Pending (New Order)
			# 1: Order Completed
			# 2: Order Processing
			# 3: Dispatched
			# 4: Out for Delivery
			# 99: Reject
		*/
		
		public function view_Orders($id){
			$data = [];
			$this->db->where('orders_id', $id);
			if($this->session->userdata('user_role') == 2){
				$this->db->where('orders_seller', $this->session->userdata('user_id'));
			}
			$this->db->join('users', 'users_id = orders_user', 'left');
			$this->db->join('address', 'address_id = users_address', 'left');
			$this->db->join('coupons', 'coupons_id = orders_coupon', 'left');
			$this->db->join('orders_address', 'orders_address = orders_address_id', 'left');
			$order = $this->db->get('orders')->row_array();
			
			$this->db->where('order_products_order', $id);
			$this->db->join('posts', 'posts_id = order_products_post', 'left');
			$this->db->join('products', 'posts_id = products_post', 'left');
			$products = $this->db->get('order_products')->result_array();
			
			foreach($products as $product){
				$this->db->where('return_orders_order', $id);
				$this->db->where('return_orders_product', $product['order_products_id']);
				$product['return'] = $this->db->get('return_orders')->row_array();
				// $data[] = $product;
				
				$this->db->where('order_attributes_product', $product['order_products_id']);
				$this->db->join('product_attributes', 'product_attributes_id = order_attributes_attrubute', 'left');
				$product['attributes'] = $this->db->get('order_attributes')->result_array();
				$data[] = $product;
			}
			
			
			$order['products'] = $data;
			return $order;
		}
		
		public function all_Orders(){
			if($this->session->userdata('user_role') == 2){
				$this->db->where('orders_seller', $this->session->userdata('user_id'));
			}
			$this->db->where('orders_payment_status<>', '0');
			$this->db->join('users', 'users_id = orders_user', 'left');
			$this->db->join('address', 'address_id = orders_address', 'left');
			$this->db->join('coupons', 'coupons_id = orders_coupon', 'left');
			return $this->db->get('orders')->result_array();
		}
		
		public function pending_Orders(){
			if($this->session->userdata('user_role') == 2){
				$this->db->where('orders_seller', $this->session->userdata('user_id'));
			}
			$this->db->where('orders_status', '0');
			$this->db->where('orders_payment_status<>', '0');
			$this->db->join('users', 'users_id = orders_user', 'left');
			$this->db->join('address', 'address_id = orders_address', 'left');
			$this->db->join('coupons', 'coupons_id = orders_coupon', 'left');
			return $this->db->get('orders')->result_array();
		}
		
		public function update_Status($id, $value){
			$this->db->where('orders_id', $id);
			if($this->session->userdata('user_role') == 2){
				$this->db->where('orders_seller', $this->session->userdata('user_id'));
			}
			return $this->db->update('orders', ['orders_status'=>$value]);
		}
		
		public function reject_Order($id){
			$reason = $this->input->post('reason');
			$this->db->where('orders_id', $id);
			if($this->session->userdata('user_role') == 2){
				$this->db->where('orders_seller', $this->session->userdata('user_id'));
			}
			return $this->db->update('orders', ['orders_status'=>'99', 'orders_reason'=>$reason]);
		}
		
		public function open_Return_Thread($id, $order){
			$products = $this->input->post('products');
			if($products){
				$this->db->insert('address', [
					'address_line1' => 'India',
					'address_line2' => $this->input->post('state'),
					'address_line3' => $this->input->post('city'),
					'address_line4' => $this->input->post('pin'),
					'address_line5' => $this->input->post('address'),
					'address_line6' => $this->input->post('additional'),
				]);
				$address = $this->db->insert_id();

				foreach($products as $product){
					$this->db->insert('return_orders',[
						'return_orders_user' => $this->session->userdata('user_id'),
						'return_orders_order' => $id,
						'return_orders_product' => $product,
						'return_orders_reason' => $this->input->post('reason'),
						'return_orders_address' => $address,
						'return_orders_seller' => $order['orders_seller'],
						'return_orders_status' => 0,
						'return_orders_created' => now(),
					]);
				}
			}
		}
	}