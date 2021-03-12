<?php

	class Testimonials extends MX_Controller{
		
		public function manage(){
			allowUser([121]);
			$this->load->model("Testimonials_model");
			// Code here
			$data["title"] = "Manage Testimonials";
			$data["testimonials"] = $this->Testimonials_model->get_All_Testimonials();
			$data["page"] = $this->load->view("manage", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
		public function add_testimonial(){
			allowUser([121]);
			$this->load->model("Testimonials_model");
			$image = doUpload();
			$this->Testimonials_model->add_New_Testimonial($image);
			save_Activity('New Testimonial Added');
			redirect(admin_url().'testimonials/manage');
		}
		
		public function edit_testimonial($id){
			allowUser([121]);
			$this->load->model("Testimonials_model");
			$image = doUpload();
			$this->Testimonials_model->edit_Testimonial($id, $image);
			save_Activity('Testimonial updated');
			redirect(admin_url().'testimonials/manage');
		}
		
		public function add(){
			allowUser([121]);
			$this->load->view("add_new");
		}
		
		public function edit($id){
			allowUser([121]);
			$this->load->model("Testimonials_model");
			$data["testimonial"] = $this->Testimonials_model->get_All_Testimonials($id);
			$this->load->view("edit", $data);
		}
		
		public function delete_testimonial($id){
			allowUser([121]);
			$this->db->where('testimonials_id', $id);
			$this->db->delete('testimonials');
			save_Activity('Testimonial Deleted');
			redirect(admin_url().'testimonials/manage');
		}
	}