<?php

	class Contacts extends MX_Controller{
		
		public function manage(){
			allowUser([121]);
			$this->load->model("Contacts_model");
			$data["title"] = "Contacts Data";
			$data["contacts"] = $this->Contacts_model->get_All_Contacts();
			$data["page"] = $this->load->view("manage", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
		public function view($id){
			allowUser([121]);
			$this->load->model("Contacts_model");
			$data["contact"] = $this->Contacts_model->get_All_Contacts($id);
			save_Activity('Contact viewed');
			$this->Contacts_model->mark_As_Read($id);
			$this->load->view("view", $data);
		}
	}