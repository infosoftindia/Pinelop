<?php

	require APPPATH . 'libraries/REST_Controller.php';

	class Products extends Rest_Controller  {

		public $api;
		
		public function __construct() {
			parent::__construct();
			$this->load->model("Api_model");
			$this->api = self::auth_User($this->input->server('HTTP_APIKEY'));
		}

		public function index_get(){
			if($this->api){
				$json = file_get_contents("php://input");
				$array = json_decode($json, true);
				$page = trim($array['page']);
				$data['posts'] = $this->Api_model->get_All_Products($page);
				$this->response($data, REST_Controller::HTTP_OK);
			}
		}

		public function index_post(){
			if($this->api){
				$json = file_get_contents("php://input");
				$array = json_decode($json, true);
				$slug = trim($array['slug']);
				$post = $this->Api_model->get_Products_By_Slug($slug);
				if($post){
					$data['post'] = $post;
					$this->response($data, REST_Controller::HTTP_OK);
				}else{
					$this->response([
						$this->config->item('rest_status_field_name') => FALSE,
						$this->config->item('rest_message_field_name') => 'Invalid Slug Passed'
					], self::HTTP_OK);
				}
			}
		}

		public function category_get(){
			if($this->api){
				$json = file_get_contents("php://input");
				$array = json_decode($json, true);
				$page = trim($array['page']);
				$data['categories'] = $this->Api_model->get_All_Categories($page);
				$this->response($data, REST_Controller::HTTP_OK);
			}
		}

		public function category_post(){
			if($this->api){
				$json = file_get_contents("php://input");
				$array = json_decode($json, true);
				$page = trim($array['page']);
				$category = trim($array['category']);
				$post = $this->Api_model->get_Products_By_Categories_Slug($category, $page);
				if($post){
					$data['posts'] = $post;
					$this->response($data, REST_Controller::HTTP_OK);
				}else{
					$this->response([
						$this->config->item('rest_status_field_name') => FALSE,
						$this->config->item('rest_message_field_name') => 'No Products Found'
					], self::HTTP_OK);
				}
			}
		}
	}