<?php

	class Sliders extends MX_Controller{
		
		public function manage(){
			allowUser([121]);
			$this->load->model("Sliders_model");
			$data["title"] = "Sliders";
			$data["sliders"] = $this->Sliders_model->get_All_Sliders();
			$data["page"] = $this->load->view("manage", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
		public function add(){
			allowUser([121]);
			$this->load->model("Sliders_model");
			$data['categories'] = modules::run("products/products/return_Categories");
			$this->load->view("add_new", $data);
		}
		
		public function add_slider(){
			allowUser([121]);
			$this->load->model("Sliders_model");
			$image = doUpload();
			$this->Sliders_model->add_New_Slider($image);
			save_Activity('New Slider Added');
			redirect(admin_url().'sliders/manage');
		}
		
		public function edit($id){
			allowUser([121]);
			$this->load->model("Sliders_model");
			$data['categories'] = modules::run("products/products/return_Categories");
			$data["slider"] = $this->Sliders_model->get_All_Sliders($id);
			$this->load->view("edit", $data);
		}
		
		public function edit_slider($id){
			allowUser([121]);
			$this->load->model("Sliders_model");
			$image = doUpload();
			$this->Sliders_model->edit_Slider($id, $image);
			save_Activity('Slider was updated');
			redirect(admin_url().'sliders/manage');
		}
		
		public function delete($id){
			allowUser([121]);
			$this->load->model("Sliders_model");
			$this->Sliders_model->delete_Sliders($id);
			save_Activity('Slider was deleted');
			redirect(admin_url().'sliders/manage');
		}
	}