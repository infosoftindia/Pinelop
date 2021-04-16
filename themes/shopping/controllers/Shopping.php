<?php

use \DrewM\MailChimp\MailChimp;

class Shopping extends MX_Controller
{

	public function ___css()
	{
		return $this->load->view('inc/css', false, true);
	}

	public function ___js()
	{
		return $this->load->view('inc/js', false, true);
	}

	public function prc()
	{
		// setcookie("users_local_session", md5(uniqid(rand(), true)), time()+31536000);
		echo get_cookie('users_local_session');
	}

	public function is_Logged_In()
	{
		if (!$this->session->userdata('user_id')) {
			$this->e404();
		}
	}

	public function ___load($data)
	{
		$this->load->model('Shopping_model');
		$data['css'] = $this->___css();
		$data['js'] = $this->___js();
		$data['carts'] = $this->Shopping_model->get_Cart();
		$data["categories"] = $this->Shopping_model->get_Categories();
		$data['currencies'] = $this->Shopping_model->get_Setting();
		$data['cart'] = $this->load->view("partials/cart", $data, true);
		$data['header'] = $this->load->view('inc/header', $data, true);
		$data['footer'] = $this->load->view('inc/footer', $data, true);
		$this->load->view('inc/index', $data);
	}

	public function open_Page($page = 'home', $offset = FALSE)
	{
		$this->load->model('Shopping_model');
		$this->load->model('New_model');
		$page = str_replace(' ', '', ucfirst(str_replace('-', ' ', $page)));
		$function = 'load_' . ucfirst($page);
		if (method_exists($this, $function)) {
			$data = $this->$function($offset);
		} else {
			$data = $this->load_404();
		}
		$this->___load($data);
	}

	public function load_404()
	{
		header("HTTP/1.0 404 Not Found");
		$data["title"] = "404 Page not found";
		$data["page"] = $this->load->view("404", $data, true);
		return $data;
	}

	public function e404()
	{
		$data = $this->load_404();
		$this->___load($data);
	}

	public function load_Home()
	{
		// echo json_encode(['keyword'=>'Prashant']);
		$data["title"] = "Welcome to " . getenv('title');
		$data["dailyDeals"] = $this->Shopping_model->get_Daily_Deals(10);
		$data["sliders"] = $this->Shopping_model->get_Sliders();
		$data["parent_cat"] = $this->Shopping_model->parent_cat();
		$data["featuredCategories"] = $this->Shopping_model->get_Featured_Categories(2);
		$data["products"] = $this->Shopping_model->get_Exclusive_Products(20);
		$data["newCollection"] = $this->Shopping_model->get_New_Collection(10);
		$data["bestOffers"] = $this->Shopping_model->get_Best_Offers(3);

		// $data["firstOffers"] = $this->Shopping_model->get_Home_Offers(3, 'first');
		// $data["secondOffers"] = $this->Shopping_model->get_Home_Offers(2, 'second');
		// $data["testimonials"] = $this->Shopping_model->get_Testimonials();
		// $data["featured"] = $this->Shopping_model->get_Featured_Product();
		// $data["categories"] = $this->Shopping_model->get_Categories();
		// $data["blogs"] = $this->Shopping_model->get_Blogs(4);
		// $data["featuredProducts"] = $this->Shopping_model->get_Featured_Products(10);
		// $data["brands"] = $this->New_model->get_Brands();
		// $data["histories"] = $this->New_model->get_Recent_History(4);
		// print_r($data["sliders"]);

		$data["page"] = $this->load->view("home", $data, true);
		return $data;
	}

	public function load_About()
	{
		$data['setting'] = $this->db->where('pages_id', '3')->get('pages')->row_array();
		$data["title"] = "About";
		$data["page"] = $this->load->view("about", $data, true);
		return $data;
	}

	public function load_Shop()
	{
		$limit = getenv('PostPerPage');
		$offset = ($this->input->get('per_page')) ? $this->input->get('per_page') - 1 : 0;
		$config['base_url'] = current_url();
		$config['enable_query_strings'] = true;
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = true;
		$data['total_rows'] = $config['total_rows'] = count($this->Shopping_model->get_All_Products());
		$config['per_page'] = $limit;
		$config['full_tag_open'] = '<ul class="pagination mt-3 justify-content-center pagination_style1">';
		$config['full_tag_close'] = '</ul>';
		// $config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = "</li>\n";
		$config['prev_link'] = '&#10094;';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = "</li>\n";
		$config['next_link'] = '&#10095';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = "</li>\n";
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = "</li>\n";
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = "</a></li>\n";
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = "</li>\n";
		$this->pagination->initialize($config);

		$data["posts"] = $this->Shopping_model->get_All_Products($limit, $offset * $limit);
		$data["colours"] = $this->Shopping_model->getColours();
		$data["brands"] = $this->Shopping_model->getBrands();
		$data["categories"] = $this->Shopping_model->get_Categories();
		$data['total_rows'] = count($data["posts"]);
		$data["title"] = "Quick Shop";
		$data["page"] = $this->load->view("shop", $data, true);
		return $data;
	}

	public function load_Categories()
	{
		$data["categories"] = $this->Shopping_model->parent_cat();
		$data["title"] = "Categories";
		$data["page"] = $this->load->view("categories", $data, true);
		return $data;
	}

	public function load_SubCategory($id)
	{
		$data["categories"] = $this->Shopping_model->sub_Categories($id);
		$data["title"] = "Sub Categories";
		$data["page"] = $this->load->view("sub-category", $data, true);
		return $data;
	}

	public function pagination($count)
	{
		$limit = getenv('PostPerPage');
		$offset = ($this->input->get('per_page')) ? $this->input->get('per_page') - 1 : 0;
		$config['base_url'] = current_url();
		$config['enable_query_strings'] = true;
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = true;
		$data['total_rows'] = $config['total_rows'] = $count;
		$config['per_page'] = $limit;
		$config['full_tag_open'] = '<ul class="pagination mt-3 justify-content-center pagination_style1">';
		$config['full_tag_close'] = '</ul>';
		// $config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = "</li>\n";
		$config['prev_link'] = '&#10094;';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = "</li>\n";
		$config['next_link'] = '&#10095';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = "</li>\n";
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = "</li>\n";
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = "</a></li>\n";
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = "</li>\n";
		$this->pagination->initialize($config);
	}

	public function load_Products($id)
	{
		$limit = getenv('PostPerPage');
		$offset = ($this->input->get('per_page')) ? $this->input->get('per_page') - 1 : 0;
		$config['base_url'] = current_url();
		$config['enable_query_strings'] = true;
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = true;
		$data['total_rows'] = $config['total_rows'] = count($this->Shopping_model->get_Cat_Products($id));
		$config['per_page'] = $limit;
		$config['full_tag_open'] = '<ul class="pagination mt-3 justify-content-center pagination_style1">';
		$config['full_tag_close'] = '</ul>';
		// $config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = "</li>\n";
		$config['prev_link'] = '&#10094;';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = "</li>\n";
		$config['next_link'] = '&#10095';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = "</li>\n";
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = "</li>\n";
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = "</a></li>\n";
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = "</li>\n";
		$this->pagination->initialize($config);

		$data["posts"] = $this->Shopping_model->get_Cat_Products($id, $limit, $offset * $limit);
		$data["grades"] = $this->Shopping_model->get_Grades();
		$data["categories"] = $this->Shopping_model->get_Categories();
		$data['total_rows'] = count($data["posts"]);
		$data["title"] = "Quick Shop";
		$data["page"] = $this->load->view("products", $data, true);
		return $data;
	}

	public function load_ContactUs()
	{
		$data["categories"] = $this->Shopping_model->get_Categories();
		$data["title"] = "Contact us";
		$data["page"] = $this->load->view("contact", $data, true);
		return $data;
	}

	public function QuickView($slug)
	{
		$this->load->model('Shopping_model');
		$data['post'] = $this->Shopping_model->get_Products_By_Slug($slug);
		$data["title"] = "Quick View";
		$this->load->view("quick-view", $data);
		// return $data;
	}

	public function load_Cart()
	{
		$data["parent_cat"] = $this->Shopping_model->parent_cat();
		$data["categories"] = $this->Shopping_model->get_Categories();
		$data["title"] = "Cart";
		$data['carts'] = $this->Shopping_model->get_Cart();
		$data['addresses'] = $this->Shopping_model->get_User_Address();
		$data["page"] = $this->load->view("cart", $data, true);
		return $data;
	}

	public function load_Login()
	{
		$data["title"] = "Login";
		$data['google'] = $this->loginWithGoogleURL();
		$data["page"] = $this->load->view("login", $data, true);
		return $data;
	}

	public function load_Register()
	{
		$data["title"] = "Register";
		$data['google'] = $this->loginWithGoogleURL();
		$data["page"] = $this->load->view("register", $data, true);
		return $data;
	}

	public function load_Blogs()
	{
		$data["blogs"] = $this->Shopping_model->get_Blogs();
		$data["title"] = 'Blogs';
		$data["page"] = $this->load->view("blogs", $data, true);
		return $data;
	}


	public function load_Blog($slug)
	{
		$data["related"] = $this->Shopping_model->get_Related_Blog($slug);
		$data["blog"] = $this->Shopping_model->get_Blog($slug);
		$data["title"] = $data["blog"]['posts_title'];
		$data["page"] = $this->load->view("blog", $data, true);
		return $data;
	}


	public function load_DailyDeals()
	{
		$data["title"] = "Daily Deals";
		$data["categories"] = $this->Shopping_model->get_Categories();
		$data["posts"] = $this->Shopping_model->get_Daily_Deals();
		$data['total_rows'] = count($data["posts"]);
		$data["colours"] = $this->Shopping_model->getColours();
		$data["brands"] = $this->Shopping_model->getBrands();
		$data["page"] = $this->load->view("shop", $data, true);
		return $data;
	}

	// public function load_TrendingCategories(){
	// $data["title"] = "Trending Categories";
	// $data["posts"] = $this->Shopping_model->get_Trending_Categories();
	// $data["page"] = $this->load->view("trending-categories", $data, true);
	// return $data;
	// }

	public function load_BestOffers($id = FALSE)
	{
		$data["title"] = "Best Offers";
		$data["categories"] = $this->Shopping_model->get_Categories();
		$data["offers"] = $this->Shopping_model->get_Best_Offers();
		$data["page"] = $this->load->view("best-offers", $data, true);
		$data['total_rows'] = 0;
		if ($id) {
			$data["colours"] = $this->Shopping_model->getColours();
			$data["brands"] = $this->Shopping_model->getBrands();
			$data["posts"] = $this->Shopping_model->get_Best_Offers_Products($id);
			$data['total_rows'] = count($data["posts"]);
			$data["title"] = @$data["posts"][0]['products_best_offers_title'];
			$data["page"] = $this->load->view("shop", $data, true);
		}
		return $data;
	}

	// public function load_Sell(){
	// $data["title"] = "Sell";
	// $data["page"] = $this->load->view("sell", $data, true);
	// return $data;
	// }

	// public function load_HelpAndSupport(){
	// $data["title"] = "Help And Support";
	// $data["page"] = $this->load->view("help-support", $data, true);
	// return $data;
	// }

	// public function load_VendorRegistration(){
	// $data["title"] = "Vendor Registration";
	// $data["page"] = $this->load->view("vendor-registration", $data, true);
	// return $data;
	// }

	// public function load_MoneyBack(){
	// $data["title"] = "Money Back";
	// $data["page"] = $this->load->view("money-back", $data, true);
	// return $data;
	// }

	// public function load_BuyingHelp(){
	// $data["title"] = "Buying Help";
	// $data["page"] = $this->load->view("buying-help", $data, true);
	// return $data;
	// }

	public function load_WhoWeAre()
	{
		$data["title"] = "Who we are";
		$data["page"] = $this->load->view("who-we-are", $data, true);
		return $data;
	}

	public function load_PrivacyPolicy()
	{
		$data["title"] = "Privacy and Policies";
		$data['setting'] = $this->db->where('pages_id', '2')->get('pages')->row_array();
		$data["page"] = $this->load->view("privacy-policy", $data, true);
		return $data;
	}

	public function load_TermsAndConditions()
	{
		$data["title"] = "Terms and Conditions";
		$data['setting'] = $this->db->where('pages_id', '1')->get('pages')->row_array();
		$data["page"] = $this->load->view("terms-conditions", $data, true);
		return $data;
	}

	public function load_ReturnPolicy()
	{
		$data["title"] = "Return Policy";
		$data['setting'] = $this->db->where('pages_id', '4')->get('pages')->row_array();
		$data["page"] = $this->load->view("return-policy", $data, true);
		return $data;
	}

	public function load_OrderTracking()
	{
		$data["title"] = "Order Tracking";
		$data['setting'] = $this->db->where('pages_id', '5')->get('pages')->row_array();
		$data["page"] = $this->load->view("order-tracking", $data, true);
		return $data;
	}

	public function load_ShippingCostAndPolicy()
	{
		$data["title"] = "Shipping Cost And Policy";
		$data['setting'] = $this->db->where('pages_id', '6')->get('pages')->row_array();
		$data["page"] = $this->load->view("shipping-cost-and-policy", $data, true);
		return $data;
	}

	public function load_Faq()
	{
		$data["title"] = "Frequently Asked Question";
		$data["page"] = $this->load->view("faq", $data, true);
		return $data;
	}

	public function cart()
	{
		$this->load->model('Shopping_model');
		$data['carts'] = $this->Shopping_model->get_Cart();
		echo $this->load->view("partials/cart", $data, true);
	}

	public function load_Search()
	{
		$this->load->model('New_model');
		$this->load->model('Shopping_model');

		$limit = getenv('PostPerPage');
		$offset = ($this->input->get('per_page')) ? $this->input->get('per_page') - 1 : 0;
		$config['base_url'] = current_url() . '?q=' . $this->input->get('q');
		$config['enable_query_strings'] = true;
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = true;
		$data['total_rows'] = $config['total_rows'] = count($this->New_model->search_Result());
		$config['per_page'] = $limit;
		$config['full_tag_open'] = '<ul class="pagination mt-3 justify-content-center pagination_style1">';
		$config['full_tag_close'] = '</ul>';
		// $config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = "</li>\n";
		$config['prev_link'] = '&#10094;';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = "</li>\n";
		$config['next_link'] = '&#10095';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = "</li>\n";
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = "</li>\n";
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = "</a></li>\n";
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = "</li>\n";
		$this->pagination->initialize($config);

		$data["categories"] = $this->Shopping_model->get_Categories();
		$data['posts'] = $this->New_model->search_Result($limit, $offset * $limit);
		$data["colours"] = $this->Shopping_model->getColours();
		$data["brands"] = $this->Shopping_model->getBrands();
		$data["title"] = "Search Result";
		$data["page"] = $this->load->view("shop", $data, true);
		return $data;
	}

	public function filter_search()
	{
		$this->load->model('Shopping_model');
		$this->load->model('New_model');

		$limit = getenv('PostPerPage');
		$offset = ($this->input->get('per_page')) ? $this->input->get('per_page') - 1 : 0;
		$config['base_url'] = site_url('shop');
		$config['enable_query_strings'] = true;
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = true;
		$data['total_rows'] = $config['total_rows'] = count($this->New_model->search_Result());
		$config['per_page'] = $limit;
		$config['full_tag_open'] = '<ul class="pagination mt-3 justify-content-center pagination_style1">';
		$config['full_tag_close'] = '</ul>';
		// $config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = "</li>\n";
		$config['prev_link'] = '&#10094;';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = "</li>\n";
		$config['next_link'] = '&#10095';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = "</li>\n";
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = "</li>\n";
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = "</a></li>\n";
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = "</li>\n";
		$this->pagination->initialize($config);


		$data["categories"] = $this->Shopping_model->get_Categories();
		$data["grades"] = $this->Shopping_model->get_Grades();
		$data["brands"] = $this->Shopping_model->getBrands();
		$data["posts"] = $this->New_model->search_Result($limit, $offset * $limit);
		$data['total_rows'] = count($data["posts"]);
		$data["title"] = "Search Result";
		echo $this->load->view("filter", $data, true);
	}

	public function load_ResetPassword()
	{
		$this->load->model('New_model');
		$data['token'] = $token = $this->input->get('token');
		$user = $this->New_model->get_User_By_Token($token);
		if ($user) {
			$data['user'] = $user;
		} else {
			$data['message'] = '<b>Invalid Token!</b> You cannot reset password';
			$data['form_error'] = 'readonly disabled';
		}
		$data["title"] = "Reset Password";
		$data["page"] = $this->load->view("reset-password", $data, true);
		return $data;
	}

	// public function load_(){
	// $data["title"] = "Register";
	// $data["page"] = $this->load->view("register", $data, true);
	// return $data;
	// }




	public function load_Category($slug)
	{
		$limit = getenv('PostPerPage');
		$offset = ($this->input->get('per_page')) ? $this->input->get('per_page') - 1 : 0;
		$data['category'] = $this->Shopping_model->get_Categories_By_Slug($slug);
		if (empty($data['category'])) {
			show_404();
		}

		$config['base_url'] = current_url();
		$config['enable_query_strings'] = true;
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = true;
		$data['total_rows'] = $config['total_rows'] = count($this->Shopping_model->get_Products_By_Categories_Slug($slug));
		$config['per_page'] = $limit;
		$config['full_tag_open'] = '<ul class="pagination mt-3 justify-content-center pagination_style1">';
		$config['full_tag_close'] = '</ul>';
		// $config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = "</li>\n";
		$config['prev_link'] = '&#10094;';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = "</li>\n";
		$config['next_link'] = '&#10095';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = "</li>\n";
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = "</li>\n";
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = "</a></li>\n";
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = "</li>\n";
		$this->pagination->initialize($config);

		$data["categories"] = $this->Shopping_model->get_Categories();
		// print_r($data);
		$data["colours"] = $this->Shopping_model->getColours();
		$data["brands"] = $this->Shopping_model->getBrands();
		$data['posts'] = $this->Shopping_model->get_Products_By_Categories_Slug($slug, $limit, $offset * $limit);
		$data["title"] = $data['category']['categories_name'];
		$data["page"] = $this->load->view("shop", $data, true);
		return $data;
	}

	public function load_Product($slug)
	{
		$this->load->model('New_model');
		$data['post'] = $this->Shopping_model->get_Products_By_Slug($slug);
		// print_r($data['post']);die;
		$data["categories"] = $this->Shopping_model->get_Categories();
		$data["comments"] = $this->Shopping_model->get_Reviews($data['post']['posts_id']);
		if (empty($data['post'])) {
			show_404();
		}
		$data["title"] = $data['post']['posts_title'];
		// print_r($data);
		$data["page"] = $this->load->view("single_product", $data, true);
		return $data;
		// die;
	}

	public function load_Customize($slug = FALSE)
	{
		$data["title"] = "Customize Product";
		$data['post'] = $this->Shopping_model->get_Products_By_Slug($slug);
		$data['posts'] = $this->Shopping_model->get_All_Products();
		$data["page"] = $this->load->view("customize", $data, true);
		return $data;
	}

	public function load_Account()
	{
		$data["categories"] = $this->Shopping_model->get_Categories();
		$this->is_Logged_In();
		$data["title"] = "Account";
		$data["user"] = $this->New_model->get_My_Profile();
		$data["orders"] = $this->New_model->get_My_Order();
		// echo $data["user"]["users_email"];
		$data["subscribe"] = $this->get_Subscriber_Detail($data["user"]["users_email"]);
		$data['addresses'] = $this->Shopping_model->get_User_Address();
		$data["page"] = $this->load->view("my-account", $data, true);
		return $data;
	}

	public function load_Checkout()
	{
		$data["categories"] = $this->Shopping_model->get_Categories();
		if ($this->session->userdata('user_id')) {
			redirect('cart');
		}
		$data['google'] = $this->loginWithGoogleURL();
		$data["title"] = "Checkout";
		$data['message'] = '<div class="alert alert-danger">Please Login to continue to checkout</div>';
		$data["page"] = $this->load->view("login", $data, true);
		return $data;
	}

	public function load_Wishlist()
	{
		$data["categories"] = $this->Shopping_model->get_Categories();
		$data["title"] = "Wishlist";
		$data['wishlists'] = $this->Shopping_model->get_Wishlist();
		$data["page"] = $this->load->view("wishlist", $data, true);
		return $data;
	}

	public function load_SelectPayment($id)
	{
		$this->is_Logged_In();
		$data["title"] = "Select payment Method";
		$data['address'] = $id;
		$this->session->set_userdata('address', $id);
		$data["cards"] = $this->Shopping_model->get_User_Saved_Cards();
		$data["page"] = $this->load->view("checkout-3", $data, true);
		return $data;
	}

	public function load_PlaceOrder()
	{
		$this->is_Logged_In();
		$data["title"] = "Place Order";
		$address = $this->input->get('address');
		$card = $this->session->userdata('card');
		$data["address"] = $this->Shopping_model->get_Address_By_ID($address);
		$data["card"] = $this->Shopping_model->get_Card_By_ID($card);
		$data['carts'] = $this->Shopping_model->get_Cart();
		$data["page"] = $this->load->view("checkout-4", $data, true);
		return $data;
	}

	public function load_PaytmSuccess()
	{
		$trans = [
			'transactions_user' => $this->session->userdata('user_id'),
			'transactions_gateway' => 'PayTm',
			'transactions_order_id' => $this->input->post('ORDERID'),
			'transactions_mid' => $this->input->post('MID'),
			'transactions_txnid' => $this->input->post('TXNID'),
			'transactions_amount' => $this->input->post('TXNAMOUNT'),
			'transactions_mode' => $this->input->post('PAYMENTMODE'),
			'transactions_currency' => $this->input->post('CURRENCY'),
			'transactions_txndate' => $this->input->post('TXNDATE'),
			'transactions_status' => $this->input->post('STATUS'),
			'transactions_response_code' => $this->input->post('RESPCODE'),
			'transactions_message' => $this->input->post('RESPMSG'),
			'transactions_created' => now()
		];
		$this->Basic_model->save_Transaction_PayTm($trans);

		if ($this->input->post('RESPCODE') == '01' || $this->input->post('RESPCODE') == '400' || $this->input->post('RESPCODE') == '402') {
			$this->session->set_userdata('n_method', 'PayTm');
			$this->complete_payment();
		} else {
			redirect('order-failed');
		}
	}

	public function load_PaypalSuccess()
	{
		$paypalInfo = $this->input->get();

		if (!empty($paypalInfo['item_number']) && !empty($paypalInfo['tx']) && !empty($paypalInfo['amt']) && !empty($paypalInfo['cc']) && !empty($paypalInfo['st'])) {
			$this->complete_payment();
		} else {
			$this->complete_payment('X');
		}
	}
	public function load_PaypalFailed()
	{
		$this->complete_payment('Y');
	}
	public function load_PaypalIpn()
	{
		$paypalInfo = $this->input->post();
		$trans = [
			'transactions_user' => $paypalInfo['custom'],
			'transactions_gateway' => 'Paypal',
			'transactions_order_id' => $paypalInfo['item_number'],
			'transactions_gross' => $paypalInfo['mc_gross'],
			'transactions_txnid' => $paypalInfo["txn_id"],
			'transactions_email' => $paypalInfo["payer_email"],
			'transactions_currency' => $paypalInfo["mc_currency"],
			'transactions_status' => $paypalInfo["payment_status"],
			'transactions_created' => now()
		];
		$paypalURL = $this->paypal_lib->paypal_url;
		$result    = $this->paypal_lib->curlPost($paypalURL, $paypalInfo);
		if (preg_match("/VERIFIED/i", $result)) {
			$this->Basic_model->save_Transaction_PayTm($trans);
		}
	}

	public function load_Makepayment()
	{
		$this->is_Logged_In();
		$this->load->library('razorpay');
		$carts = $this->Shopping_model->get_Cart();
		$priceTotal = 0;
		foreach ($carts as $cart) {
			$price = $cart['products_price'];
			$salePrice = $cart['products_sale_price'];
			if ($salePrice != '0' && $salePrice != '' && $salePrice < $price) {
				$sPrice = $salePrice;
			} else {
				$sPrice = $price;
			}
			$priceTotal += $sPrice * $cart['carts_quantity'];
		}



		$order = [$priceTotal, 'shopping_' . time(), 'INR'];
		$data['order_id'] = $this->razorpay->create_Order($order);

		$address = $this->session->userdata('address');
		$card = $this->session->userdata('card');
		$data["address"] = $this->Shopping_model->get_Address_By_ID($address);
		$data["card"] = $this->Shopping_model->get_Card_By_ID($card);
		$data["carts"] = $this->Shopping_model->get_Cart();


		$data["title"] = "Razorpay";
		$data["page"] = $this->load->view("checkout-5", $data, true);
		return $data;
	}

	public function load_ThankYou()
	{
		$data["categories"] = $this->Shopping_model->get_Categories();
		$this->is_Logged_In();
		$data["title"] = "Thank You";
		$data["page"] = $this->load->view("thank-you", $data, true);
		return $data;
	}

	public function load_OrderFailed()
	{
		$this->is_Logged_In();
		$data["title"] = "Thank You";
		$data["page"] = $this->load->view("order-failed", $data, true);
		return $data;
	}

	public function login_Script()
	{
		$this->load->model('Shopping_model');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->Shopping_model->check_Login($email, $password);
		$uEmail = $this->Shopping_model->user_Email($email);
		if ($user == '1') {
			$this->session->set_flashdata('success', 'Login Successful');
			$this->session->set_userdata([
				'user_id' => $uEmail->users_id,
				'user_fname' => $uEmail->users_first_name,
				'user_lname' => $uEmail->users_last_name,
				'user_name' => $uEmail->users_first_name . ' ' . $uEmail->users_last_name,
				'user_email' => $uEmail->users_email,
				'user_mobile' => $uEmail->users_mobile,
				'user_profile' => $uEmail->users_profile,
				'user_role' => $uEmail->users_role,
				'user_in' => 1
			]);
			redirect('account');
		} else {
			$this->session->set_flashdata('error', $user);
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		save_Activity('Succesfully logged out');
		redirect('');
	}

	public function register_Script()
	{
		$this->load->model('Shopping_model');

		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$password = $this->input->post('password');
		$confirm_Password = $this->input->post('cpassword');

		$check_Email = $this->Shopping_model->check_Email($email);
		if ($check_Email) {
			$this->session->set_flashdata('error', 'This email already registered, please use another email.');
			redirect('register');
			// die('2');
		}
		// $check_Phone = $this->Shopping_model->check_Phone($phone);
		// if($check_Phone){
		// die('3');
		// }

		if (empty($email) || empty($phone) || empty($password) || empty($fname) || empty($lname)) {
			$this->session->set_flashdata('error', 'All fields are required..!');
			redirect('register');
			// die('4');
		}

		if ($password != $confirm_Password) {
			$this->session->set_flashdata('error', 'Confirm password Does not match');
			redirect('register');
			// die('4');
		}

		$user = $this->Shopping_model->do_Register();
		if ($user) {
			$this->session->set_flashdata('success', 'User registered succesfully..!');
			redirect('login');
			// echo '1';
		} else {
			$this->session->set_flashdata('error', 'user not registered, Please try again.');
			redirect('register');
		}
	}

	public function add_to_cart($product)
	{
		$user = false;
		$this->load->model('Shopping_model');
		$user = $this->Shopping_model->add_To_Cart($product);
		if ($user) {
			$this->session->set_flashdata('success', 'Product has been added to cart.');
			die('1');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error', 'We detect problem added product to cart.');
			die('0');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function add_to_wishlist($product)
	{
		$this->load->model('Shopping_model');
		$user = $this->Shopping_model->add_To_Wishlist($product);
		if ($user) {
			echo '1';
		} else {
			echo '0';
		}
	}

	public function remove_cart($id)
	{
		$this->load->model('Shopping_model');
		$cart = $this->Shopping_model->remove_Cart($id);
		if ($cart) {
			$this->session->set_flashdata('success', 'Product has been removed from cart.');
		} else {
			$this->session->set_flashdata('error', 'We detect problem removing product from cart.');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_cart()
	{
		$this->load->model('Shopping_model');
		$cart = $this->Shopping_model->update_Cart();
		if ($cart) {
			$this->session->set_flashdata('success', 'Your shopping cart updated successfully.');
		} else {
			$this->session->set_flashdata('error', 'We detect problem updating from cart.');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function contact()
	{
		$this->load->model('Shopping_model');
		$cart = $this->Shopping_model->contact();
		if ($cart) {
			$this->session->set_flashdata('success', 'Thank you for contacting us. We will contact you soon.');
			// echo '<div class="alert alert-success">Thank you for contacting us. We will contact you soon.</div>';
		} else {
			$this->session->set_flashdata('error', 'We detect problem saving your data. Please try again.');
			// echo '<div class="alert alert-danger">We detect problem saving your data. Please try again.</div>';
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function save_address()
	{
		$this->is_Logged_In();
		$this->load->model('Shopping_model');
		$cart = $this->Shopping_model->save_Address();
		if ($cart) {
			$this->session->set_flashdata('success', 'New Address saved successfully');
		} else {
			$this->session->set_flashdata('danger', 'We detect problem saving new address. Please try again.');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function save_edit_address($id, $address)
	{
		$this->is_Logged_In();
		$this->load->model('Shopping_model');
		$cart = $this->Shopping_model->save_Edit_Address($id, $address);
		if ($cart) {
			$this->session->set_flashdata('success', 'New Address saved successfully');
		} else {
			$this->session->set_flashdata('danger', 'We detect problem saving new address. Please try again.');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function cod_payment($address)
	{
		$this->is_Logged_In();
		$address = $address / 2722;
		$this->load->model('Shopping_model');
		$cart = $this->Shopping_model->COD_Payment($address);
		if ($cart) {
			$this->session->set_flashdata('success', 'New Address saved successfully');
		} else {
			$this->session->set_flashdata('danger', 'We detect problem saving new address. Please try again.');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function save_comment($post)
	{
		$post = $post / 2722;
		$this->load->model('Shopping_model');
		$cart = $this->Shopping_model->save_Comment($post);
		if ($cart) {
			$this->session->set_flashdata('success', 'Thank you for your comment.');
		} else {
			$this->session->set_flashdata('danger', 'We detect problem saving your comment. Please try again.');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_address($id)
	{
		$this->is_Logged_In();
		if (!$this->session->userdata('user_id')) {
			$this->e404();
		} else {
			$this->load->model('Shopping_model');
			$address = $this->Shopping_model->delete_Address($id);
			if ($address) {
				$this->session->set_flashdata('success', 'Address has been successfully deleted');
			} else {
				$this->session->set_flashdata('danger', 'We detect problem deleting your address. Please try again.');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function edit_address($id)
	{
		$this->is_Logged_In();
		if (!$this->session->userdata('user_id')) {
			$this->e404();
		} else {
			$this->load->model('Shopping_model');
			$data['address'] = $this->Shopping_model->get_Address_By_ID($id);
			$this->load->view("partials/edit-address", $data);
		}
	}

	public function save_card()
	{
		if (!$this->session->userdata('user_id')) {
			$this->e404();
		} else {
			$this->load->model('Shopping_model');
			$address = $this->Shopping_model->save_Card();
			if ($address) {
				$this->session->set_flashdata('success', 'Card has been successfully added');
			} else {
				$this->session->set_flashdata('danger', 'We detect problem adding your Card. Please try again.');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function proceed_card()
	{
		if (!$this->session->userdata('user_id')) {
			$this->e404();
		} else {
			$this->load->model('Shopping_model');
			$user = $this->session->userdata('user_id');
			$this->session->set_userdata('n_method', 'Card');
			$card = $this->input->post('card_id');
			$deliveriable = $this->input->post('deliverable');
			$this->session->set_userdata([
				'card' => $card,
				'address' => $deliveriable,
			]);
			redirect('place-order');
		}
	}

	public function complete_payment($error = '')
	{
		if ($error == 'X') {
			die('Something went wrong. We will fix and let you know');
		}
		if ($error == 'Y') {
			die('Payment Failed');
		}
		if (!$this->session->userdata('user_id')) {
			$this->e404();
		} else {
			$this->load->model('Shopping_model');
			$this->load->model('New_model');

			$user = $this->session->userdata('user_id');

			$address = $this->session->userdata('address');
			$card = $this->session->userdata('card');

			// $this->load->library('razorpay');
			// $p_order_id = $this->input->post('p_order_id');
			// $razor = $this->razorpay->check_Order($p_order_id);
			// print_r($razor);
			// echo $json = json_encode($razor, JSON_FORCE_OBJECT);

			$carts = $this->Shopping_model->get_Cart();

			$this->load->module('coupons/coupons');
			$data = $this->coupons->apply_coupon(get_cookie('my_coupon'), 1);
			$coupon = json_decode($data, true);
			$discount_amount = 0;
			$total_amount = 0;
			if ($coupon['status'] == 1) {
				$discount_amount = $coupon['discount_amount'];
				$total_amount = $coupon['total_amount'];
			}

			$order = array(
				'orders_address' => $address,
				'orders_total' => 0,
				'orders_coupon' => get_cookie('my_coupon'),
				'orders_discount' => $discount_amount,
				'orders_shipping' => 'Flat Rate', //$this->session->userdata('n_shipping'),
				'orders_shipping_amount' => 0,
				'orders_final_amount' => $total_amount,
				'orders_payment_status' => 1,
				'orders_payment_method' => $this->session->userdata('n_method'),
				'orders_type' => 'Standard',
			);
			$this->New_model->save_Orders($carts, $order);
			redirect('thank-you');
		}
	}

	public function add_to_cart_wishlist($product, $id)
	{
		$this->load->model('Shopping_model');
		$wishlist = $this->Shopping_model->add_To_Cart_Wishlist($product, $id);
		if ($wishlist) {
			$this->session->set_flashdata('success', 'Product has been removed from wishlist.');
		} else {
			$this->session->set_flashdata('error', 'We detect problem removing product from wishlist.');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function remove_wishlist($id)
	{
		$this->load->model('Shopping_model');
		$wishlist = $this->Shopping_model->remove_Wishlist($id);
		if ($wishlist) {
			$this->session->set_flashdata('success', 'Product has been removed from wishlist.');
		} else {
			$this->session->set_flashdata('error', 'We detect problem removing product from wishlist.');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function search()
	{
		$this->load->model('New_model');
		$products = $this->New_model->all_Products_For_Search();
		if ($products) {
			foreach ($products as $product) {
				$data[] = array(
					'year' => $product['posts_id'],
					'value' => $product['posts_title'],
					'tokens' => explode(' ', $product['posts_title'])
				);
				// $data[] = $product['posts_title'];
			}
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function make_payment()
	{
		$this->is_Logged_In();
		$this->load->model('Shopping_model');
		$carts = $this->Shopping_model->get_Cart();
		$priceTotal = 0;
		foreach ($carts as $cart) {
			$price = $cart['products_price'];
			$salePrice = $cart['products_sale_price'];
			if ($salePrice != '0' && $salePrice != '' && $salePrice < $price) {
				$sPrice = $salePrice;
			} else {
				$sPrice = $price;
			}
			$priceTotal += $sPrice * $cart['carts_quantity'];
		}

		// Check Coupon
		$this->load->module('coupons/coupons');
		$data = $this->coupons->apply_coupon(get_cookie('my_coupon'), 1);
		$coupon = json_decode($data, true);
		if ($coupon['status'] == 1) {
			$priceTotal = $coupon['total_amount'];
		}

		echo '<center><h1>Please do not refresh this page...</h1></center>';
		$data1["CALLBACK_URL"] = base_url('paypal-success') . '?amount=' . $priceTotal . '&txnid=';
		$data1["order"] = rand() . rand();
		$data1["price"] = $priceTotal;
		$this->load->library('Paypal_lib');
		$returnURL = base_url('paypal-success');
		$failURL = base_url('paypal-failed');
		$notifyURL = base_url('paypal-ipn');
		//get particular product data
		// $product = $this->product->getProducts($id);
		$userID = $this->session->userdata('user_id');
		$logo = base_url('themes/shopping/assets/') . 'images/logo_dark.png';
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('fail_return', $failURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', 'Pinelop Purchase');
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  rand());
		$this->paypal_lib->add_field('amount',  $priceTotal);
		$this->paypal_lib->image($logo);
		$this->paypal_lib->paypal_auto_form();
	}

	public function complete_cod_order()
	{
		$this->is_Logged_In();
		$this->session->set_userdata('n_method', 'COD');
		$this->complete_payment();
	}

	public function invoice($id)
	{
		$this->is_Logged_In();
		$this->load->model('New_model');
		$id = ($id + 5) / 5683;
		$user = $this->session->userdata('user_id');

		$valid = $this->New_model->validate_Order($id, $user);
		if ($valid) {
			$this->load->module('orders/orders');
			$data['order'] = $this->orders->return_single_order($id);
			// print_r($data['order']);
			// echo $bill = $this->load->view('receipt/invoice', $data, true);
			$bill = $this->load->view('receipt/invoice', $data, true);
			// pdf($bill);
		}
	}

	public function return_form($id)
	{
		$this->is_Logged_In();
		$this->load->model('New_model');
		$id = ($id + 5) / 5683;
		$user = $this->session->userdata('user_id');

		$valid = $this->New_model->validate_Order($id, $user);
		if ($valid) {
			$this->load->module('orders/orders');
			$data = $this->orders->return_single_order($id);
			$this->orders->open_return_thread($id);
		}
	}

	public function order_feedback($id)
	{
		$this->is_Logged_In();
		$this->load->model('New_model');
		$id = ($id + 5) / 5683;
		$user = $this->session->userdata('user_id');

		$valid = $this->New_model->validate_Order($id, $user);
		if ($valid) {
			$this->load->module('orders/orders');
			$data['order'] = $this->orders->return_single_order($id);
			$this->load->view("partials/feedback", $data);
		}
	}

	public function save_feedback($id)
	{
		$this->is_Logged_In();
		$this->load->model('New_model');
		$user = $this->session->userdata('user_id');

		$valid = $this->New_model->validate_Order($id, $user);
		if ($valid) {
			$this->New_model->save_Feedback($id, $user);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function add_address()
	{
		$this->is_Logged_In();
		$this->load->view("partials/save-address");
	}

	public function change_password()
	{
		$this->is_Logged_In();
		$this->load->model('New_model');
		$password = $this->input->post('confirm-password');
		$status = $this->New_model->change_Password($password);
		if ($status == 1) {
			$this->session->set_flashdata('info', 'Password Changed');
		} else {
			$this->session->set_flashdata('error', 'Invalid Old Password');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function change_profile()
	{
		$this->is_Logged_In();
		$this->load->model('New_model');
		$status = $this->New_model->change_Profile();
		if ($status == 1) {
			$this->session->set_flashdata('info', 'Profile Updated');
		} else {
			$this->session->set_flashdata('error', 'Unable to update your profile');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function get_Subscriber_Detail($email)
	{
		$this->is_Logged_In();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.sendinblue.com/v3/contacts/" . urlencode($email),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYHOST, 0,
			CURLOPT_SSL_VERIFYPEER, 0,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"accept: application/json",
				"api-key: " . getenv('SENDINBLUE')
			),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			// echo "cURL Error #:" . $err;
			return FALSE;
		} else {
			return $response;
		}
	}

	public function subscribe_newsletter()
	{
		$email = $this->input->post('email');
		$MailChimp = new MailChimp('1b4f9940d3558f8c10ffe35561dc6ddd-us1');
		$list_id = '34b9f54538';
		$result = $MailChimp->post("lists/$list_id/members", [
			'email_address' => $email,
			'status'        => 'subscribed',
		]);
		// print_r($result);
		// die;
		if ($result) {
			$this->session->set_flashdata('info', 'Thank you for subscribing to our newsletter.');
		} else {
			$this->session->set_flashdata('error', 'You have already subscribed to our newsletter');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function un_subscribe_newsletter()
	{
		$this->is_Logged_In();
		$email = $this->input->get('email');

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.sendinblue.com/v3/contacts/" . urlencode($email),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYHOST, 0,
			CURLOPT_SSL_VERIFYPEER, 0,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "DELETE",
			CURLOPT_HTTPHEADER => array(
				"accept: application/json",
				"api-key: " . getenv('SENDINBLUE')
			),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
			$this->session->set_flashdata('error', 'Unable to remove your email from the list of newsletter. Please try again');
		} else {
			if ($response) {
				$this->session->set_flashdata('info', 'Your email has been successfully removed from the list of newsletter. See you around!');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong');
			}
		}
		// echo urlencode($email);
		// echo $response;
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function loginWithGoogleHandle()
	{
		$client = $this->loginWithGoogleSetup();
		$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
		$client->setAccessToken($token['access_token']);

		// get profile info
		$google_oauth = new Google_Service_Oauth2($client);
		$google_account_info = $google_oauth->userinfo->get();
		$data['email'] =  $google_account_info->email;
		$data['name'] =  $google_account_info->name;
		$data['id'] =  $google_account_info->id;
		return $data;
	}

	public function loginWithGoogleURL()
	{
		$google = $this->loginWithGoogleSetup();
		return $google->createAuthUrl();
	}

	public function loginWithGoogleSetup()
	{
		$client = new Google_Client();
		$client->setClientId(getenv('GOOGLE_CLIENT_ID'));
		$client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
		$client->setRedirectUri(site_url() . getenv('GOOGLE_REDIRECT_URL'));
		$client->addScope("email");
		$client->addScope("profile");
		$client->addScope("openid");
		return $client;
	}

	public function googleResponse()
	{
		$response = $this->loginWithGoogleHandle();
		$this->db->where('users_social', 'google');
		$this->db->where('users_social_token', $response['id']);
		$db = $this->db->get('users');
		if ($db->num_rows() > 0) {
			$this->socialLogin($db->row());
		} else {
			$this->socialRegister($response);
		}
	}

	public function socialLogin($uEmail)
	{
		$this->load->model('Shopping_model');

		$this->session->set_flashdata('success', 'Login Successful');
		$this->session->set_userdata([
			'user_id' => $uEmail->users_id,
			'user_fname' => $uEmail->users_first_name,
			'user_lname' => $uEmail->users_last_name,
			'user_name' => $uEmail->users_first_name . ' ' . $uEmail->users_last_name,
			'user_email' => $uEmail->users_email,
			'user_mobile' => $uEmail->users_mobile,
			'user_profile' => $uEmail->users_profile,
			'user_social' => $uEmail->users_social,
			'user_role' => $uEmail->users_role,
			'user_in' => 1
		]);
		redirect('account');
	}

	public function socialRegister($response)
	{
		$this->load->model('Shopping_model');

		$fname = $response['name'];
		$name = explode(' ', $fname);
		$email = $response['email'];

		$check_Email = $this->Shopping_model->check_Email($email);
		if ($check_Email > 0) {
			$this->session->set_flashdata('error', 'This email is already registered Please login with Password.');
			redirect('login');
			// die('2');
		}
		$data = [
			'fname' => $name,
			'email' => $email,
			'social' => 'google',
			'token' => $response['id'],
		];
		$user = $this->Shopping_model->do_Register_Social($data);
		if ($user) {
			$this->socialLogin($user);
		} else {
			$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			redirect('login');
		}
	}


	public function cron_currency()
	{
		$this->load->model('Shopping_model');
		$url = "https://v6.exchangerate-api.com/v6/93ec5be084f3e5b112ddedfe/latest/USD";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		$result = curl_exec($ch);
		$array = json_decode($result, true);
		// print_r($array);
		foreach ($array['conversion_rates'] as $key => $value) {
			$this->Shopping_model->insert_Setting($key, $value);
		}
	}


	public function set_curr()
	{
		$this->load->model('Shopping_model');
		$curr = $this->input->post('curr');
		$this->session->set_userdata('set_currency', $curr);
		$ss = $this->Shopping_model->get_Setting($curr);
		$this->session->set_userdata('set_currency_value', $ss['settings_value']);
	}

	public function cron()
	{
		// $this->cron_currency();
		$this->load->model('Shopping_model');
		$posts = $this->db->where('posts_type', 'product')->where('posts_status', '1')->join('products', 'posts_id = products_post', 'left')->get('posts')->result_array();
		$this->db->query('TRUNCATE search');
		$this->db->query('TRUNCATE search_filter');
		if ($posts) {
			foreach ($posts as $post) {
				$filter = 1;
				$data = [];
				$per = 0;
				$rates = $this->db->where('comments_post', $post['posts_id'])->get('comments')->result_array();
				if ($rates) {
					$totalRate = 0;
					foreach ($rates as $rate) {
						$totalRate += $rate['comments_rate'];
					}
					$rt = count($rates);
					$per = $totalRate / $rt;
				}
				$price = $post['products_price'];
				$salePrice = $post['products_sale_price'];
				if ($salePrice != '0' && $salePrice != '' && $salePrice < $price) {
					$sPrice = $salePrice;
				} else {
					$sPrice = $price;
				}
				$data = [
					'search_product' => $post['posts_id'],
					'search_title' => $post['posts_title'],
					'search_price' => $sPrice,
					'search_brand' => $post['products_brand'],
					'search_amount' => $post['products_price'] ?? 0,
					'search_sale' => ($post['products_sale_price'] > 0) ? $post['products_sale_price'] : 0,
					'search_image' => $post['posts_cover'],
					'search_slug' => $post['posts_slug'],
					'search_desc' => $post['products_short_description'],
					'search_rate' => $per,
					'search_exclusive' => $post['products_featured'],
					'search_rate_count' => count($rates),
				];
				$this->db->insert('search', $data);
				$ins_id = $this->db->insert_id();

				$attributes = $this->db->where('product_attributes_post', $post['posts_id'])->get('product_attributes')->result_array();
				if ($attributes) {
					foreach ($attributes as $attribute) {
						$variables = $this->db->where('product_variables_attribute', $attribute['product_attributes_id'])->get('product_variables')->result_array();
						if ($variables) {
							foreach ($variables as $variable) {
								$filter = [
									'search_filter_search' => $ins_id,
									'search_filter_key' => $attribute['product_attributes_name'],
									'search_filter_value' => $variable['product_variables_value'],
								];
								$this->db->insert('search_filter', $filter);
							}
						}
					}
				}
			}
		}
	}

	public function rate_product($id)
	{
		$this->is_Logged_In();
		$data['id'] = $id;
		$this->load->view("partials/save-rate", $data);
	}



	// public function load_DeliveryInformation(){
	// $data["title"] = "Delivery Information";
	// $data["page"] = $this->load->view("delivery-information", $data, true);
	// return $data;
	// }

	// public function load_LearnToSell(){
	// $data["title"] = "Learn to Sell";
	// $data["page"] = $this->load->view("learn-to-sell", $data, true);
	// return $data;
	// }

	// public function load_AffiliateProgram(){
	// $data["title"] = "Affiliate Program";
	// $data["page"] = $this->load->view("affiliate-program", $data, true);
	// return $data;
	// }

	// public function load_AdvertiseYourProducts(){
	// $data["title"] = "Advertise Your Products";
	// $data["page"] = $this->load->view("advertise-your-products", $data, true);
	// return $data;
	// }

	// public function load_ReturnsCentre(){
	// $data["title"] = "Returns Centre";
	// $data["page"] = $this->load->view("returns-centre", $data, true);
	// return $data;
	// }

	// public function load_PurchaseProtection(){
	// $data["title"] = "Purchase Protection";
	// $data["page"] = $this->load->view("purchase-protection", $data, true);
	// return $data;
	// }

	// public function load_MoneyBackGurantee(){
	// $data["title"] = "Money Back Gurantee";
	// $data["page"] = $this->load->view("money-back-gurantee", $data, true);
	// return $data;
	// }

	// public function load_VendorDashboard(){
	// if($this->session->userdata('user_role') == '2' && $this->session->userdata('user_status') == '1'){
	// redirect('dashboard');
	// }
	// $data["title"] = "Vendor Dashboard";
	// $data["page"] = $this->load->view("vendor-dashboard", $data, true);
	// return $data;
	// }

	// public function load_VendorLogin(){
	// $data["title"] = "Vendor Login";
	// $data["page"] = $this->load->view("vendor-login", $data, true);
	// return $data;
	// }

}
