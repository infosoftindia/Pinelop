<?php

	class Users extends MX_Controller{
		
		public function create(){
			allowUser([121]);
			$this->load->model('Users_model');
			$this->form_validation->set_rules('fname', 'User Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.users_email]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[10]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
			if ($this->form_validation->run() === FALSE){
				$data['title'] = 'New User';
				$data['page'] = $this->load->view('create', $data, true);
				echo modules::run('layouts/layouts/load', $data);
			} else {
				$this->save_New_User();
			}
		}
		public function save_New_User(){
			allowUser([121]);
			$this->load->model('Users_model');
			$insert = $this->Users_model->insert_User();
			save_Activity('New User Added');
			redirect(admin_url().'users/manage');
		}
		
		public function manage(){
			allowUser([121]);
			$this->load->model("Users_model");
			$data['users'] = $this->Users_model->all_User();
			// Code here
			$data["title"] = "All Users";
			$data["page"] = $this->load->view("manage", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
		public function view($id){
			allowUser([121]);
			$this->load->model("Users_model");
			$data['user'] = $this->Users_model->all_User($id);
			$this->load->view("view", $data);
		}
		
		public function status($id, $status){
			allowUser([121]);
			$this->load->model("Users_model");
			$data['users'] = $this->Users_model->changeStatus($id, $status);
			save_Activity('Change the status of user');
			redirect($this->input->get('redirect'));
		}
		
		
		
	}




