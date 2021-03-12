<?php

	class Sales extends MX_Controller{
		
		public function report(){
			allowUser([2]);
			$this->load->model("Sales_model");
			// $data['orders'] = $this->Sales_model->listing();
			
			// Code here
			$data["title"] = "All Orders";
			$data["page"] = $this->load->view("manage", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
		public function monthly(){
			allowUser([2]);
			$this->load->model("Sales_model");
			$month = $this->input->get('month');
			$year = $this->input->get('year');
			$data['orders'] = $this->Sales_model->monthly_Sale($month, $year);
			$data["title"] = "View Monthly Report";
			$data["page"] = $this->load->view("monthly", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
		public function yearly(){
			allowUser([2]);
			$this->load->model("Sales_model");
			$year = $this->input->get('year');
			$data['orders'] = $this->Sales_model->yearly_Sale($year);
			$data['years_Array'] = $this->Sales_model->yearly_Sale_Products($year);
			// print_r($data['years']);die;
			$data["title"] = "View Monthly Report";
			$data["page"] = $this->load->view("yearly", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
		
		
	}
	


