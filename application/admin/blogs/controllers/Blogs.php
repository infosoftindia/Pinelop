<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends MX_Controller {

	public function manage(){
        allowUser([121]);		
	    $this->load->model('Blogs_model');
		$data['title'] = 'Manage Blog';
		$data['blogs'] = $this->Blogs_model->listing();
		$data['page'] = $this->load->view('manage', $data, true);
		echo modules::run('layouts/layouts/load', $data);
	}

	public function create(){
		allowUser([121]);
		$this->load->model('Blogs_model');
		$this->form_validation->set_rules('title', 'Blogs Title', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[10]');

		if ($this->form_validation->run() === FALSE){
			$data['thumbnail'] = base_url(getenv('uploads').'temp.png');
			$data['title'] = 'New Blogs';
			$data['page'] = $this->load->view('create', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_new_testimonial();
		}
	}
	public function save_new_testimonial(){
		allowUser([121]);
		$image = doUpload();
		$slug = makeSlug($this->input->post('title'));
		$insert = $this->Blogs_model->insert($image,$slug );
		redirect('blogs/edit/'.$insert, ['msg', 'Blogs added successfully']);
	}
	
	public function edit($id){
		allowUser([121]);
		$this->load->model('Blogs_model');
		$this->form_validation->set_rules('title', 'Blogs Title', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[10]');

		if ($this->form_validation->run() === FALSE){
			$data['title'] = 'Edit Blogs';
			$data['blogs'] = $this->Blogs_model->single_Blog($id);
			$data['thumbnail'] = base_url(getenv('uploads').$data['blogs']['posts_cover']);
			$data['page'] = $this->load->view('edit', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->edit_Blog($id);
		}
	}

	

	public function edit_Blog($id){
		allowUser([121]);
		$this->load->model('Blogs_model');
		if($_FILES['userfile']['name']){
			$image = doUpload();
		}else{
			$image = $this->input->post('old_Picture');
		}
		
		$this->Blogs_model->update($id, $image);
		redirect('blogs/edit/'.$id, ['msg', 'Blog modified successfully']);
	}

	public function delete($id){
		allowUser([121]);
		$this->load->model('Blogs_model');
		$this->Blogs_model->delete($id);
		redirect($_SERVER['HTTP_REFERER'], ['msg', 'Blog has been successfully deleted']);
	}

	
}




















