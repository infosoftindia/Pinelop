<?php

	class Payments extends MX_Controller{
		
		public function manage(){
			allowUser([2]);
			$this->load->model("Payments_model");
			$data['payments'] = $this->Payments_model->list_Payment_History();
			// Code here
			$data["title"] = "Vendor Payment";
			$data["page"] = $this->load->view("manage", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
		
		public function new_Payment(){
			allowUser([2]);
			$this->load->model("Payments_model");
			$this->Payments_model->request_Payment();
			save_Activity('Payment was requested');
			redirect('payments/manage');
		}	
	
	
	}