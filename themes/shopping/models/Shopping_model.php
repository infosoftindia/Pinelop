<?php

class Shopping_model extends CI_Model
{

	public function get_Category_Main()
	{
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

	public function get_Category_By_Parent($id)
	{
		$this->db->where('categories_parent', $id);
		$categories = $this->db->get('categories')->result_array();
		if ($categories) {
			foreach ($categories as $category) {
				$cat[] = $this->get_Category_By_Parent($category['categories_id']);
			}
		}
	}

	public function get_Categories_By_Surface($id, $limit = FALSE, $offset = FALSE)
	{
		$this->db->like('categories_parent', $id);
		$this->db->order_by('categories_id', 'ASC');
		return $this->db->get('categories')->result_array();
	}

	public function get_Categories_By_Slug($slug)
	{
		$data = [];
		$this->db->where('categories_type', 'product');
		$this->db->where('categories_slug', $slug);
		return $category = $this->db->get('categories')->row_array();
		$this->db->where('cat_parent', $category['categories_id']);
		$metas = $this->db->get('categories_meta')->result_array();
		foreach ($metas as $meta) {
			$category[$meta['cat_key']] = $meta['cat_value'];
			$data[] = $category;
		}
		return $data;
	}

	public function sub_Categories($id)
	{
		$this->db->where('categories_status', '1');
		$this->db->where('categories_parent', $id);
		return $this->db->get('categories')->result_array();
	}

	public function parent_cat($id = FALSE)
	{
		$this->db->where('categories_type', 'product');
		$this->db->where('categories_parent<>', '0');
		$this->db->where('categories_status', '1');
		if ($id) {
			$this->db->where('categories_id', $id);
			return $this->db->get('categories')->row_array();
		} else {
			$this->db->order_by('categories_id', 'ASC');
			$categories = $this->db->get('categories')->result_array();
		}

		$this->db->where('cat_parent', $id);
		$metas = $this->db->get('categories_meta')->result_array();


		foreach ($categories as $category) {
			foreach ($metas as $meta) {
				$category[$meta['cat_key']] = $meta['cat_value'];
			}
		}
		return $categories;
	}

	public function get_Products_By_Categories_Slug($slug, $limit = FALSE, $offset = FALSE)
	{
		$data = [];
		$this->db->where('categories_type', 'product');
		$this->db->where('categories_slug', $slug);
		$category = $this->db->get('categories')->row_array();

		if ($limit) {
			$this->db->limit($limit, $offset);
		}

		$this->db->where('products_category_category', $category['categories_id']);
		$this->db->join('search', 'products_category_post = search_product', 'left');
		// return $this->db->get('')->result_array();
		$prc = [];
		$datas = $this->db->get('products_category')->result_array();
		if ($datas) {
			foreach ($datas as $data) {
				$data['wishlist'] = $this->db->where('wishlists_user', $this->session->userdata('user_id'))->where('wishlists_post', $data['search_product'])->get('wishlists')->num_rows();
				$prc[] = $data;
			}
		}
		return $prc;
	}

	public function getColours()
	{
		$colour = [];
		$this->db->where('(`search_filter_key` = "color" OR `search_filter_key` = "colour" OR `search_filter_key` = "Colour" OR `search_filter_key` = "Color")');
		$results = $this->db->get('search_filter')->result_array();
		if ($results) {
			foreach ($results as $res) {
				if (!in_array($res['search_filter_value'], $colour)) {
					$colour[] = $res['search_filter_value'];
				}
			}
		}
		return $colour;
	}

	public function get_All_Products($limit = FALSE, $offset = FALSE)
	{
		$fltr = [];
		if ($this->input->get('color')) {
			$this->db->where('(`search_filter_key` = "color" OR `search_filter_key` = "colour" OR `search_filter_key` = "Colour" OR `search_filter_key` = "Color")');
			$this->db->where('search_filter_value', $this->input->get('color'));
			$results = $this->db->get('search_filter')->result_array();
			if ($results) {
				foreach ($results as $res) {
					$fltr[] = $res['search_filter_search'];
				}
			}
			if (count($fltr) > 0) {
				$this->db->where_in('search_id', $fltr);
			} else {
				return $this->db->where('search_id', '0')->get('search')->result_array();
			}
		}
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		if ($this->input->get('min') && $this->input->get('max')) {
			$this->db->where('(search_price BETWEEN ' . $this->input->get('min') . ' AND ' . $this->input->get('max') . ')');
		}
		if ($this->input->get('brands')) {
			$this->db->where_in('search_brand', $this->input->get('brands'));
		}
		if ($this->input->get('sort')) {
			$sort = $this->input->get('sort');
			// order, date, price, price-desc
			if ($sort == 'order') {
			} elseif ($sort == 'date') {
				$this->db->order_by('search_id', 'desc');
			} elseif ($sort == 'price') {
				$this->db->order_by('search_price', 'asc');
			} elseif ($sort == 'price-desc') {
				$this->db->order_by('search_price', 'desc');
			}
		}
		$prc = [];
		$datas = $this->db->get('search')->result_array();
		if ($datas) {
			foreach ($datas as $data) {
				$data['wishlist'] = $this->db->where('wishlists_user', $this->session->userdata('user_id'))->where('wishlists_post', $data['search_product'])->get('wishlists')->num_rows();
				$prc[] = $data;
			}
		}
		return $prc;
		// print_r($prc);
		// echo $this->db->last_query();
		// die;
	}

	public function getBrands()
	{
		return $this->db->order_by('brands_url')->get('brands')->result_array();
	}

	public function get_Cat_Products($id = FALSE, $limit = FALSE, $offset = FALSE)
	{
		$this->db->where('posts_status', '1');
		$this->db->where('posts_type', 'product');
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		$this->db->join('products', 'products_post = posts_id', 'left');
		$this->db->join('categories', 'categories_id = products_category', 'left');
		$this->db->where('products_category', $id);
		return $this->db->get('posts')->result_array();
	}

	public function get_Reviews($id)
	{
		$this->db->where('comments_post', $id);
		$this->db->join('posts', 'posts_id = comments_post', 'left');
		return $this->db->get('comments')->result_array();
	}

	public function get_Similar($id)
	{
		$this->db->where('comments_post', $id);
		$this->db->join('posts', 'posts_id = comments_post', 'left');
		return $this->db->get('comments')->result_array();
	}

	public function get_Products_By_Slug($slug)
	{
		$attributeX = [];

		$this->db->where('posts_type', 'product');
		$this->db->where('posts_status', '1');
		$this->db->join('products', 'products_post = posts_id', 'left');
		$this->db->where('posts_slug', $slug);
		$post = $this->db->get('posts')->row_array();

		$this->db->where('products_category_post', $post['posts_id']);
		$this->db->join('categories', 'products_category_category = categories_id', 'left');
		$post['categories'] = $this->db->get('products_category')->result_array();

		$this->db->where('products_gallery_post', $post['posts_id']);
		$post['galleries'] = $this->db->get('products_gallery')->result_array();

		$this->db->where('comments_post', $post['posts_id']);
		$post['comments'] = $this->db->get('comments')->result_array();

		$this->db->where('product_similars_post', $post['posts_id']);
		$this->db->join('search', 'search_product = product_similars_similar', 'left');
		$similarss = $this->db->get('product_similars')->result_array();
		$similars = [];
		if ($similarss) {
			foreach ($similarss as $data) {
				$data['wishlist'] = $this->db->where('wishlists_user', $this->session->userdata('user_id'))->where('wishlists_post', $data['search_product'])->get('wishlists')->num_rows();
				$similars[] = $data;
			}
		}
		$post['similars'] = $similars;

		$this->db->where('product_specification_post', $post['posts_id']);
		$post['specifications'] = $this->db->get('product_specification')->result_array();

		$post['wishlist'] = $this->db->where('wishlists_user', $this->session->userdata('user_id'))->where('wishlists_post', $post['posts_id'])->get('wishlists')->num_rows();

		$this->db->where('product_attributes_post', $post['posts_id']);
		$attributes = $this->db->get('product_attributes')->result_array();
		foreach ($attributes as $attribute) {
			$this->db->where('product_variables_attribute', $attribute['product_attributes_id']);
			$attribute['variables'] = $this->db->get('product_variables')->result_array();
			$attributeX[] = $attribute;
		}
		$post['attributes'] = $attributeX;
		return $post;
	}

	public function add_To_Cart($product)
	{
		$user = $this->session->userdata('user_id');
		$quantity = $this->input->post('quantity');
		$user_ses = get_cookie('users_local_session');
		if (is_null($user)) {
			$user = '0';
		}

		$this->db->where('carts_token', $user_ses);
		$this->db->where('carts_product', $product);
		$result = $this->db->get('carts');
		if ($result->num_rows() > 0) {
			$qty = ($result->row(0)->carts_quantity) + $quantity;
			$data = array(
				'carts_user' => $user,
				'carts_token' => $user_ses,
				'carts_product' => $product,
				'carts_quantity' => $qty
			);
			$this->db->where('carts_token', $user_ses);
			$this->db->where('carts_product', $product);
			$this->db->update('carts', $data);
		} else {
			$data = array(
				'carts_user' => $user,
				'carts_token' => $user_ses,
				'carts_product' => $product,
				'carts_quantity' => $quantity,
				'carts_created' => now()
			);
			$this->db->insert('carts', $data);
		}
		return 1;
	}

	public function check_Login($email, $password)
	{
		$user_ses = get_cookie('users_local_session');
		$this->db->where('users_email', $email);
		$user = $this->db->get('users')->row_array();
		if ($user) {
			if (password_verify($password, $user['users_password'])) {
				if ($user['users_status'] == '1') {
					set_User_Cookie($user['users_id'], $user_ses);
					$this->session->set_userdata($user);
					return 1;
				} else {
					return 'User is not activated';
				}
			} else {
				return 'Invalid Password';
			}
		} else {
			return 'User Not found';
		}
	}

	public function user_Email($email)
	{
		$this->db->where('users_email', $email);
		return $this->db->get('users')->row();
	}

	public function do_Register_Social($data)
	{
		$f_Name = @$data['fname'][0];
		$l_Name = str_replace($data['fname'][0] . ' ', '', implode(' ', $data['fname']));
		$email = $data['email'];
		$password = rand(1111, 9999) . rand(1111, 9999);

		$this->db->insert('users', [
			'users_first_name'		=> $f_Name,
			'users_last_name'		=> $l_Name,
			'users_email'			=> $email,
			'users_mobile'			=> '',
			'users_password'		=> password_hash($password, PASSWORD_DEFAULT),
			'users_role'			=> '1',
			'users_social'			=> $data['social'],
			'users_social_token'	=> $data['token'],
			'users_status'			=> '1',
			'users_created'			=> now()
		]);
		$id = $this->db->insert_id();
		$this->db->where('users_id', $id);
		return $this->db->get('users')->row();
	}

	public function do_Register()
	{
		$f_Name = $this->input->post('fname');
		$l_Name = $this->input->post('lname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$password = $this->input->post('password');

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
		return $this->db->insert_id();
	}

	public function check_Email($email)
	{
		$this->db->where('users_email', $email);
		return $this->db->get('users')->num_rows();
	}

	public function get_Cart()
	{
		$user_ses = get_cookie('users_local_session');
		$user = $this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->from('carts');
		if (!is_null($user)) {
			$this->db->where('carts_token = "' . $user_ses . '" OR carts_user = "' . $user . '"');
		} else {
			$this->db->where('carts_token', $user_ses);
		}
		$this->db->join('posts', 'posts_id = carts_product', 'left');
		$this->db->join('products', 'posts_id = products_post', 'left');
		$result = $this->db->get();
		return $result->result_array();
	}

	public function remove_Cart($id)
	{
		$this->db->where('carts_id', $id);
		return $this->db->delete('carts');
	}

	public function update_Cart()
	{
		$cart = $this->input->post('cart');
		$quantity = $this->input->post('quantity');
		if (count($cart) > 0) {
			for ($i = 0; $i < count($cart); $i++) {
				$this->db->where('carts_id', $cart[$i]);
				$this->db->update('carts', [
					'carts_quantity' => $quantity[$i]
				]);
				echo "<p>" . $this->db->last_query() . "</p>";
			}
			return 1;
		} else {
			return 0;
		}
	}

	public function contact()
	{
		$f_Name = $this->input->post('name');
		// $l_Name = $this->input->post('lname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');

		$this->db->insert('contacts', [
			// 'contacts_name' => $f_Name.' '.$l_Name,
			'contacts_name' => $f_Name,
			'contacts_email' => $email,
			'contacts_phone' => $phone,
			'contacts_opt1' => $subject,
			'contacts_message' => $message,
			'contacts_status' => 0,
			'contacts_created' => now()
		]);
		return $this->db->insert_id();
	}

	public function checkout()
	{
		$f_Name = $this->input->post('fname');
		$l_Name = $this->input->post('lname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');

		$this->db->insert('contacts', [
			'contacts_name' => $f_Name . ' ' . $l_Name,
			'contacts_email' => $email,
			'contacts_phone' => $phone,
			'contacts_opt1' => $subject,
			'contacts_message' => $message,
			'contacts_status' => 0,
			'contacts_created' => now()
		]);
		return $this->db->insert_id();
	}

	public function get_User_Address()
	{
		$user = $this->session->userdata('user_id');
		$this->db->where('user_address_user', $user);
		$this->db->join('address', 'user_address_address = address_id', 'left');
		return $this->db->get('user_address')->result_array();
	}

	public function save_Address()
	{
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

	public function save_Edit_Address($id, $address)
	{
		$this->db->where('address_id', $address)->update('address', [
			'address_line1' => $this->input->post('country'),
			'address_line2' => $this->input->post('state'),
			'address_line3' => $this->input->post('city'),
			'address_line4' => $this->input->post('pin'),
			'address_line5' => $this->input->post('address'),
			'address_line6' => $this->input->post('additional'),
		]);
		$this->db->where('user_address_id', $id)->update('user_address', [
			'user_address_fname' => $this->input->post('fname'),
			'user_address_lname' => $this->input->post('lname'),
			'user_address_company' => $this->input->post('company'),
			'user_address_email' => $this->input->post('email'),
			'user_address_phone' => $this->input->post('phone')
		]);
		return 1;
	}

	public function COD_Payment($address)
	{
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

	public function save_Comment($post)
	{
		$this->db->insert('comments', [
			'comments_post' => $post,
			'comments_user' => $this->session->userdata('user_id'),
			'comments_name' => $this->input->post('name'),
			'comments_email' => $this->input->post('email'),
			'comments_message' => $this->input->post('message'),
			'comments_rate' => $this->input->post('rate'),
			'comments_status' => getenv('AutoApproveComment'),
			'comments_created' => now()
		]);
		return $this->db->insert_id();
	}

	public function grid_Product($data)
	{
		$p["product"] = $data;
		return $this->load->view("partials/product", $p, true);
	}

	public function grid_Sub_Category($cat)
	{
		// $product = $this->Basic_model->singleCat($cat);
		return $this->load->view("partials/sub-category", $cat, true);
	}

	public function grid_Category($cat)
	{
		// $product = $this->Basic_model->singleCat($cat);
		return $this->load->view("partials/category", $cat, true);
	}


	public function widget_Product($id)
	{
		$data["product"] = $id;
		return $this->load->view("partials/product-widget", $data, true);
	}

	public function get_Daily_Deals($limit = FALSE, $offset = FALSE)
	{
		$data = [];
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		$this->db->join('search', 'products_daily_deals_post = search_product', 'left');
		$prc = [];
		$datas = $this->db->get('products_daily_deals')->result_array();
		if ($datas) {
			foreach ($datas as $data) {
				$data['wishlist'] = $this->db->where('wishlists_user', $this->session->userdata('user_id'))->where('wishlists_post', $data['search_product'])->get('wishlists')->num_rows();
				$prc[] = $data;
			}
		}
		return $prc;
	}

	public function get_Featured_Product($limit = FALSE)
	{
		$this->db->where('posts_status', '1');
		$this->db->where('products_featured', '1');
		$this->db->where('posts_type', 'product');
		if ($limit) {
			$this->db->limit($limit);
		}
		$this->db->join('products', 'products_post = posts_id', 'left');
		$this->db->order_by('posts_id', 'DESC');
		$this->db->group_by('posts_title');
		return $this->db->get('posts')->result_array();
	}

	public function get_Products($limit = FALSE, $offset = FALSE)
	{
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		$this->db->order_by('search_id', 'DESC');
		$this->db->group_by('search_title');
		// return $this->db->get('search')->result_array();
		$prc = [];
		$datas = $this->db->get('search')->result_array();
		if ($datas) {
			foreach ($datas as $data) {
				$data['wishlist'] = $this->db->where('wishlists_user', $this->session->userdata('user_id'))->where('wishlists_post', $data['search_product'])->get('wishlists')->num_rows();
				$prc[] = $data;
			}
		}
		return $prc;
	}

	public function get_Product($limit = FALSE, $offset = FALSE)
	{
		$this->db->where('posts_status', '1');
		$this->db->where('posts_type', 'product');
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		$this->db->join('products', 'products_post = posts_id', 'left');
		$this->db->order_by('posts_id', 'DESC');
		$this->db->group_by('posts_title');
		return $this->db->get('posts')->result_array();
	}

	public function get_Blogs($limit = FALSE, $offset = FALSE)
	{
		$this->db->where('posts_status', '1');
		$this->db->where('posts_type', 'blog');
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		$this->db->join('blogs', 'blogs_post = posts_id', 'left');
		$this->db->order_by('posts_id', 'DESC');
		return $this->db->get('posts')->result_array();
	}
	public function get_Blog($slug = FALSE)
	{
		$this->db->where('posts_slug', $slug);
		$this->db->join('blogs', 'blogs_post = posts_id', 'left');
		return $this->db->get('posts')->row_array();
	}

	public function get_Related_Blog($slug = FALSE)
	{
		$this->db->where('posts_type', 'blog');
		$this->db->where('posts_status', '1');
		$this->db->where('posts_slug<>', $slug);
		$this->db->limit(6);
		$this->db->join('blogs', 'blogs_post = posts_id', 'left');
		$this->db->order_by('blogs_post', 'DESC');
		return $this->db->get('posts')->result_array();
	}

	public function get_Trending_Categories($limit = FALSE, $offset = FALSE)
	{
		$data = [];
		$this->db->where('categories_status', '1');
		$this->db->where('categories_type', 'product');
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		$this->db->join('categories', 'products_trending_categories_cat = categories_id', 'left');
		return $this->db->get('products_trending_categories')->result_array();
	}

	public function get_Best_Offers($limit = FALSE, $offset = FALSE)
	{
		$data = [];
		$this->db->where('products_best_offers_status', '1');
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		return $this->db->get('products_best_offers')->result_array();
	}

	public function get_Best_Offers_Products($id, $limit = FALSE, $offset = FALSE)
	{
		$data = [];
		$this->db->where('products_best_offers_status', '1');
		$this->db->where('best_offer_products_offer', $id);
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		$this->db->join('products_best_offers', 'products_best_offers_id = best_offer_products_offer', 'left');
		$this->db->join('search', 'best_offer_products_post = search_product', 'left');
		// return $this->db->get('best_offer_products')->result_array();
		$prc = [];
		$datas = $this->db->get('best_offer_products')->result_array();
		if ($datas) {
			foreach ($datas as $data) {
				$data['wishlist'] = $this->db->where('wishlists_user', $this->session->userdata('user_id'))->where('wishlists_post', $data['search_product'])->get('wishlists')->num_rows();
				$prc[] = $data;
			}
		}
		return $prc;
	}

	public function get_Sliders()
	{
		$this->db->where('sliders_status', '1');
		$this->db->order_by('sliders_sort');
		$this->db->join('categories', 'categories_id = sliders_category', 'left');
		return $this->db->get('sliders')->result_array();
	}
	public function get_Testimonials()
	{
		$this->db->where('testimonials_status', '1');
		return $this->db->get('testimonials')->result_array();
	}

	public function get_Featured_Products($limit = FALSE, $offset = FALSE)
	{
		$this->db->where('posts_status', '1');
		$this->db->where('products_featured', '1');
		$this->db->where('posts_type', 'product');
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		$this->db->join('products', 'products_post = posts_id', 'left');
		return $this->db->get('posts')->result_array();
	}

	public function delete_Address($id)
	{
		$this->db->where('user_address_id', $id);
		$user_Address = $this->db->get('user_address')->row();
		$this->db->where('address_id', $user_Address->user_address_address);
		$this->db->delete('address');
		$this->db->where('user_address_id', $id);
		return $this->db->delete('user_address');
	}

	public function get_User_Saved_Cards()
	{
		$user = $this->session->userdata('user_id');
		$this->db->where('user_cards_user', $user);
		return $this->db->get('user_cards')->result_array();
	}

	public function save_Card()
	{
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

	public function get_Address_By_ID($id)
	{
		$this->db->where('user_address_id', $id);
		$this->db->join('address', 'user_address_address = address_id', 'left');
		return $this->db->get('user_address')->row_array();
	}

	public function get_Card_By_ID($id)
	{
		$this->db->where('user_cards_id', $id);
		return $this->db->get('user_cards')->row_array();
	}

	public function get_Home_Offers($limit, $position)
	{
		$this->db->limit($limit);
		$this->db->order_by('rand()');
		$this->db->where('home_offers_position', $position);
		$this->db->join('posts', 'home_offers_product = posts_id', 'left');
		$this->db->join('categories', 'home_offers_category = categories_id', 'left');
		return $this->db->get('home_offers')->result_array();
	}

	public function get_Wishlist()
	{
		$user = $this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->from('wishlists');
		$this->db->where('wishlists_user', $user);
		$this->db->join('posts', 'posts_id = wishlists_post', 'left');
		$this->db->join('products', 'posts_id = products_post', 'left');
		$result = $this->db->get();
		return $result->result_array();
	}

	// public function add_To_Cart_Wishlist_old($product, $id){
	// $user = $this->session->userdata('user_id');
	// $quantity = $this->input->post('quantity');
	// $user_ses = get_cookie('users_local_session');
	// if (is_null($user)) {
	// $user = '0';
	// }

	// $this->db->where('carts_token', $user_ses);
	// $this->db->where('carts_product', $product);
	// $result = $this->db->get('carts');
	// if($result->num_rows() > 0){
	// $qty = ($result->row(0)->carts_quantity)+$quantity;
	// $data = array(
	// 'carts_user' => $user,
	// 'carts_token' => $user_ses,
	// 'carts_product' => $product,
	// 'carts_quantity' => $qty
	// );
	// $this->db->where('carts_token', $user_ses);
	// $this->db->where('carts_product', $product);
	// $this->db->update('carts', $data);
	// }else{
	// $data = array(
	// 'carts_user' => $user,
	// 'carts_token' => $user_ses,
	// 'carts_product' => $product,
	// 'carts_quantity' => $quantity,
	// 'carts_created' => now()
	// );
	// $this->db->insert('carts', $data);
	// }
	// $this->remove_Wishlist($id);
	// }

	public function add_To_Cart_Wishlist($product, $id)
	{
		$user = $this->session->userdata('user_id');
		$quantity = $this->input->post('quantity');
		if ($quantity < 1) {
			$quantity = 1;
		}
		$user_ses = get_cookie('users_local_session');
		if (is_null($user)) {
			$user = '0';
		}

		$this->db->where('carts_token', $user_ses);
		$this->db->where('carts_product', $product);
		$result = $this->db->get('carts');
		if ($result->num_rows() > 0) {
			$qty = ($result->row(0)->carts_quantity) + $quantity;
			$data = array(
				'carts_user' => $user,
				'carts_token' => $user_ses,
				'carts_product' => $product,
				'carts_quantity' => $qty
			);
			$this->db->where('carts_token', $user_ses);
			$this->db->where('carts_product', $product);
			$this->db->update('carts', $data);
		} else {
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




	public function add_To_Wishlist($product)
	{
		$user = $this->session->userdata('user_id');
		$this->db->where('wishlists_user', $user);
		$this->db->where('wishlists_post', $product);
		$result = $this->db->get('wishlists');
		if ($result->num_rows() == 0) {
			$data = array(
				'wishlists_user' => $user,
				'wishlists_post' => $product,
				'wishlists_created' => now()
			);
			$this->db->insert('wishlists', $data);
			return 1;
		} else {
			$row = $result->row_array();
			$this->remove_Wishlist($row['wishlists_id']);
			return 0;
		}
	}

	public function remove_Wishlist($id)
	{
		$this->db->where('wishlists_id', $id);
		return $this->db->delete('wishlists');
	}

	public function set_User_Cookie($user_id, $session)
	{
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



	public function get_Categories($id = FALSE)
	{
		$this->db->where('categories_type', 'product');
		$this->db->where('categories_status', '1');
		// $this->db->where('categories_parent<>', '0');
		if ($id) {
			$this->db->where('categories_id', $id);
			return $this->db->get('categories')->row_array();
		} else {
			$this->db->order_by('categories_id', 'ASC');
			return $this->db->get('categories')->result_array();
		}
	}

	public function get_Featured_Categories($limit = FALSE)
	{
		$this->db->where('categories_type', 'product');
		$this->db->where('categories_status', '1');
		$this->db->where('categories_featured', '1');
		$this->db->where('categories_parent<>', '0');
		if ($limit) {
			$this->db->limit($limit);
			return $this->db->get('categories')->result_array();
		} else {
			$this->db->order_by('categories_id', 'DESC');
			return $this->db->get('categories')->result_array();
		}
	}

	public function get_Grades($id = FALSE)
	{
		// $this->db->where('categories_type', 'grade');
		// $this->db->where('categories_status', '1');
		// if ($id) {
		// 	$this->db->where('categories_id', $id);
		// 	return $this->db->get('categories')->row_array();
		// } else {
		// 	$this->db->order_by('categories_id', 'DESC');
		// 	return $this->db->get('categories')->result_array();
		// }
	}

	public function surface($slug = FALSE)
	{
		$this->db->where('categories_type', 'surface');
		if ($slug) {
			$this->db->where('categories_slug', $slug);
			return $this->db->get('categories')->row();
		} else {
			$this->db->order_by('categories_id', 'ASC');
			$categories = $this->db->get('categories')->result_array();
		}

		return $categories;
	}

	public function add_To_Cart_Cut($id)
	{
		$user = $this->session->userdata('user_id');
		$quantity = 1;
		$user_ses = get_cookie('users_local_session');
		if (is_null($user)) {
			$user = '0';
		}

		$this->db->where('carts_token', $user_ses);
		$this->db->where('carts_product', $id);
		$cart = $this->db->get('carts')->row_array();
		$this->db->where('carts_id', $cart['carts_id']);
		$this->db->delete('carts');
		$this->db->where('cart_variables_cart', $cart['carts_id']);
		$this->db->delete('cart_variables');
		$data = array(
			'carts_user' => $user,
			'carts_token' => $user_ses,
			'carts_product' => $id,
			'carts_quantity' => $quantity,
			'carts_created' => now()
		);
		$this->db->insert('carts', $data);
		$cart = $this->db->insert_id();

		$length = $this->input->post('length');
		$qty = $this->input->post('qty');
		$perMM = $this->input->post('permm');
		$remaining = $this->input->post('remaining');
		$data = array(
			'cart_variables_cart' => $cart,
			'cart_variables_length' => $length,
			'cart_variables_measure' => $remaining,
			'cart_variables_price' => $perMM,
			'cart_variables_quantity' => $qty
		);
		$this->db->insert('cart_variables', $data);


		return 1;
	}

	public function add_To_Cart_Custom($product)
	{
		$user = $this->session->userdata('user_id');
		$user_ses = get_cookie('users_local_session');
		if (is_null($user)) {
			$user = '0';
		}

		$data = array(
			'carts_user' => $user,
			'carts_token' => $user_ses,
			'carts_product' => $product,
			'carts_quantity' => $this->input->post('quantity'),
			'carts_created' => now()
		);
		$this->db->insert('carts', $data);
		return 1;
	}

	public function insert_Setting($key, $value)
	{
		$count = $this->db->where('settings_key', $key)->get('settings')->num_rows();
		if ($count > 0) {
			$this->db->where('settings_key', $key);
			$this->db->update('settings', [
				'settings_value'	=> $value,
			]);
			return $this->db->insert_id();
		} else {
			$this->db->insert('settings', [
				'settings_key'		=> $key,
				'settings_value'	=> $value,
			]);
			return $this->db->insert_id();
		}
	}

	public function get_Setting($key = FALSE)
	{
		if ($key) {
			return $this->db->where('settings_key', $key)->get('settings')->row_array();
		}
		return $this->db->order_by('settings_key', 'ASC')->get('settings')->result_array();
	}
}
