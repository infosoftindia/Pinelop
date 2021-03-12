<?php

	class Advertise extends MX_Controller{
		
		public function create(){
			allowUser([2]);
			$this->load->model("Advertise_model");
			$data["title"] = "Start New Advertisement";
			$data['allProducts'] = $this->Advertise_model->get_My_Product();
			$this->form_validation->set_rules('campaign_name', 'Name', 'required');
			$this->form_validation->set_rules('product', 'Product', 'required|is_numeric');
			$this->form_validation->set_rules('budget', 'Budget', 'required|is_numeric');
			$this->form_validation->set_rules('days', 'Days', 'required|is_numeric');
			
			if ($this->form_validation->run() === FALSE){
				$data["page"] = $this->load->view("create", $data, true);
				echo modules::run("layouts/layouts/load", $data);
			}else{
				$this->Advertise_model->insert_Advertise();
				save_Activity('Advertisement created successfully');
				$this->session->set_flashdata('success', 'Advertisement has been created successfully. Once we review, it will be live.');
				redirect('advertise/create');
			}
		}
		
		public function completed(){
			allowUser([2]);
			$this->load->model("Advertise_model");
			$data["title"] = "My Ads";
			$data['advertises'] = $this->Advertise_model->listingMyAds();
			$data["page"] = $this->load->view("manage", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
		public function view($id){
			allowUser([2]);
			$this->load->model("Advertise_model");
			$data["title"] = "My Ads Details";
			$data['advertise'] = $this->Advertise_model->listingMyAds($id);
			$data["page"] = $this->load->view("view", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
	}
	
	
	
	
	
	
	

	