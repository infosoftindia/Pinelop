<?php

	class Widgets_model extends CI_Model{
		
		public function save_Brand($image){
			$this->db->insert('brands', [
				'brands_image' => $image,
				'brands_url' => $this->input->post('url_link')
			]);
		}

		public function get_Brands(){
			return $this->db->get('brands')->result_array();
		}

		public function delete_Brand($image){
			if(file_exists(getenv('uploads').$image)){
				unlink(getenv('uploads').$image);
			}
			$this->db->where('brands_image', $image)->delete('brands');
		}

		public function get_Menus(){
			return $this->db->get('menus')->result_array();
		}
		
		public function save_Menu(){
			$this->db->insert('menus', [
				'menus_title' => $this->input->post('title'),
				'menus_url' => $this->input->post('url'),
			]);
			$insert_id = $this->db->insert_id();
			for($id=1; $id<=4; $id++){
				$this->db->where('menus_id', $insert_id);
				$this->db->update('menus', [
					'menus_title_'.$id => $this->input->post('title_'.$id),
					'menus_url_'.$id => $this->input->post('url_'.$id),
					'menus_navigation_'.$id => $this->input->post('navigation_'.$id),
				]);
			}
		}
		
		public function update_Menu(){
			$id = $this->input->post('id');
			for($i=0; $i<count($id); $i++){
				$this->db->where('menus_id', $id[$i]);
				$this->db->update('menus', [
					'menus_title' => $this->input->post('title')[$i],
					'menus_url' => $this->input->post('url')[$i],
					'menus_sort' => $this->input->post('sort')[$i],
					'menus_hide' => $this->input->post('is_hidden')[$i],
				]);
				for($j=1; $j<=4; $j++){
					$this->db->where('menus_id', $id[$i]);
					$this->db->update('menus', [
						'menus_title_'.$j => $this->input->post('title_'.$j)[$i],
						'menus_url_'.$j => $this->input->post('url_'.$j)[$i],
						'menus_navigation_'.$j => $this->input->post('navigation_'.$j)[$i],
					]);
				}
			}
		}
	}