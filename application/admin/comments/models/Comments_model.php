<?php

class Comments_model extends CI_Model{
	
	public function get_All_Comments($id = FALSE){
		if($id){
			$this->db->where('comments_id', $id);
			$this->db->order_by('comments_id', 'desc');
			$this->db->join('posts', 'posts_id = comments_post', 'left');
			return $this->db->get('comments')->row_array();
		}
		$this->db->order_by('comments_id', 'desc');
		$this->db->join('posts', 'posts_id = comments_post', 'left');
		return $this->db->get('comments')->result_array();
	}
	
	public function approve_Comment($id){
		$this->db->where('comments_id', $id);
		return $this->db->update('comments', [ 'comments_status' => '1' ]);
	}
	
	public function delete_Comment($id){
		$this->db->where('comments_id', $id);
		return $this->db->delete('comments');
	}
}