<?php

	require APPPATH . 'libraries/REST_Controller.php';

	class Prc extends Rest_Controller  {

		public $api;
		
		public function __construct() {
			parent::__construct();
			// $this->load->model("Api_model");
			$this->api = self::auth_User($this->input->server('HTTP_APIKEY'));
		}

		public function index_get(){
			if($this->api){
				$users = [
					['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
					['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
				];
				$this->response($users, REST_Controller::HTTP_OK);
			}
		}
	}