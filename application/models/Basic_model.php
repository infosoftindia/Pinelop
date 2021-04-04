<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Basic_model extends CI_Model
{

	private $newScript;

	public function check_Slug_Exist($slug, $postId = FALSE)
	{
		$count = 0;
		$backup = $slug;
		while (true) {
			$this->db->select('posts_slug');
			if ($postId) {
				$this->db->where('posts_id <> ' . $postId);
			}
			$this->db->where('posts_slug', $slug);
			$query = $this->db->get('posts');
			if ($query->num_rows() == 0) break;
			$slug = $backup . '-' . (++$count);
		}
		return $slug;
	}

	public function getCategoriesByType($parent = FALSE)
	{
		if ($parent) {
			$this->db->where('categories_parent', $parent);
		}
		$result = $this->db->get('categories');
		return $result->result_array();
	}

	public function getCatProductCount($catId)
	{
		$this->db->where('products_category_category', $catId);
		return count($this->db->get('products_category')->result_array());
	}

	public function check_Cat_Slug_Exist($slug, $cat_ID = FALSE)
	{
		$count = 0;
		$backup = $slug;
		while (true) {
			$this->db->select('categories_slug');
			if ($cat_ID) {
				$this->db->where('categories_id <> ' . $cat_ID);
			}
			$this->db->where('categories_slug', $slug);
			$query = $this->db->get('categories');
			if ($query->num_rows() == 0) break;
			$slug = $backup . '-' . (++$count);
		}
		return $slug;
	}

	public function deletePostImages($id)
	{
		$this->db->where('images_post', $id);
		$query = $this->db->get('images');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $img) {
				unlink(MyUploads . $img['images_image']);
				$this->db->where('images_id', $img['images_id']);
				$query = $this->db->delete('images');
			}
		}
	}

	public function getCategoryChilds($id)
	{
		$newArray = array();
		array_push($newArray, $id);
		while (true) {
			$this->db->where('categories_parent', $id);
			$query = $this->db->get('categories');
			if ($query->num_rows() == 0) break;
			$childArray = $query->result_array();
			foreach ($childArray as $arr) {
				array_push($newArray, $arr['categories_id']);
				$id = $arr['categories_id'];
			}
		}
		return $newArray;
	}

	public function deleteCategory($id)
	{
		$newArray = $this->getCategoryChilds($id);
		foreach ($newArray as $cat) {
			$this->db->where('categories_id', $cat);
			$query = $this->db->get('categories');
			$array = $query->result_array();
			foreach ($array as $arr) {
				unlink(MyUploads . $arr['categories_icon']);
				$this->db->where('categories_id', $arr['categories_id']);
				$query = $this->db->delete('categories');
				$this->db->where('meta_category', $arr['categories_id']);
				$query = $this->db->delete('categories_meta');
			}
		}
		return $newArray;
	}

	public function countPosts($type)
	{
		if ($type) {
			$this->db->select('*');
			$this->db->from('posts');
			$this->db->where('posts_type', $type);
			return $this->db->get()->num_rows();
		}
		return '0';
	}

	public function getPostsData($slug)
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('posts_slug', $slug);
		return $this->db->get()->row_array();
	}

	public function contactData($id = FALSE)
	{
		$this->db->select('*');
		$this->db->from('contacts');
		$this->db->order_by('contacts_id', 'DESC');
		if ($id) {
			$this->db->where('contacts_id', $id);
			return $this->db->get()->row_array();
		}
		return $this->db->get()->result_array();
	}

	public function allUsers()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('users_id', 'DESC');
		return $this->db->get()->result_array();
	}

	public function allBlogs()
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('posts_type', 'blog');
		$this->db->order_by('posts_id', 'DESC');
		$this->db->join('users', 'posts_author = users_id', 'left');
		return $this->db->get()->result_array();
	}

	public function getCategoriesOfPosts()
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('posts_type', 'blog');
		$this->db->order_by('posts_id', 'DESC');
		$this->db->join('users', 'posts_author = users_id', 'left');
		return $this->db->get()->result_array();
	}

	public function uploadImage($name = FALSE)
	{
		if ($name) {
			if ($_FILES[$name]['name']) {
				$file = $_FILES;
				$ext = new SplFileInfo($file[$name]['name']);
				$ext = $ext->getExtension();

				$_FILES['userfile']['name']			=	$file[$name]['name'];
				$_FILES['userfile']['type']			=	$file[$name]['type'];
				$_FILES['userfile']['tmp_name']		=	$file[$name]['tmp_name'];
				$_FILES['userfile']['error']		=	$file[$name]['error'];
				$_FILES['userfile']['size']			=	$file[$name]['size'];

				$config['upload_path'] = getenv('uploads');
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = TRUE;
				$config['remove_spaces'] = TRUE;
				$filenameis = random_string('alnum', 25) . '.' . $ext;
				$string = preg_replace('/\s+/', '', $filenameis);
				$config['file_name'] = $string;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload()) {
					$errors = array('error' => $this->upload->display_errors());
					return 'temp.png';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$old = $this->input->post('old_' . $name);
					if (!empty($old) && file_exists('./' . getenv('uploads') . $old)) {
						unlink('./' . getenv('uploads') . $old);
					}
					return $string;
				}
			}
		} else {
			if ($_FILES['userfile']['name']) {
				$ext = new SplFileInfo($_FILES['userfile']['name']);
				$ext = $ext->getExtension();
				$config['upload_path'] = getenv('uploads');
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = TRUE;
				$filenameis = random_string('alnum', 25) . '.' . $ext;
				$string = preg_replace('/\s+/', '', $filenameis);
				$config['file_name'] = $string;

				$this->upload->initialize($config);

				if (!$this->upload->do_upload()) {
					$errors = array('error' => $this->upload->display_errors());
					return 'temp.png';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$old = $this->input->post('old_Picture');
					if (!empty($old) && file_exists('./' . getenv('uploads') . $old)) {
						unlink('./' . getenv('uploads') . $old);
					}
					return $string;
				}
			}
		}
		return FALSE;
	}

	public function saveMeta($key, $value, $type = FALSE)
	{
		$data = array(
			'metas_key' => $key,
			'metas_value' => $value,
			'metas_type' => $type,
		);
		$this->db->where('metas_key', $key);
		$query = $this->db->get('metas');
		if ($query->num_rows() > 0) {
			$id = $query->row(0)->metas_id;
			$this->db->where('metas_id', $id);
			$this->db->update('metas', $data);
		} else {
			$this->db->insert('metas', $data);
			return $this->db->insert_id();
		}
	}

	public function getMedia($id, $column = FALSE)
	{
		$this->db->where('uploads_id', $id);
		$query = $this->db->get('uploads');
		if ($query->num_rows() > 0) {
			if ($column) {
				return $query->row(0)->uploads_ . $column;
			} else {
				return $query->row(0)->uploads_name;
			}
		} else {
			return '';
		}
	}

	public function dbMedia($img = FALSE, $id = FALSE, $file = FALSE)
	{
		if ($img) {
			$data = array(
				'uploads_name' => $img,
				'uploads_slug' => $img,
				'uploads_user' => '',
				'uploads_text' => '',
				'uploads_post' => ''
			);
			if ($id) {
				$this->db->where('uploads_id', $id);
				$upload = $this->db->get('uploads');
				if ($upload->num_rows() > 0) {
					$file = $upload->row(0)->uploads_name;
					if (file_exists(getenv('uploads') . $file)) {
						unlink(getenv('uploads') . $file);
					}
				}
				$this->db->where('uploads_id', $id);
				$this->db->update('uploads', $data);
			} elseif ($file) {
				$this->db->where('uploads_name', $file);
				$upload = $this->db->get('uploads');
				if ($upload->num_rows() > 0) {
					$file = $upload->row(0)->uploads_name;
					if (file_exists(getenv('uploads') . $file)) {
						unlink(getenv('uploads') . $file);
					}
				}
				$this->db->where('uploads_name', $file);
				$this->db->update('uploads', $data);

				$this->db->where('uploads_name', $file);
				return $this->db->get('uploads')->row()->uploads_id;
			} else {
				$this->db->insert('uploads', $data);
				return $this->db->insert_id();
			}
		} else {
			return '0';
		}
	}

	public function savePostMeta($post, $key, $value)
	{
		$data = array(
			'post_key' => $key,
			'post_value' => $value,
			'post_posts' => $post,
		);
		$this->db->where('post_key', $key);
		$this->db->where('post_posts', $post);
		$query = $this->db->get('post_metas');
		if ($query->num_rows() > 0) {
			$id = $query->row(0)->post_id;
			$this->db->where('post_id', $id);
			$this->db->update('post_metas', $data);
		} else {
			$this->db->insert('post_metas', $data);
			return $this->db->insert_id();
		}
	}

	public function getPostMeta($post, $key)
	{
		$this->db->where('post_key', $key);
		$this->db->where('post_posts', $post);
		$query = $this->db->get('post_metas');
		if ($query->num_rows() > 0) {
			return $query->row(0)->post_value;
		} else {
			return '';
		}
	}

	public function uploadMultipleImage($name)
	{
		$images = [];
		$loop = count($_FILES[$name]['name']);
		$files = $_FILES;
		$config['upload_path'] = getenv('uploads');
		$config['allowed_types'] = '*';
		$config['remove_spaces'] = TRUE;
		for ($i = 0; $i < $loop; $i++) {
			$ext = new SplFileInfo($files[$name]['name'][$i]);
			$ext = $ext->getExtension();
			$_FILES['userfile']['name'] = $files[$name]['name'][$i];
			$_FILES['userfile']['type'] = $files[$name]['type'][$i];
			$_FILES['userfile']['tmp_name'] = $files[$name]['tmp_name'][$i];
			$_FILES['userfile']['error'] = $files[$name]['error'][$i];
			$_FILES['userfile']['size'] = $files[$name]['size'][$i];

			$config['remove_spaces'] = TRUE;
			$filenameis = random_string('alnum', 25) . '.' . $ext;
			$string = preg_replace('/\s+/', '', $filenameis);
			$config['file_name'] = $string;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload()) {
				$errors = array('error' => $this->upload->display_errors());
			} else {
				$data = array('upload_data' => $this->upload->data());
				$img[$i] = $string;
				$images[] = $img[$i];
			}
		}
		return $images;
	}

	public function addScript($script)
	{
		$this->newScript = $script;
	}

	public function showScript()
	{
		return $this->newScript;
	}

	public function singlePost($id, $table)
	{
		$this->db->where('posts_id', $id);
		$this->db->where('posts_status', 1);
		$this->db->join($table, $table . '_post = posts_id', 'left');
		return $this->db->get('posts')->row_array();
	}

	public function addMailQueue($to, $subject, $body)
	{
		// $this->db->insert('mail_queue', [
		// 'mail_queue_to' => $to,
		// 'mail_queue_subject' => $subject,
		// 'mail_queue_body' => $body,
		// 'mail_queue_status' => 0,
		// 'mail_queue_created' => now()
		// ]);
		$result = $this->email
			->from('prashant@pearlorganisation.com')
			->reply_to('prashant@pearlorganisation.com')    // Optional, an account where a human being reads.
			->to($to)
			->subject($subject)
			->message($body)
			->send();
	}

	public function save_Activity($title, $user = FALSE)
	{
		$ip = get_ip();
		$user_id = $this->session->userdata('user_id');
		if ($user) {
			$user_id = $user;
		}
		$this->db->insert('activities', [
			'activities_user' => $user_id,
			'activities_title' => $title,
			'activities_ip' => $ip
		]);
	}

	public function set_User_Cookie($user_id, $session)
	{
		$data = array(
			'carts_user' => $user_id,
			'carts_token' => ''
		);
		$this->db->where('carts_token', $session);
		$this->db->update('carts', $data);

		$data1 = array(
			'history_user' => $user_id,
			'history_cookie' => ''
		);
		$this->db->where('history_cookie', $session);
		$this->db->update('recent_history', $data1);
	}

	public function save_Transaction_PayTm($transaction)
	{
		$this->db->insert('transactions', $transaction);
	}

	public function check_Wishlist($post)
	{
		$user = $this->session->userdata('user_id');
		$this->db->where('wishlists_user', $user);
		$this->db->where('wishlists_post', $post);
		$result = $this->db->get('wishlists');
		return $result->num_rows();
	}

	public function singleCat($id)
	{
		$this->db->where('categories_id', $id);
		return $this->db->get('categories')->row_array();
	}
}
