<?php

	class Sliders_model extends CI_Model{
		
		public function create_Db(){
			$table = 'sliders';
			$fields = array(
				'sliders_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'sliders_image' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
				),
				'sliders_title' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'sliders_description' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
				'sliders_category' => array(
					'type' =>'INT',
					'constraint' => '11',
				),
				'sliders_sort' => array(
					'type' =>'INT',
					'constraint' => '11',
				),
				'sliders_status' => array(
					'type' => 'INT',
					'constraint' => '11',
					'default' => 1
				),
			);
			createTable($table, $fields);
		}
		
		public function get_All_Sliders($id = FALSE){
			$this->create_Db();
			if($id){
				$this->db->where('sliders_id', $id);
				return $this->db->get('sliders')->row_array();
			}
			$this->db->order_by('sliders_id', 'DESC');
			return $this->db->get('sliders')->result_array();
		}
		
		public function add_New_Slider($image){
			$this->create_Db();
			return $this->db->insert('sliders', [
				'sliders_image' => $image,
				'sliders_title' => $this->input->post('title'),
				'sliders_description' => $this->input->post('description'),
				'sliders_category' => $this->input->post('category'),
				'sliders_sort' => $this->input->post('sort'),
				'sliders_status' => $this->input->post('status'),
				'sliders_created' => now(),
			]);
		}
		
		public function edit_Slider($id, $image = FALSE){
			$this->create_Db();
			if(!$image){
				$image = $this->input->post('old_Picture');
			}
			$this->db->where('sliders_id', $id)->update('sliders', [
				'sliders_image' => $image,
				'sliders_title' => $this->input->post('title'),
				'sliders_description' => $this->input->post('description'),
				'sliders_category' => $this->input->post('category'),
				'sliders_sort' => $this->input->post('sort'),
				'sliders_status' => $this->input->post('status'),
			]);
		}
		
		public function delete_Sliders($id){
			$this->create_Db();
			$this->db->where('sliders_id', $id);
			$row = $this->db->get('sliders')->row_array();
			if(file_exists('./'.getenv('uploads').$row['sliders_image'])){
				unlink('./'.getenv('uploads').$row['sliders_image']);
			}
			$this->db->where('sliders_id', $id);
			$this->db->delete('sliders');
		}
	}