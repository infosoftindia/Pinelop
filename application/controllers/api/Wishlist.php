<?php

	require APPPATH . 'libraries/REST_Controller.php';

	class Wishlist extends Rest_Controller  {

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
				$user_id = trim($array['user_id']);
				$carts = $this->Api_model->get_Wishlist($user_id);
				if($carts){
					$data['wishlists'] = $carts;
					$this->response($data, REST_Controller::HTTP_OK);
				}else{
					$this->response([
						$this->config->item('rest_status_field_name') => FALSE,
						$this->config->item('rest_message_field_name') => 'Your Wishlist is empty'
					], self::HTTP_OK);
				}
			}
		}

		public function index_post(){
			if($this->api){
				$json = file_get_contents("php://input");
				$array = json_decode($json, true);
				$product = $array['post'];
				$user = $array['user_id'];
				$cart = $this->Api_model->add_To_Wishlist($product, $user);
				$this->response([
					$this->config->item('rest_status_field_name') => TRUE,
					$this->config->item('rest_message_field_name') => 'Product added to Wishlist successfully'
				], self::HTTP_OK);
			}
		}

		public function index_delete(){
			if($this->api){
				$json = file_get_contents("php://input");
				$array = json_decode($json, true);
				$id = $array['id'];
				$user = $array['user_id'];
				$cart = $this->Api_model->remove_Wishlist($id, $user);
				$this->response([
					$this->config->item('rest_status_field_name') => TRUE,
					$this->config->item('rest_message_field_name') => 'Product removed from Wishlist successfully'
				], self::HTTP_OK);
			}
		}
	}