<?php

	class Vendors extends MX_Controller{
		
		public function index(){
			allowUser([121]);
			$this->load->model("Vendors_model");
			// Code here
			$data["title"] = "Page_Title";
			$data["page"] = $this->load->view("view", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
		public function manage(){
			allowUser([121]);
			$this->load->model("Vendors_model");
			$data["vendors"] = $this->Vendors_model->listing();
			
			$data["title"] = "Manage Vendors";
			$data["page"] = $this->load->view("manage", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
		public function view($id){
			allowUser([121]);
			$this->load->model("Vendors_model");
			$data['vendor'] = $this->Vendors_model->listing($id);
			$this->load->view("view", $data);
		}
		
		
		public function request(){
			allowUser([121]);
			$this->load->model("Vendors_model");
			$data["vendors"] = $this->Vendors_model->RequestListing();
			// Code here
			$data["title"] = "Page_Title";
			$data["page"] = $this->load->view("request", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
		
		public function status($id, $status){
			allowUser([121]);
			$this->load->model("Vendors_model");
			$data['users'] = $this->Vendors_model->changeStatus($id, $status);
			save_Activity('Updated the status of vendor');
			redirect($this->input->get('redirect'));
		}
		
		
		
}
	
	
	
	
	
	