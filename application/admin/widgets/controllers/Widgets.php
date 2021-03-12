<?php

	class Widgets extends MX_Controller{
		
		public function manage(){
			$this->load->model("Widgets_model");
			$data["title"] = "Widgets";
			$data["page"] = $this->load->view("manage", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}
		
		public function get_partials($partial){
			$this->load->model("Widgets_model");
			$data["title"] = "Widgets";
			$data["brands"] = $this->Widgets_model->get_Brands();
			$data["menus"] = $this->Widgets_model->get_Menus();
			$this->load->view('partials/' . $partial, $data);
		}
		
		public function save_menu(){
			$this->load->model("Widgets_model");
			$this->Widgets_model->save_Menu();
			echo 1;
		}
		
		public function update_menu(){
			$this->load->model("Widgets_model");
			$this->Widgets_model->update_Menu();
			echo 1;
		}
		
		public function save_brand_video(){
			saveMeta('brand_video', $this->input->post('video'), 'brand');
			saveMeta('brand_heading', $this->input->post('heading'), 'brand');
			saveMeta('brand_description', $this->input->post('description'), 'brand');
			saveMeta('brand_name', $this->input->post('name'), 'brand');
			saveMeta('brand_date', $this->input->post('date'), 'brand');
			saveMeta('brand_btn_label', $this->input->post('btn_label'), 'brand');
			saveMeta('brand_btn_link', $this->input->post('btn_link'), 'brand');
			echo 1;
		}
		
		public function save_brands(){
			$this->load->model("Widgets_model");
			$image = doUpload();
			$this->Widgets_model->save_Brand($image);
			echo 1;
		}
		
		public function delete_brand($image){
			$this->load->model("Widgets_model");
			$this->Widgets_model->delete_Brand($image);
			echo 1;
		}
		
		public function save_footer_nav(){
			for($i=1; $i<=3; $i++){
				saveMeta('footer_navigation_'.$i, $this->input->post('navigation_'.$i), 'navigation');
			}
			echo 1;
		}
		
		public function save_footer_promo(){
			if($_FILES['userfile']['name']){
				if(file_exists(getenv('uploads').getMeta('footer_promo_img', 'footer'))){
					unlink(getenv('uploads').getMeta('footer_promo_img', 'footer'));
				}
				$image = doUpload();
				saveMeta('footer_promo_img', $image, 'footer');
			}
			saveMeta('footer_promo_title', $this->input->post('title'), 'footer');
			saveMeta('footer_promo_sub_title', $this->input->post('sub_title'), 'footer');
			saveMeta('footer_promo_link', $this->input->post('url_link'), 'footer');
			echo 1;
		}
		
		public function save_footer_address(){
			saveMeta('footer_address', $this->input->post('address'), 'footer');
			saveMeta('footer_phone', $this->input->post('phone'), 'footer');
			saveMeta('footer_email', $this->input->post('email'), 'footer');
			echo 1;
		}
		
		public function list_brands(){
			$this->load->model("Widgets_model");
			return $this->Widgets_model->get_Brands();
		}
		
		public function list_menus(){
			$this->load->model("Widgets_model");
			return $this->Widgets_model->get_Menus();
		}
	}