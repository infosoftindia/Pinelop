<?php

	require APPPATH . 'libraries/REST_Controller.php';

	class Cart extends Rest_Controller  {

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
				$carts = $this->Api_model->get_Cart($user_id);
				if($carts){
					$data['carts'] = $carts;
					$this->response($data, REST_Controller::HTTP_OK);
				}else{
					$this->response([
						$this->config->item('rest_status_field_name') => FALSE,
						$this->config->item('rest_message_field_name') => 'Your cart is empty'
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
				$quantity = $array['quantity'];
				$cart = $this->Api_model->add_To_Cart($product, $user, $quantity);
				$this->response([
					$this->config->item('rest_status_field_name') => TRUE,
					$this->config->item('rest_message_field_name') => 'Product added to Cart successfully'
				], self::HTTP_OK);
			}
		}

		public function index_delete(){
			if($this->api){
				$json = file_get_contents("php://input");
				$array = json_decode($json, true);
				$id = $array['id'];
				$user = $array['user_id'];
				$cart = $this->Api_model->remove_Cart($id, $user);
				$this->response([
					$this->config->item('rest_status_field_name') => TRUE,
					$this->config->item('rest_message_field_name') => 'Product removed from Cart successfully'
				], self::HTTP_OK);
			}
		}

		public function index_put(){
			if($this->api){
				$json = file_get_contents("php://input");
				$array = json_decode($json, true);
				$id = $array['id'];
				$user = $array['user_id'];
				$quantity = $array['quantity'];
				$cart = $this->Api_model->update_Cart($id, $user, $quantity);
				$this->response([
					$this->config->item('rest_status_field_name') => TRUE,
					$this->config->item('rest_message_field_name') => 'Cart updated successfully'
				], self::HTTP_OK);
			}
		}
	}