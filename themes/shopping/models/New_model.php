<?php

class New_model extends CI_Model
{

	public function get_My_Profile()
	{
		$this->db->where('users_id', $this->session->userdata('user_id'));
		return $this->db->get('users')->row_array();
	}

	public function all_Products_For_Search()
	{
		$keyword = trim($this->input->get('q'));
		$this->db->like('posts_title', $keyword);
		$this->db->where('posts_type', 'product');
		$this->db->where('posts_status', '1');
		return $this->db->get('posts')->result_array();
	}

	public function search_Category($category)
	{
		$this->db->select('products_category_post as posts_id');
		$this->db->where('products_category_category', $category);
		return $this->db->get('products_category')->result_array();
	}

	public function search_Result($limit = FALSE, $offset = FALSE)
	{
		$id = [0];
		$words = [];
		$keyword = trim($this->input->get('q'));

		$min = trim($this->input->get('min'));
		$max = trim($this->input->get('max'));
		$length = trim($this->input->get('length'));
		$base_width = trim($this->input->get('base_width'));
		$leg_width = trim($this->input->get('leg_width'));
		$width = trim($this->input->get('width'));
		$height = trim($this->input->get('height'));
		$diameter = trim($this->input->get('diameter'));
		$external_diameter = trim($this->input->get('external_diameter'));
		$height = trim($this->input->get('leg_height'));
		$thickness = trim($this->input->get('thickness'));
		$size = trim($this->input->get('size'));
		$grade = trim($this->input->get('grade'));
		$surface = trim($this->input->get('surface_treatment'));
		$category = trim($this->input->get('category'));

		$keywords = explode(' ', $keyword);


		$this->db->where('posts_type', 'product');
		$this->db->where('posts_status', '1');
		$posts = $this->db->get('posts')->result_array();

		if ($category) {
			$posts = $this->search_Category($category);
			// var_dump($posts);
		}

		foreach ($posts as $post) {
			$id[] = $post['posts_id'];
		}
		// print_r($id);

		if ($keywords) {
			foreach ($keywords as $key) {
				if (!empty($key)) {
					$this->db->like('posts_title', $key);
					$this->db->where('posts_type', 'product');
					$this->db->where('posts_status', '1');
					$posts = $this->db->get('posts')->result_array();
					foreach ($posts as $post) {
						if (!in_array($post['posts_id'], $id)) {
							$id[] = $post['posts_id'];
						}
					}
					$count = strlen($key);
					if ($count > 3) {
						for ($i = 3; $i <= $count; $i++) {
							$words[] = substr($key, 0, $i);
						}
					}
				}
			}

			foreach ($words as $key) {
				if (!empty($key)) {
					$this->db->like('posts_title', $key);
					$this->db->where('posts_type', 'product');
					$this->db->where('posts_status', '1');
					$posts = $this->db->get('posts')->result_array();
					foreach ($posts as $post) {
						if (!in_array($post['posts_id'], $id)) {
							$id[] = $post['posts_id'];
						}
					}
				}
			}
		}
		// print_r($id);
		$this->db->where_in('posts_id', $id);


		if ($min || $max) {
			$this->db->where("(products_price BETWEEN '{$min}' AND '{$max}')");
		}

		if ($length) {
			$this->db->where('products_length', $length);
		}
		if ($base_width) {
			$this->db->where('products_base_width', $base_width);
		}
		if ($leg_width) {
			$this->db->where('products_leg_width', $leg_width);
		}
		if ($width) {
			$this->db->where('products_width', $width);
		}
		if ($diameter) {
			$this->db->where('products_diameter', $diameter);
		}
		if ($size) {
			$this->db->where('products_size', $size);
		}
		if ($external_diameter) {
			$this->db->where('products_external_diameter', $external_diameter);
		}
		if ($height) {
			$this->db->where('products_leg_height', $height);
		}
		if ($thickness) {
			$this->db->where('products_thickness', $thickness);
		}
		if ($grade) {
			$this->db->where('products_grade', $grade);
		}
		if ($surface) {
			$this->db->where('products_surface', $surface);
		}
		// if($category){
		// $this->db->where('products_category', $category);
		// }
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		if ($keyword) {
			$this->db->like('posts_title', $keyword);
		}
		$this->db->join('products', 'products_post = posts_id', 'left');
		return $this->db->get('posts')->result_array();
		echo $this->db->last_query();
	}

	public function save_Orders($carts, $order)
	{
		$vendors = [];
		$cart_User = [];
		$this_Cart_Total = 0;
		foreach ($carts as $cart) {
			if (!in_array($cart['posts_author'], $vendors)) {
				$vendors[] = $cart['posts_author'];
			}
		}
		$discount = (($order['orders_discount'] > 0) ? (round($order['orders_discount'] / count($vendors), 2)) : 0);
		$shipping = (($order['orders_shipping_amount'] > 0) ? (round($order['orders_shipping_amount'] / count($vendors), 2)) : 0);
		if ($vendors) {
			foreach ($vendors as $vendor) {
				$this->db->insert('orders', [
					'orders_user' => $this->session->userdata('user_id'),
					'orders_seller' => $vendor,
					'orders_address' => $order['orders_address'],
					'orders_total' => $order['orders_total'],
					'orders_coupon' => $order['orders_coupon'],
					'orders_discount' => $discount,
					'orders_shipping' => $order['orders_shipping'],
					'orders_shipping_amount' => $shipping,
					'orders_final_amount' => $order['orders_final_amount'],
					'orders_payment_method' => $order['orders_payment_method'],
					'orders_payment_status' => $order['orders_payment_status'],
					'orders_type' => $order['orders_type'],
					'orders_status' => 0,
					'orders_created_on' => now(),
				]);
				$order_id = $this->db->insert_id();

				foreach ($carts as $cart) {
					if ($cart['posts_author'] == $vendor) {
						$this_Cart_Total = $this_Cart_Total + ($cart['products_price'] * $cart['carts_quantity']);
						$this->db->insert('order_products', [
							'order_products_order' => $order_id,
							'order_products_post' => $cart['carts_product'],
							'order_products_quantity' => $cart['carts_quantity'],
							'order_products_price' => $cart['products_price'],
							'order_products_total' => $cart['products_price'] * $cart['carts_quantity'],
						]);
					}
				}

				foreach ($carts as $cart) {
					$this->db->where('carts_id', $cart['carts_id']);
					$this->db->delete('carts');
				}

				$this->db->where('orders_id', $order_id);
				$this->db->update('orders', [
					'orders_total' => $this_Cart_Total,
					'orders_final_amount' => (($this_Cart_Total - $discount) + $shipping),
				]);
			}
		}
	}

	public function recent_History($post)
	{
		$user_ses = get_cookie('users_local_session');
		$user = $this->session->userdata('user_id');
		if ($user) {
			$recents = $this->db->where('history_post', $post)->where("history_user", $user)->get('recent_history')->num_rows();
		} else {
			$recents = $this->db->where('history_post', $post)->where("(history_user='{$user}' OR history_cookie='{$user_ses}')")->get('recent_history')->num_rows();
		}
		if ($recents < 1) {
			$this->db->insert('recent_history', [
				'history_cookie' => $user_ses,
				'history_user' => $user,
				'history_post' => $post
			]);
		}
	}

	public function get_Recent_History($limit = FALSE)
	{
		$user_ses = get_cookie('users_local_session');
		$user = $this->session->userdata('user_id');
		if ($limit) {
			$this->db->limit($limit);
		}
		$this->db->where("(history_user='{$user}' OR history_cookie='{$user_ses}')");
		$this->db->join('posts', 'posts_id = history_post', 'left');
		$this->db->join('products', 'posts_id = products_post', 'left');
		return $this->db->get('recent_history')->result_array();
	}

	public function get_Brands()
	{
		return $this->db->get('brands')->result_array();
	}

	public function get_My_Order()
	{
		$data = [];
		$orders_New = [];
		$user = $this->session->userdata('user_id');
		$this->db->where('orders_user', $user);
		$this->db->order_by('orders_id', 'desc');
		$this->db->join('users', 'users_id = orders_user', 'left');
		$this->db->join('address', 'address_id = users_address', 'left');
		$this->db->join('coupons', 'coupons_id = orders_coupon', 'left');
		$this->db->join('user_address', 'user_address_user = users_id', 'left');
		$orders = $this->db->get('orders')->result_array();
		if ($orders) {
			foreach ($orders as $order) {
				$this->db->where('order_products_order', $order['orders_id']);
				$this->db->join('posts', 'posts_id = order_products_post', 'left');
				$this->db->join('products', 'posts_id = products_post', 'left');
				$this->db->join('users', 'users_id = posts_author', 'left');
				$products = $this->db->get('order_products')->result_array();

				foreach ($products as $product) {
					$this->db->where('return_orders_order', $order['orders_id']);
					$this->db->where('return_orders_product', $product['order_products_id']);
					$product['return'] = $this->db->get('return_orders')->row_array();
					$this->db->where('comments_user', $user);
					$this->db->where('comments_post', $product['order_products_id']);
					$product['review'] = $this->db->get('comments')->num_rows();
					$order['products'][] = $product;
				}

				$orders_New[] = $order;
			}
		}
		// print_r($orders_New);
		return $orders_New;
	}

	public function validate_Order($id, $user)
	{
		$this->db->where('orders_id', $id);
		$this->db->where('orders_user', $user);
		return $this->db->get('orders')->num_rows();
	}

	public function save_Feedback($id, $user)
	{
		$this->db->insert('order_feedback', [
			'order_feedback_order' => $id,
			'order_feedback_user' => $user,
			'order_feedback_message' => $this->input->post('feedback'),
			'order_feedback_status' => 0,
			'order_feedback_created' => now(),
		]);
	}

	public function change_Password($password)
	{
		$this->db->where('users_id', $this->session->userdata('user_id'));
		$user = $this->db->get('users')->row_array();
		if (password_verify($password, $user['users_password'])) {
			$this->db->where('users_id', $this->session->userdata('user_id'));
			$this->db->update('users', [
				'users_password' => $password
			]);
			return 1;
		} else {
			return 0;
		}
	}

	public function change_Profile()
	{
		$user = $this->session->userdata('user_id');
		$this->db->where('users_id', $user);
		$this->db->update('users', [
			'users_first_name' => $this->input->post('fname'),
			'users_last_name' => $this->input->post('lname'),
			'users_mobile' => $this->input->post('mobile'),
		]);
		return 1;
	}

	public function get_User_By_Token($token)
	{
		$this->db->where('users_password', $token);
		$user = $this->db->get('users');
		if ($user->num_rows() > 0) {
			return $user->row()->users_id;
		}
	}
}
