<?php

	require APPPATH . 'libraries/REST_Controller.php';

	class Home extends Rest_Controller  {

		public $api;
		
		public function __construct() {
			parent::__construct();
			$this->load->model("Api_model");
			$this->api = self::auth_User($this->input->server('HTTP_APIKEY'));
		}

		public function index_get(){
			if($this->api){
				$data["sliders"] = $this->Api_model->get_Sliders();
				$data["firsts"] = $this->Api_model->get_Home_Offers(3, 'first');
				$data["deals"] = $this->Api_model->get_Daily_Deals(10);
				$data["seconds"] = $this->Api_model->get_Home_Offers(2, 'second');
				$data["featured_products"] = $this->Api_model->get_Featured_Products(10);
				$this->response($data, REST_Controller::HTTP_OK);
			}
		}

		public function search_post(){
			if($this->api){
				$json = file_get_contents("php://input");
				$array = json_decode($json, true);
				$keyword = trim($array['keyword']);
				$data['products'] = $this->Api_model->all_Products_For_Search($keyword);
				$this->response($data, REST_Controller::HTTP_OK);
			}
		}

		public function search_get(){
			if($this->api){
				$json = file_get_contents("php://input");
				$array = json_decode($json, true);
				$keyword = trim($array['keyword']);
				$data['posts'] = $this->Api_model->search_Result($keyword);
				$this->response($data, REST_Controller::HTTP_OK);
			}
		}

		public function contact_post(){
			if($this->api){
				// $json = file_get_contents("php://input");
				// $array = json_decode($json, true);
				// $name = trim($array['name']);
				// $email = trim($array['email']);
				// $subject = trim($array['subject']);
				// $phone = trim($array['phone']);
				// $message = trim($array['message']);
				// $option1 = trim($array['option1']);
				// $data['posts'] = $this->Api_model->contact($name, $email, $subject, $phone, $message, $option1);
				$this->response([
					$this->config->item('rest_status_field_name') => TRUE,
					$this->config->item('rest_message_field_name') => 'ghjdgfjgh'
				], self::HTTP_OK);
			}
		}
	}