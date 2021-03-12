<?php
	class Blogs_model extends CI_Model{
		
		public function listing(){
			$this->db->order_by('posts_id', 'DESC');
			$this->db->where('posts_type', 'blog');
			$this->db->join('blogs', 'blogs_post = posts_id', 'left');
			$this->db->join('users', 'posts_author = users_id', 'left');
			return $this->db->get('posts')->result_array();
		}
		public function single_Blog($id){
			$this->db->where('posts_id', $id);
			$this->db->where('posts_type', 'blog');
			$this->db->join('blogs', 'blogs_post = posts_id', 'left');
			$this->db->join('users', 'posts_author = users_id', 'left');
			$post = $this->db->get('posts')->row_array();	
			return $post;
		}
		
		public function insert($image, $slug){			
			$this->db->insert('posts', [
				'posts_title' => $this->input->post('title'),
				'posts_slug' => $slug,
				'posts_author' => '1',
				'posts_cover' => $image,
				'posts_type' => 'blog',
				'posts_status' => $this->input->post('status'),
				'posts_created' => now(),
			]);
			$post = $this->db->insert_id();
			
			$this->db->insert('blogs', [
				'blogs_post' => $post,
				'blogs_description' => $this->input->post('description'),
			]);
			return $post;
		}
		
		public function update($id, $image){
		   $slug =  makeSlug($this->input->post('title'), $id);
			$this->db->where('posts_id', $id)->update('posts', [
				'posts_title' => $this->input->post('title'),
				'posts_slug' => $slug,
				'posts_cover' => $image,
				'posts_status' => $this->input->post('status'),
			]);
			
			
			$this->db->where('blogs_post', $id);
			$this->db->update('blogs', [
				'blogs_description' => $this->input->post('description'),
			]);				
			return $id;
		}

		public function delete($id){
			$this->db->where('blogs_post', $id);
			$this->db->delete('blogs');
			
			$this->db->where('posts_id', $id);
			$this->db->delete('posts');
		}
		
		
		
		
		
	}