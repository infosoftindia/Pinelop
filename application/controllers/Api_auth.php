<?php

	class Api_auth extends CI_Controller  {

		public function __construct() {
			parent::__construct();
			// $this->load->model("Api_model");
		}

		public function _perform_library_auth($email, $password){
			
			$this->response($users, REST_Controller::HTTP_UNAUTHORIZED);
		}
	}