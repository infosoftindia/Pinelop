<?php

	require APPPATH . 'libraries/REST_Controller.php';

	class Users extends Rest_Controller  {

		public $api;
		
		public function __construct() {
			parent::__construct();
			$this->load->model("Api_model");
			$this->api = self::auth_User($this->input->server('HTTP_APIKEY'));
		}

		public function login_post(){
			if($this->api){
				$json = file_get_contents("php://input");
				$array = json_decode($json, true);
				$username = trim($array['username']);
				$password = trim($array['password']);
				$login = $this->Api_model->check_Login($username, $password);
				if($login == 2){
					$this->response([
						$this->config->item('rest_status_field_name') => FALSE,
						$this->config->item('rest_message_field_name') => 'User is not activated'
					], self::HTTP_OK);
				}elseif($login == 3){
					$this->response([
						$this->config->item('rest_status_field_name') => FALSE,
						$this->config->item('rest_message_field_name') => 'Invalid Password'
					], self::HTTP_OK);
				}elseif($login == 4){
					$this->response([
						$this->config->item('rest_status_field_name') => FALSE,
						$this->config->item('rest_message_field_name') => 'User Not found'
					], self::HTTP_OK);
				}else{
					$data = [
						'user_id' => $login['users_id'],
						'user_fname' => $login['users_first_name'],
						'user_lname' => $login['users_last_name'],
						'user_name' => $login['users_first_name'].' '.$login['users_last_name'],
						'user_email' => $login['users_email'],
						'user_mobile' => $login['users_mobile'],
						'user_role' => $login['users_role'],
						'user_in' => 1
					];
					$this->response($data, REST_Controller::HTTP_OK);
				}
			}
		}

		public function register_post(){
			if($this->api){
				$json = file_get_contents("php://input");
				$array = json_decode($json, true);

				$f_Name = trim($array['first_name']);
				$l_Name = trim($array['last_name']);
				$email = trim($array['email']);
				$phone = trim($array['phone']);
				$password = trim($array['password']);

				$register = $this->Api_model->do_Register($f_Name, $l_Name, $email, $phone, $password);
				if($register == 2){
					$this->response([
						$this->config->item('rest_status_field_name') => FALSE,
						$this->config->item('rest_message_field_name') => 'Email already exists'
					], self::HTTP_OK);
				}elseif($register == 3){
					$this->response([
						$this->config->item('rest_status_field_name') => FALSE,
						$this->config->item('rest_message_field_name') => 'Phone Number already registered'
					], self::HTTP_OK);
				}elseif($register == 4){
					$this->response([
						$this->config->item('rest_status_field_name') => FALSE,
						$this->config->item('rest_message_field_name') => 'Unsecured Password'
					], self::HTTP_OK);
				}else{
					$this->response([
						$this->config->item('rest_status_field_name') => TRUE,
						$this->config->item('rest_message_field_name') => 'Registered Successful'
					], REST_Controller::HTTP_OK);
				}
			}
		}

		public function forgot_post(){
			if($this->api){
				$json = file_get_contents("php://input");
				$array = json_decode($json, true);

				$email = trim($array['email']);

				$register = $this->Api_model->do_Register($email);
				if($register == 2){
					$this->response([
						$this->config->item('rest_status_field_name') => FALSE,
						$this->config->item('rest_message_field_name') => 'Email already exists'
					], self::HTTP_OK);
				}elseif($register == 3){
					$this->response([
						$this->config->item('rest_status_field_name') => FALSE,
						$this->config->item('rest_message_field_name') => 'Phone Number already registered'
					], self::HTTP_OK);
				}elseif($register == 4){
					$this->response([
						$this->config->item('rest_status_field_name') => FALSE,
						$this->config->item('rest_message_field_name') => 'Unsecured Password'
					], self::HTTP_OK);
				}else{
					$this->response([
						$this->config->item('rest_status_field_name') => TRUE,
						$this->config->item('rest_message_field_name') => 'Registered Successful'
					], REST_Controller::HTTP_OK);
				}
			}
		}
	}