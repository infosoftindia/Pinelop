<?php

	class Testimonials_model extends CI_Model{
		
		public function create_Db(){
			$table = 'testimonials';
			$fields = array(
				'testimonials_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'testimonials_name' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'testimonials_image' => array(
					'type' =>'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
				),
				'testimonials_message' => array(
					'type' =>'TEXT',
				),
				'testimonials_status' => array(
					'type' => 'INT',
					'constraint' => '11',
					'default' => 1
				),
			);
			createTable($table, $fields);
		}

		public function get_All_Testimonials($id = FALSE){
			$this->create_Db();
			if($id){
				$this->db->where('testimonials_id', $id);
				return $this->db->get('testimonials')->row_array();
			}
			$this->db->order_by('testimonials_id', 'DESC');
			return $this->db->get('testimonials')->result_array();
		}

		public function add_New_Testimonial($image){
			$this->create_Db();
			$this->db->insert('testimonials', [
				'testimonials_name' => $this->input->post('name'),
				'testimonials_image' => $image,
				'testimonials_message' => $this->input->post('message'),
				'testimonials_status' => 1,
				'testimonials_created' => now(),
			]);
		}

		public function edit_Testimonial($id, $image = FALSE){
			$this->create_Db();
			if(!$image){
				$image = $this->input->post('old_Picture');
			}
			$this->db->where('testimonials_id', $id)->update('testimonials', [
				'testimonials_name' => $this->input->post('name'),
				'testimonials_image' => $image,
				'testimonials_message' => $this->input->post('message')
			]);
		}
	}