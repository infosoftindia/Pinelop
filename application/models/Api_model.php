<?php

	class Api_model extends CI_Model{

		public function get_Category_Main(){
			// $data = [];
			// $cat = [];
			// $this->db->where('categories_parent', '0');
			// $categories = $this->db->get('categories')->result_array();
			// if($categories){
				// foreach($categories as $category){
					// $cat[] = $category;
					// $cat[] = $this->get_Category_By_Parent($category['categories_id']);
				// }
			// }
			// var_dump($cat);
		}

		public function get_Category_By_Parent($id){
			$this->db->where('categories_parent', $id);
			$categories = $this->db->get('categories')->result_array();
			if($categories){
				foreach($categories as $category){
					$cat[] = $this->get_Category_By_Parent($category['categories_id']);
				}
			}
		}

		public function get_All_Categories($page){
			$this->db->where('categories_parent', '0');
			// $this->db->limit(10, $page);
			$this->db->where('categories_type', 'product');
			return $this->db->get('categories')->result_array();
		}

		public function get_Categories_By_Slug($slug){
			$data = [];
			$this->db->where('categories_type', 'product');
			$this->db->where('categories_slug', $slug);
			return $category = $this->db->get('categories')->row_array();
			$this->db->where('cat_parent', $category['categories_id']);
			$metas = $this->db->get('categories_meta')->result_array();
			foreach($metas as $meta){
				$category[$meta['cat_key']] = $meta['cat_value'];
				$data[] = $category;
			}
			return $data;
		}
		
		public function get_Products_By_Categories_Slug($slug, $offset = FALSE){
			$data = [];
			$this->db->where('categories_type', 'product');
			$this->db->where('categories_slug', $slug);
			$category = $this->db->get('categories')->row_array();
			
			$this->db->where('posts_status', '1');
			$this->db->where('posts_type', 'product');
			$this->db->limit(10, $offset);
			$this->db->where('products_category_category', $category['categories_id']);
			$this->db->join('posts', 'products_category_post = posts_id', 'left');
			$this->db->join('products', 'products_post = posts_id', 'left');
			return $this->db->get('products_category')->result_array();
		}
		
		public function get_All_Products($page){
			$this->db->where('posts_status', '1');
			$this->db->where('posts_type', 'product');
			$this->db->limit(10, $page);
			$this->db->join('products', 'products_post = posts_id', 'left');
			return $this->db->get('posts')->result_array();
		}
		
		public function get_Products_By_Slug($slug){
			$attributeX = [];
			
			$this->db->where('posts_type', 'product');
			$this->db->where('posts_status', '1');
			$this->db->join('products', 'products_post = posts_id', 'left');
			$this->db->where('posts_slug', $slug);
			$post = $this->db->get('posts')->row_array();
			if($post){
				$this->db->where('products_category_post', $post['posts_id']);
				$this->db->join('categories', 'products_category_category = categories_id', 'left');
				$post['categories'] = $this->db->get('products_category')->result_array();
				
				$this->db->where('products_gallery_post', $post['posts_id']);
				$post['galleries'] = $this->db->get('products_gallery')->result_array();
				
				$this->db->where('comments_post', $post['posts_id']);
				$post['comments'] = $this->db->get('comments')->result_array();
				
				$this->db->where('product_similars_post', $post['posts_id']);
				$this->db->join('posts', 'posts_id = product_similars_similar', 'left');
				$this->db->join('products', 'products_post = posts_id', 'left');
				$post['similars'] = $this->db->get('product_similars')->result_array();
				
				$this->db->where('product_specification_post', $post['posts_id']);
				$post['specifications'] = $this->db->get('product_specification')->result_array();
				
				$this->db->where('product_attributes_post', $post['posts_id']);
				$attributes = $this->db->get('product_attributes')->result_array();
				foreach($attributes as $attribute){
					$this->db->where('product_variables_attribute', $attribute['product_attributes_id']);
					$attribute['variables'] = $this->db->get('product_variables')->result_array();
					$attributeX[] = $attribute;
				}
				$post['attributes'] = $attributeX;
				return $post;
			}else{
				return FALSE;
			}
		}
		
		public function add_To_Cart($product, $user, $quantity){
			$this->db->where('carts_user', $user);
			$this->db->where('carts_product', $product);
			$result = $this->db->get('carts');
			if($result->num_rows() > 0){
				$qty = ($result->row(0)->carts_quantity)+$quantity;
				$data = array(
					'carts_user' => $user,
					'carts_token' => '',
					'carts_product' => $product,
					'carts_quantity' => $qty
				);
				$this->db->where('carts_user', $user);
				$this->db->where('carts_product', $product);
				$this->db->update('carts', $data);
			}else{
				$data = array(
					'carts_user' => $user,
					'carts_token' => '',
					'carts_product' => $product,
					'carts_quantity' => $quantity,
					'carts_created' => now()
				);
				$this->db->insert('carts', $data);
			}
			return 1;
		}
		
		public function check_Login($email, $password){
			$this->db->where('users_email', $email);
			$user = $this->db->get('users')->row_array();
			if($user){
				if(password_verify($password, $user['users_password'])){
					if($user['users_status'] == '1'){
						return $user;
					} else {
						return 2;
					}
				} else {
					return 3;
				}
			} else {
				return 4;
			}
		}
		
		public function do_Register($f_Name, $l_Name, $email, $phone, $password){
			if($this->check_Email($email)){
				return 2;
			}
			if($this->check_Mobile($phone)){
				return 3;
			}
			if(strlen($password) < 6){
				return 4;
			}
			$this->db->insert('users', [
				'users_first_name'		=> $f_Name,
				'users_last_name'		=> $l_Name,
				'users_email'			=> $email,
				'users_mobile'			=> $phone,
				'users_password'		=> password_hash($password, PASSWORD_DEFAULT),
				'users_role'			=> '1',
				'users_status'			=> '1',
				'users_created'			=> now()
			]);
			return 1;
		}
		
		public function check_Email($email){
			$this->db->where('users_email', $email);
			return $this->db->get('users')->num_rows();
		}
		
		public function check_Mobile($phone){
			$this->db->where('users_mobile', $phone);
			return $this->db->get('users')->num_rows();
		}
		
		public function get_Cart($user){
			$this->db->where('carts_user', $user);
			$this->db->join('posts', 'posts_id = carts_product', 'left');
			$this->db->join('products', 'posts_id = products_post', 'left');
			$result = $this->db->get('carts');
			return $result->result_array();
		}
		
		public function remove_Cart($id, $user){
			$this->db->where('carts_id', $id);
			$this->db->where('carts_user', $user);
			return $this->db->delete('carts');
		}
		
		public function update_Cart($id, $user, $quantity){
			$this->db->where('carts_id', $id);
			$this->db->where('carts_user', $user);
			$this->db->update('carts', [
				'carts_quantity' => $quantity
			]);
		}
		
		public function update_Cart_Array(){
			$cart = $this->input->post('cart');
			$quantity = $this->input->post('quantity');
			if(count($cart) > 0){
				for($i = 0; $i < count($cart); $i++){
					$this->db->where('carts_id', $cart[$i]);
					$this->db->update('carts', [
						'carts_quantity' => $quantity[$i]
					]);
				}
				return 1;
			} else {
				return 0;
			}
		}
		
		public function contact($name, $email, $subject, $phone, $message, $option1){
			$this->db->insert('contacts', [
				'contacts_name' => $name,
				'contacts_email' => $email,
				'contacts_phone' => $phone,
				'contacts_opt1' => $subject,
				'contacts_opt2' => $option1,
				'contacts_message' => $message,
				'contacts_status' => 0,
				'contacts_created' => now()
			]);
			return $this->db->insert_id();
		}
		
		public function checkout(){
			$f_Name = $this->input->post('fname');
			$l_Name = $this->input->post('lname');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');

			$this->db->insert('contacts', [
				'contacts_name' => $f_Name.' '.$l_Name,
				'contacts_email' => $email,
				'contacts_phone' => $phone,
				'contacts_opt1' => $subject,
				'contacts_message' => $message,
				'contacts_status' => 0,
				'contacts_created' => now()
			]);
			return $this->db->insert_id();
		}
		
		public function get_User_Address(){
			$user = $this->session->userdata('user_id');
			$this->db->where('user_address_user', $user);
			$this->db->join('address', 'user_address_address = address_id', 'left');
			return $this->db->get('user_address')->result_array();
		}
		
		public function save_Address(){
			$this->db->insert('address', [
				'address_line1' => $this->input->post('country'),
				'address_line2' => $this->input->post('state'),
				'address_line3' => $this->input->post('city'),
				'address_line4' => $this->input->post('pin'),
				'address_line5' => $this->input->post('address'),
				'address_line6' => $this->input->post('additional'),
			]);
			$address = $this->db->insert_id();
			$this->db->insert('user_address', [
				'user_address_address' => $address,
				'user_address_user' => $this->session->userdata('user_id'),
				'user_address_fname' => $this->input->post('fname'),
				'user_address_lname' => $this->input->post('lname'),
				'user_address_company' => $this->input->post('company'),
				'user_address_email' => $this->input->post('email'),
				'user_address_phone' => $this->input->post('phone')
			]);
			return $this->db->insert_id();
		}
		
		public function COD_Payment($address){
			$this->db->insert('address', [
				'address_line1' => $this->input->post('country'),
				'address_line2' => $this->input->post('state'),
				'address_line3' => $this->input->post('city'),
				'address_line4' => $this->input->post('pin'),
				'address_line5' => $this->input->post('address'),
				'address_line6' => $this->input->post('additional'),
			]);
			$address = $this->db->insert_id();

			$this->db->insert('user_address', [
				'user_address_address' => $address,
				'user_address_user' => $this->session->userdata('user_id'),
				'user_address_fname' => $this->input->post('fname'),
				'user_address_lname' => $this->input->post('lname'),
				'user_address_company' => $this->input->post('company'),
				'user_address_email' => $this->input->post('email'),
				'user_address_phone' => $this->input->post('phone')
			]);
			return $this->db->insert_id();
		}
		
		public function save_Comment($post){
			$this->db->insert('comments', [
				'comments_post' => $post,
				'comments_user' => $this->session->userdata('user_id'),
				'comments_name' => $this->input->post('name'),
				'comments_email' => $this->input->post('email'),
				'comments_message' => $this->input->post('message'),
				'comments_status' => getenv('AutoApproveComment'),
				'comments_created' => now()
			]);
			return $this->db->insert_id();
		}
		
		public function grid_Product($id){
			$data["product"] = $this->Basic_model->singlePost($id, 'products');
			return $this->load->view("partials/product", $data, true);
		}
		
		public function widget_Product($id){
			$data["product"] = $this->Basic_model->singlePost($id, 'products');
			return $this->load->view("partials/product-widget", $data, true);
		}
		
		public function get_Daily_Deals($limit = FALSE, $offset = FALSE){
			$data = [];
			$this->db->where('posts_status', '1');
			$this->db->where('posts_type', 'product');
			if($limit){
				$this->db->limit($limit, $offset);
			}
			$this->db->join('posts', 'products_daily_deals_post = posts_id', 'left');
			$this->db->join('products', 'products_post = posts_id', 'left');
			return $this->db->get('products_daily_deals')->result_array();
		}
		
		public function get_Trending_Categories($limit = FALSE, $offset = FALSE){
			$data = [];
			$this->db->where('categories_status', '1');
			$this->db->where('categories_type', 'product');
			if($limit){
				$this->db->limit($limit, $offset);
			}
			$this->db->join('categories', 'products_trending_categories_cat = categories_id', 'left');
			return $this->db->get('products_trending_categories')->result_array();
		}
		
		public function get_Best_Offers($limit = FALSE, $offset = FALSE){
			$data = [];
			$this->db->where('products_best_offers_status', '1');
			if($limit){
				$this->db->limit($limit, $offset);
			}
			return $this->db->get('products_best_offers')->result_array();
		}
		
		public function get_Best_Offers_Products($id, $limit = FALSE, $offset = FALSE){
			$data = [];
			$this->db->where('products_best_offers_status', '1');
			$this->db->where('best_offer_products_offer', $id);
			if($limit){
				$this->db->limit($limit, $offset);
			}
			$this->db->join('products_best_offers', 'products_best_offers_id = best_offer_products_offer', 'left');
			$this->db->join('posts', 'best_offer_products_post = posts_id', 'left');
			$this->db->join('products', 'products_post = posts_id', 'left');
			return $this->db->get('best_offer_products')->result_array();
		}
		
		public function get_Sliders(){
			$this->db->where('sliders_status', '1');
			$this->db->order_by('sliders_sort');
			$this->db->join('categories', 'categories_id = sliders_category', 'left');
			return $this->db->get('sliders')->result_array();
		}
		
		public function get_Featured_Products($limit = FALSE, $offset = FALSE){
			$this->db->where('posts_status', '1');
			$this->db->where('products_featured', '1');
			$this->db->where('posts_type', 'product');
			if($limit){
				$this->db->limit($limit, $offset);
			}
			$this->db->join('products', 'products_post = posts_id', 'left');
			return $this->db->get('posts')->result_array();
		}
		
		public function delete_Address($id){
			$this->db->where('user_address_id', $id);
			$user_Address = $this->db->get('user_address')->row();
			$this->db->where('address_id', $user_Address->user_address_address);
			$this->db->delete('address');
			$this->db->where('user_address_id', $id);
			return $this->db->delete('user_address');
		}

		public function get_User_Saved_Cards(){
			$user = $this->session->userdata('user_id');
			$this->db->where('user_cards_user', $user);
			return $this->db->get('user_cards')->result_array();
		}

		public function save_Card(){
			$user = $this->session->userdata('user_id');
			$this->db->insert('user_cards', [
				'user_cards_user' => $user,
				'user_cards_name' => $this->input->post('_card_name'),
				'user_cards_number' => $this->input->post('_card_num'),
				'user_cards_expire_month' => $this->input->post('_date_month'),
				'user_cards_expire_year' => $this->input->post('_date_year'),
				'user_cards_created' => now()
			]);
			return $this->db->insert_id();
		}

		public function get_Address_By_ID($id){
			$this->db->where('user_address_id', $id);
			$this->db->join('address', 'user_address_address = address_id', 'left');
			return $this->db->get('user_address')->row_array();
		}

		public function get_Card_By_ID($id){
			$this->db->where('user_cards_id', $id);
			return $this->db->get('user_cards')->row_array();
		}

		public function get_Home_Offers($limit, $position){
			$this->db->limit($limit);
			$this->db->order_by('rand()');
			$this->db->where('home_offers_position', $position);
			$this->db->join('posts', 'home_offers_product = posts_id', 'left');
			$this->db->join('categories', 'home_offers_category = categories_id', 'left');
			return $this->db->get('home_offers')->result_array();
		}
		
		public function get_Wishlist($user){
			$this->db->where('wishlists_user', $user);
			$this->db->join('posts', 'posts_id = wishlists_post', 'left');
			$this->db->join('products', 'posts_id = products_post', 'left');
			return $this->db->get('wishlists')->result_array();
		}
		
		public function add_To_Cart_Wishlist($product, $id){
			$user = $this->session->userdata('user_id');
			$quantity = $this->input->post('quantity');
			$user_ses = get_cookie('users_local_session');
			if (is_null($user)) {
				$user = '0';
			}
			
			$this->db->where('carts_token', $user_ses);
			$this->db->where('carts_product', $product);
			$result = $this->db->get('carts');
			if($result->num_rows() > 0){
				$qty = ($result->row(0)->carts_quantity)+$quantity;
				$data = array(
					'carts_user' => $user,
					'carts_token' => $user_ses,
					'carts_product' => $product,
					'carts_quantity' => $qty
				);
				$this->db->where('carts_token', $user_ses);
				$this->db->where('carts_product', $product);
				$this->db->update('carts', $data);
			}else{
				$data = array(
					'carts_user' => $user,
					'carts_token' => $user_ses,
					'carts_product' => $product,
					'carts_quantity' => $quantity,
					'carts_created' => now()
				);
				$this->db->insert('carts', $data);
			}
			$this->remove_Wishlist($id);
		}
		
		public function add_To_Wishlist($product, $user){
			$this->db->where('wishlists_user', $user);
			$this->db->where('wishlists_post', $product);
			$result = $this->db->get('carts');
			if($result->num_rows() == 0){
				$data = array(
					'wishlists_user' => $user,
					'wishlists_post' => $product,
					'wishlists_created' => now()
				);
				$this->db->insert('wishlists', $data);
			}
			return 1;
		}
		
		public function remove_Wishlist($id, $user){
			$this->db->where('wishlists_id', $id);
			return $this->db->delete('wishlists');
		}
		
		public function set_User_Cookie($user_id, $session){
			$data = array(
				'carts_user' => $user_id
			);
			$this->db->where('carts_token', $session);
			$this->db->update('carts', $data);

			$data1 = array(
				'history_user' => $user_id
			);
			$this->db->where('history_cookie', $session);
			$this->db->update('recent_history', $data1);
		}
		
		public function get_My_Profile(){
			$this->db->where('users_id', $this->session->userdata('user_id'));
			return $this->db->get('users')->row_array();
		}
		
		public function all_Products_For_Search($keyword){
			$this->db->select('posts_title');
			$this->db->like('posts_title', $keyword);
			$this->db->where('posts_type', 'product');
			$this->db->where('posts_status', '1');
			return $this->db->get('posts')->result_array();
		}
		
		public function search_Result($keyword){
			$id = [0];
			$words = [];
			
			$keywords = explode(' ', $keyword);
			
			$this->db->like('posts_title', $keyword);
			$this->db->where('posts_type', 'product');
			$this->db->where('posts_status', '1');
			$posts = $this->db->get('posts')->result_array();
			
			foreach($posts as $post){
				$id[] = $post['posts_id'];
			}

			foreach($keywords as $key){
				if(!empty($key)) {
					$this->db->like('posts_title', $key);
					$this->db->where('posts_type', 'product');
					$this->db->where('posts_status', '1');
					$posts = $this->db->get('posts')->result_array();
					foreach($posts as $post){
						if(!in_array($post['posts_id'], $id)){
							$id[] = $post['posts_id'];
						}
					}
					$count = strlen($key);
					if($count > 3){
						for($i=3; $i<=$count; $i++){
							$words[] = substr($key, 0, $i);
						}
					}
				}
			}

			foreach($words as $key){
				if(!empty($key)) {
					$this->db->like('posts_title', $key);
					$this->db->where('posts_type', 'product');
					$this->db->where('posts_status', '1');
					$posts = $this->db->get('posts')->result_array();
					foreach($posts as $post){
						if(!in_array($post['posts_id'], $id)){
							$id[] = $post['posts_id'];
						}
					}
				}
			}
			$this->db->where_in('posts_id', $id);
			$this->db->join('products', 'posts_id = products_post', 'left');
			return $this->db->get('posts')->result_array();
			
		}
		
		public function save_Orders($carts, $order){
			$vendors = [];
			$cart_User = [];
			$this_Cart_Total = 0;
			foreach($carts as $cart){
				if(!in_array($cart['posts_author'], $vendors)){
					$vendors[] = $cart['posts_author'];
				}
			}
			$discount = (($order['orders_discount'] > 0)?(round($order['orders_discount']/$vendors, 2)):0);
			$shipping = (($order['orders_shipping_amount'] > 0)?(round($order['orders_shipping_amount']/$vendors, 2)):0);
			if($vendors){
				foreach($vendors as $vendor){
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

					foreach($carts as $cart){
						if($cart['posts_author'] == $vendor){
							$this_Cart_Total = $this_Cart_Total+($cart['products_price']*$cart['carts_quantity']);
							$this->db->insert('order_products', [
								'order_products_order' => $order_id,
								'order_products_post' => $cart['carts_product'],
								'order_products_quantity' => $cart['carts_quantity'],
								'order_products_price' => $cart['products_price'],
								'order_products_total' => $cart['products_price']*$cart['carts_quantity'],
							]);
						}
					}
					
					foreach($carts as $cart){
						$this->db->where('carts_id', $cart['carts_id']);
						$this->db->delete('carts');
					}
					
					$this->db->where('orders_id', $order_id);
					$this->db->update('orders', [
						'orders_total' => $this_Cart_Total,
						'orders_final_amount' => (($this_Cart_Total-$discount)+$shipping),
					]);
				}
			}
		}

		public function recent_History($post){
			$user_ses = get_cookie('users_local_session');
			$user = $this->session->userdata('user_id');
			if($user){
				$recents = $this->db->where('history_post', $post)->where("history_user", $user)->get('recent_history')->num_rows();
			}else{
				$recents = $this->db->where('history_post', $post)->where("(history_user='{$user}' OR history_cookie='{$user_ses}')")->get('recent_history')->num_rows();
			}
			if($recents < 1){
				$this->db->insert('recent_history', [
					'history_cookie' => $user_ses,
					'history_user' => $user,
					'history_post' => $post
				]);
			}
		}

		public function get_Recent_History($limit = FALSE){
			$user_ses = get_cookie('users_local_session');
			$user = $this->session->userdata('user_id');
			if($limit){
				$this->db->limit($limit);
			}
			$this->db->where("(history_user='{$user}' OR history_cookie='{$user_ses}')");
			$this->db->join('posts', 'posts_id = history_post', 'left');
			$this->db->join('products', 'posts_id = products_post', 'left');
			return $this->db->get('recent_history')->result_array();
		}

		public function get_Brands(){
			return $this->db->get('brands')->result_array();
		}

		public function get_My_Order(){
			$data = [];
			$orders_New = [];
			$user = $this->session->userdata('user_id');
			$this->db->where('orders_user', $user);
			$this->db->join('users', 'users_id = orders_user', 'left');
			$this->db->join('address', 'address_id = users_address', 'left');
			$this->db->join('coupons', 'coupons_id = orders_coupon', 'left');
			$this->db->join('orders_address', 'orders_address = orders_address_id', 'left');
			$orders = $this->db->get('orders')->result_array();
			if($orders){
				foreach($orders as $order){
					$this->db->where('order_products_order', $order['orders_id']);
					$this->db->join('posts', 'posts_id = order_products_post', 'left');
					$this->db->join('products', 'posts_id = products_post', 'left');
					$this->db->join('users', 'users_id = posts_author', 'left');
					$products = $this->db->get('order_products')->result_array();
					
					foreach($products as $product){
						$this->db->where('return_orders_order', $order['orders_id']);
						$this->db->where('return_orders_product', $product['order_products_id']);
						$product['return'] = $this->db->get('return_orders')->row_array();
						$order['products'][] = $product;
					}
					$orders_New[] = $order;
				}
			}
			// print_r($orders_New);
			return $orders_New;
		}

		public function validate_Order($id, $user){
			$this->db->where('orders_id', $id);
			$this->db->where('orders_user', $user);
			return $this->db->get('orders')->num_rows();
		}

		public function save_Feedback($id, $user){
			$this->db->insert('order_feedback', [
				'order_feedback_order' => $id,
				'order_feedback_user' => $user,
				'order_feedback_message' => $this->input->post('feedback'),
				'order_feedback_status' => 0,
				'order_feedback_created' => now(),
			]);
		}
		
		public function change_Password($password){
			$this->db->where('users_id', $this->session->userdata('user_id'));
			$user = $this->db->get('users')->row_array();
			if(password_verify($password, $user['users_password'])){
				$this->db->where('users_id', $this->session->userdata('user_id'));
				$this->db->update('users', [
					'users_password' => $password
				]);
				return 1;
			} else {
				return 0;
			}
		}
		
		public function change_Profile(){
			$user = $this->session->userdata('user_id');
			$this->db->where('users_id', $user);
			$this->db->update('users', [
				'users_first_name' => $this->input->post('fname'),
				'users_last_name' => $this->input->post('lname'),
				'users_mobile' => $this->input->post('mobile'),
			]);
			return 1;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	