<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends MX_Controller
{

	public function manage()
	{
		allowUser([2, 121]);
		$data['title'] = 'Manage Products';
		$data['page'] = $this->load->view('manage', false, true);
		echo modules::run('layouts/layouts/load', $data);
	}

	public function getField()
	{
		allowUser([2, 121]);
		$cat = $this->input->post('cat');
		foreach ($cat as $c) {
			if ($c == 12) {
				echo 'dsgas';
			}
		}
	}

	public function json()
	{
		allowUser([2, 121]);
		$this->load->model('Products_model');
		$this->load->model('Basic_model');
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$gets = $this->Products_model->listing(FALSE, 1);
		$data = array();
		$count = 1;
		foreach ($gets as $get) {
			$tt = ($get['products_featured'] == 1) ? ' <span>Featured</span>' : '';
			$data[] = array(
				$count++,
				$get['posts_title'] . $tt,
				$get['products_sku'],
				$get['products_stock'],
				($get['posts_status'] == 1) ? 'Active' : 'Inactive',
				'<div class="btn-group">
					<a href="' . base_url('products/edit/' . $get['posts_id']) . '" class="btn btn-info"><span class="icon-edit"></span></a>
			    	<a href="javascript:;" onclick="deletes(\'' . base_url('products/delete_product/' . $get['posts_id']) . '\')" class="btn btn-danger"><span class="icon-trash"></span></a>
				</div>'
			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => count($gets),
			"recordsFiltered" => count($gets),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}

	public function delete_product($id)
	{
		$this->db->where('posts_id', $id);
		$this->db->delete('posts');
		$this->db->where('products_post', $id);
		$this->db->delete('products');
		save_Activity('Delete product');
		redirect('products/manage');
	}

	public function create()
	{
		allowUser([2, 121]);
		$this->load->model('Products_model');
		$this->form_validation->set_rules('title', 'Product Name', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('short_desc', 'Short Description', 'required|min_length[10]|max_length[100]');
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[25]');
		$this->form_validation->set_rules('sku', 'SKU (Store Keeping Unit)', 'required|min_length[1]|max_length[25]');
		$this->form_validation->set_rules('quantity', 'Quantity', 'required|is_numeric|min_length[1]');
		$this->form_validation->set_rules('price', 'Regular Price', 'required|is_numeric|min_length[1]');
		$this->form_validation->set_rules('sale_price', 'Sale Price', 'is_numeric|min_length[1]');
		if ($this->form_validation->run() === FALSE) {
			$data['surface'] = $this->Products_model->surface();
			$data['grade'] = $this->Products_model->grade();
			$data['categories'] = $this->Products_model->categories();
			$data['brands'] = $this->Products_model->brands();
			$data['thumbnail'] = base_url(getenv('uploads') . 'temp.png');
			$data['title'] = 'New Product';
			$data['page'] = $this->load->view('create', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_New_Product();
		}
	}

	public function save_New_Product()
	{
		allowUser([2, 121]);
		$this->load->model('Products_model');
		$this->load->model('Basic_model');
		if ($_FILES['userfile']['name']) {
			$image = doUpload();
		} else {
			$image = "default.png";
		}
		$slug = makeSlug($this->input->post('title'));
		$galleries = $this->Basic_model->uploadMultipleImage('userfiles');
		$insert = $this->Products_model->insert($image, $slug, $galleries);
		save_Activity('New product Added');
		redirect(admin_url() . 'products/edit/' . $insert);
	}

	public function edit($id)
	{
		allowUser([2, 121]);
		$this->load->model('Products_model');
		$this->form_validation->set_rules('title', 'Product Name', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('short_desc', 'Short Description', 'required|min_length[10]|max_length[100]');
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[25]');
		$this->form_validation->set_rules('tags', 'Tags', 'min_length[1]');
		$this->form_validation->set_rules('sku', 'SKU (Store Keeping Unit)', 'required|min_length[1]|max_length[25]');
		$this->form_validation->set_rules('quantity', 'Quantity', 'required|is_numeric|min_length[1]');
		$this->form_validation->set_rules('price', 'Regular Price', 'required|is_numeric|min_length[1]');
		$this->form_validation->set_rules('sale_price', 'Sale Price', 'is_numeric|min_length[1]');

		if ($this->form_validation->run() === FALSE) {
			echo validation_errors();
			$data['categories'] = $this->Products_model->categories();
			$data['brands'] = $this->Products_model->brands();
			$data['products'] = $this->Products_model->listing();
			$data['product'] = $this->Products_model->listing($id);
			$data['thumbnail'] = base_url(getenv('uploads') . $data['product']['posts_cover']);
			$data['title'] = 'Edit Product';
			$data['page'] = $this->load->view('edit', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			// print_r($_FILES);
			// die;
			$this->edit_Product($id);
		}
	}

	public function edit_Image($id)
	{
		$image = $this->input->get('image');
		$this->db->where('products_gallery_image', $image)->delete('products_gallery');
		deleteUpload($image);
		redirect(admin_url('products/edit/' . $id));
	}

	public function edit_Product($id)
	{
		allowUser([2, 121]);
		$this->load->model('Products_model');
		$this->load->model('Basic_model');
		if ($_FILES['userfile']['name']) {
			$image = doUpload();
			deleteUpload($this->input->post('old_Picture'));
		} else {
			$image = $this->input->post('old_Picture');
		}
		$slug = makeSlug($this->input->post('title'), $id);
		$this->Products_model->update($id, $image, $slug);
		$files = $this->Basic_model->uploadMultipleImage('userfiles');
		$this->Products_model->multipleImages($id, $files);
		save_Activity('Product updated');
		redirect(admin_url() . 'products/edit/' . $id);
	}


	public function categories()
	{
		allowUser([121]);
		$this->form_validation->set_rules('name', 'Category Name', 'required|min_length[1]|max_length[100]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->model('Products_model');
			$data['parent_cat'] = $this->Products_model->parent_cat();
			$data['categories'] = $this->Products_model->categories();
			$data['surfaces'] = $this->Products_model->surface();
			$data['title'] = 'Product Categories';
			$data['page'] = $this->load->view('categories', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_New_Category();
		}
	}

	public function save_New_Category()
	{
		allowUser([121]);
		$this->load->model('Products_model');
		$slug = make_Cat_Slug($this->input->post('name'));
		if ($_FILES['userfile']['name']) {
			$image = doUpload('userfile');
		} else {
			$image = "default.png";
		}
		$insert = $this->Products_model->insert_Category($slug, $image);
		save_Activity('New category Added');
		redirect(admin_url() . 'products/categories');
	}

	public function edit_category($id)
	{
		allowUser([121]);
		$this->load->model('Products_model');
		$data['categories'] = $this->Products_model->parent_cat();
		$data['category'] = $this->Products_model->categories($id);
		$data['surfaces'] = $this->Products_model->surface();
		$this->load->view('edit_category', $data);
	}

	public function update_Category($id)
	{
		allowUser([2, 121]);
		$this->load->model('Products_model');
		$this->load->model('Basic_model');
		if ($_FILES['userfile']['name']) {
			$image = doUpload();
			deleteUpload($this->input->post('old_Picture'));
		} else {
			$image = $this->input->post('old_Picture');
		}
		$this->Products_model->update_Category($id, $image);
		save_Activity('Product updated');
		redirect(admin_url() . 'products/categories');
	}

	public function delete_category($id)
	{
		allowUser([121]);
		$this->load->model('Products_model');
		$this->Products_model->delete_Categories($id);
		save_Activity('Category Deleted');
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function attributes($id)
	{
		allowUser([121]);
		$this->load->model('Products_model');
		$this->form_validation->set_rules('name', 'Attributes Name', 'required|min_length[2]|max_length[100]');
		if ($this->form_validation->run() === FALSE) {
			$data['attributes'] = $this->Products_model->attributes($id);
			// $data['variant'] = $this->Products_model->variants();
			$data['title'] = 'Add Attributes';
			$data['page'] = $this->load->view('attributes', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->Products_model->add_Attribute($id);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function edit_Attributes($id)
	{
		allowUser([2, 121]);
		$this->load->model('Products_model');
		$this->form_validation->set_rules('title', 'Attributes Name', 'required|min_length[5]|max_length[100]');
		if ($this->form_validation->run() === FALSE) {
			echo validation_errors();
			$data['attributes'] = $this->Products_model->attributes($id);
			$data['title'] = 'Edit Attributes';
			$data['page'] = $this->load->view('edit-attribute', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->Products_model->update_Attribute($id);
			redirect(admin_url() . 'products/edit-attributes/' . $id);
		}
	}

	public function add_Variant($id)
	{
		allowUser([2, 121]);
		$this->load->model('Products_model');
		$this->form_validation->set_rules('price', 'Price', 'is_numeric|min_length[1]');
		if ($this->form_validation->run() === FALSE) {
			echo validation_errors();
			$data['attributes'] = $this->Products_model->attributes($id);
			$data['variant'] = $this->Products_model->variants($id);
			$data['title'] = 'Add Variant';
			$data['page'] = $this->load->view('edit-attribute', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			if ($_FILES['userfile']['name']) {
				$image = doUpload();
				deleteUpload($this->input->post('old_Picture'));
			} else {
				$image = $this->input->post('old_Picture');
			}
			$this->Products_model->add_Variant($id, $image);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function new_Variant($id)
	{
		allowUser([2, 121]);
		$this->load->model('Products_model');
		if ($_FILES['userfile']['name']) {
			$image = doUpload();
		} else {
			$image = '';
		}
		$this->Products_model->new_Variant($id, $image);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_Attributes($id)
	{
		allowUser([121]);
		$this->load->model('Products_model');
		$this->Products_model->delete_Attributes($id);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_Variant($id)
	{
		allowUser([121]);
		$this->load->model('Products_model');
		$this->Products_model->delete_Variant($id);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_Variant_Image($id)
	{
		allowUser([121]);
		$data = array(
			'product_variables_image' => 'default.png',
		);
		$this->db->where('product_variables_id', $id);
		$this->db->update('product_variables', $data);
		redirect($_SERVER['HTTP_REFERER']);
	}




	public function return_Categories()
	{
		$this->load->model('Products_model');
		return $this->Products_model->categories();
	}

	public function return_Products()
	{
		$this->load->model('Products_model');
		return $this->Products_model->listing();
	}



	// public function surface(){
	// allowUser([121]);
	// $this->form_validation->set_rules('name', 'Surface Name', 'required|min_length[1]|max_length[100]');

	// if ($this->form_validation->run() === FALSE){
	// $this->load->model('Products_model');
	// $data['categories'] = $this->Products_model->surface();
	// $data['title'] = 'Product Surface';
	// $data['page'] = $this->load->view('surface', $data, true);
	// echo modules::run('layouts/layouts/load', $data);
	// } else {
	// $this->save_New_Surface();
	// }
	// }

	// public function save_New_Surface(){
	// allowUser([121]);
	// $this->load->model('Products_model');
	// $slug = make_Cat_Slug($this->input->post('name'));
	// $insert = $this->Products_model->insert_Surface($slug);
	// save_Activity('New Surface Added');
	// redirect('products/surface');
	// }

	// public function update_Surface($id){
	// allowUser([2, 121]);
	// $this->load->model('Products_model');
	// $this->load->model('Basic_model');
	// if($_FILES['userfile']['name']){
	// $image = doUpload();
	// deleteUpload($this->input->post('old_Picture'));
	// }else{
	// $image = $this->input->post('old_Picture');
	// }
	// $this->Products_model->update_Category($id, $image);
	// save_Activity('Surface updated');
	// redirect('products/surface');
	// }

	// public function edit_Surface($id){
	// allowUser([121]);
	// $this->load->model('Products_model');
	// $data['category'] = $this->Products_model->surface($id);
	// $this->load->view('edit_surface', $data);
	// }

	// public function grade(){
	// allowUser([121]);
	// $this->form_validation->set_rules('name', 'Grade Title', 'required|min_length[1]|max_length[100]');

	// if ($this->form_validation->run() === FALSE){
	// $this->load->model('Products_model');
	// $data['categories'] = $this->Products_model->grade();
	// $data['title'] = 'Product Grade';
	// $data['page'] = $this->load->view('grade', $data, true);
	// echo modules::run('layouts/layouts/load', $data);
	// } else {
	// $this->save_New_Grade();
	// }
	// }

	// public function save_New_Grade(){
	// allowUser([121]);
	// $this->load->model('Products_model');
	// $slug = make_Cat_Slug($this->input->post('name'));
	// $insert = $this->Products_model->insert_Grade($slug);
	// save_Activity('New Grade Added');
	// redirect('products/grade');
	// }

	// public function update_Grade($id){
	// allowUser([2, 121]);
	// $this->load->model('Products_model');
	// $this->load->model('Basic_model');
	// if($_FILES['userfile']['name']){
	// $image = doUpload();
	// deleteUpload($this->input->post('old_Picture'));
	// }else{
	// $image = $this->input->post('old_Picture');
	// }
	// $this->Products_model->update_Category($id, $image);
	// save_Activity('Grade updated');
	// redirect('products/grade');
	// }



	// public function edit_grade($id){
	// allowUser([121]);
	// $this->load->model('Products_model');
	// $data['category'] = $this->Products_model->grade($id);
	// $this->load->view('edit_grade', $data);
	// }






	// public function returnSurfaceWithCategory($limit = FALSE){
	// $data = [];
	// $this->load->model('Products_model');
	// $surfaces = $this->Products_model->surface();
	// if($surfaces){
	// foreach($surfaces as $surface){
	// $this->db->order_by('categories_id', 'ASC');
	// $this->db->like('categories_parent', $surface['categories_id']);
	// $surface['categories'] = $this->db->get('categories')->result_array();
	// $data[] = $surface;
	// }
	// }
	// return $data;
	// }
}











/**
		$specificationCount = count($this->input->post('specifications_title'));
		for($i = 0; $i < $specificationCount; $i++){
			if($_POST['specifications_title'][$i] != ""){
				$data = array(
					'specification_post' => $insert,
					'specification_title' => $_POST['specifications_title'][$i],
					'specification_description' => $_POST['specifications_description'][$i]
				);
				$this->db->insert('specification', $data);
			}
		}
 **/
