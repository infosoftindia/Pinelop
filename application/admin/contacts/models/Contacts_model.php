<?php

	class Contacts_model extends CI_Model{
		
		public function get_All_Contacts($id = FALSE){
			if($id){
				$this->db->where('contacts_id', $id);
				return $this->db->get('contacts')->row_array();
			}
			$this->db->order_by('contacts_id', 'DESC');
			return $this->db->get('contacts')->result_array();
		}
		
		public function mark_As_Read($id){
			$this->db->where('contacts_id', $id)->update('contacts', [
				'contacts_status' => 1
			]);
		}
	}