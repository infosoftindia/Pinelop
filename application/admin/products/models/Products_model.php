<?php
class Products_model extends CI_Model
{

	public function listing($id = FALSE, $is_Admin = FALSE)
	{
		if ($id) {
			$attributeX = [];
			$this->db->where('posts_type', 'product');
			$this->db->where('posts_status', '1');

			if ($is_Admin && $this->session->userdata('user_role') == 2) {
				$this->db->where('posts_author', $this->session->userdata('user_id'));
			}

			$this->db->join('products', 'products_post = posts_id', 'left');
			$this->db->where('posts_id', $id);
			$post = $this->db->get('posts')->row_array();

			$this->db->where('products_category_post', $post['posts_id']);
			$this->db->join('categories', 'products_category_category = categories_id', 'left');
			$post['categories'] = $this->db->get('products_category')->result_array();

			$this->db->where('product_similars_post', $post['posts_id']);
			$similars = $this->db->get('product_similars')->result_array();
			$sim = [];
			foreach ($similars as $similar) {
				$sim[] = $similar['product_similars_similar'];
			}
			$post['similars'] = $sim;

			$this->db->where('products_gallery_post', $post['posts_id']);
			$post['galleries'] = $this->db->get('products_gallery')->result_array();

			$this->db->where('product_attributes_post', $post['posts_id']);
			$attributes = $this->db->get('product_attributes')->result_array();
			foreach ($attributes as $attribute) {
				$this->db->where('product_variables_attribute', $attribute['product_attributes_id']);
				$attribute['variables'] = $this->db->get('product_variables')->result_array();
				$attributeX[] = $attribute;
			}
			$post['attributes'] = $attributeX;
			return $post;
		}
		$this->db->where('posts_type', 'product');
		$this->db->join('products', 'products_post = posts_id', 'left');
		$this->db->join('categories', 'products_category = categories_id', 'left');
		$this->db->order_by('posts_id', 'DESC');
		return $this->db->get('posts')->result_array();
	}

	public function insert($image, $slug, $galleries)
	{
		$categories = $this->input->post('category');
		$data = array(
			'posts_title' => $this->input->post('title'),
			'posts_slug' => $slug,
			'posts_author' => $this->session->userdata('user_id'),
			'posts_cover' => $image,
			'posts_type' => 'product',
			'posts_status' => $this->input->post('status'),
			'posts_created' => now(),
		);
		$this->db->insert('posts', $data);
		$id = $this->db->insert_id();

		$product = array(
			'products_post' => $id,
			'products_price' => $this->input->post('price'),
			'products_sale_price' => $this->input->post('sale_price'),
			'products_sku' => $this->input->post('sku'),
			'products_stock' => $this->input->post('quantity'),
			'products_description' => $this->input->post('description'),
			'products_short_description' => $this->input->post('short_desc'),
			'products_tags' => $this->input->post('tags'),
			'products_featured' => $this->input->post('featured'),
			'products_brand' => $this->input->post('brand'),

		);
		$this->db->insert('products', $product);

		foreach ($categories as $category) {
			$cat = array(
				'products_category_post' => $id,
				'products_category_category' => $category
			);
			$this->db->insert('products_category', $cat);
		}

		foreach ($galleries as $gallery) {
			$img = array(
				'products_gallery_post' => $id,
				'products_gallery_image' => $gallery
			);
			$this->db->insert('products_gallery', $img);
		}
		return $id;
	}

	public function update($id, $image, $slug)
	{
		$categories = $this->input->post('category');
		$similars = $this->input->post('similars');
		$data = array(
			'posts_title' => $this->input->post('title'),
			// 'posts_slug' => $slug,
			'posts_cover' => $image,
		);
		$this->db->where('posts_id', $id);
		$this->db->update('posts', $data);

		$product = array(
			'products_price' => $this->input->post('price'),
			'products_sale_price' => $this->input->post('sale_price'),
			'products_sku' => $this->input->post('sku'),
			'products_stock' => $this->input->post('quantity'),
			'products_description' => $this->input->post('description'),
			'products_short_description' => $this->input->post('short_desc'),
			'products_tags' => $this->input->post('tags'),
			'products_featured' => $this->input->post('featured'),
			'products_brand' => $this->input->post('brand'),
		);
		$this->db->where('products_post', $id);
		$this->db->update('products', $product);

		if ($this->session->userdata('user_role') != 2) {
			$data = array(
				'posts_status' => $this->input->post('status')
			);
			$this->db->where('posts_id', $id);
			$this->db->update('posts', $data);

			$product = array(
				'products_featured' => $this->input->post('featured'),
			);
			$this->db->where('products_post', $id);
			$this->db->update('products', $product);

			$this->db->where('product_similars_post', $id);
			$this->db->delete('product_similars');

			foreach ($similars as $similar) {
				$sim = array(
					'product_similars_post' => $id,
					'product_similars_similar' => $similar
				);
				$this->db->insert('product_similars', $sim);
			}
		}

		$this->db->where('products_category_post', $id);
		$this->db->delete('products_category');

		foreach ($categories as $category) {
			$cat = array(
				'products_category_post' => $id,
				'products_category_category' => $category
			);
			$this->db->insert('products_category', $cat);
		}

		return $id;
	}

	public function categories($id = FALSE)
	{
		$this->db->where('categories_type', 'product');
		if ($id) {
			$this->db->where('categories_id', $id);
			return $this->db->get('categories')->row_array();
		} else {
			$this->db->order_by('categories_id', 'DESC');
			$categories = $this->db->get('categories')->result_array();
		}

		$this->db->where('cat_parent', $id);
		$metas = $this->db->get('categories_meta')->result_array();


		foreach ($categories as $category) {
			foreach ($metas as $meta) {
				$category[$meta['cat_key']] = $meta['cat_value'];
			}
		}
		return $categories;
	}

	public function parent_cat($id = FALSE)
	{
		$this->db->where('categories_type', 'product');
		$this->db->where('categories_parent', '0');
		if ($id) {
			$this->db->where('categories_id', $id);
			return $this->db->get('categories')->row_array();
		} else {
			$this->db->order_by('categories_id', 'DESC');
			$categories = $this->db->get('categories')->result_array();
		}

		$this->db->where('cat_parent', $id);
		$metas = $this->db->get('categories_meta')->result_array();


		foreach ($categories as $category) {
			foreach ($metas as $meta) {
				$category[$meta['cat_key']] = $meta['cat_value'];
			}
		}
		return $categories;
	}

	public function surface($id = FALSE)
	{
		$this->db->where('categories_type', 'surface');
		if ($id) {
			$this->db->where('categories_id', $id);
			return $this->db->get('categories')->row_array();
		} else {
			$this->db->order_by('categories_id', 'ASC');
			$categories = $this->db->get('categories')->result_array();
		}

		$this->db->where('cat_parent', $id);
		$metas = $this->db->get('categories_meta')->result_array();


		foreach ($categories as $category) {
			foreach ($metas as $meta) {
				$category[$meta['cat_key']] = $meta['cat_value'];
			}
		}
		return $categories;
	}

	public function grade($id = FALSE)
	{
		$this->db->where('categories_type', 'grade');
		if ($id) {
			$this->db->where('categories_id', $id);
			return $this->db->get('categories')->row_array();
		} else {
			$this->db->order_by('categories_id', 'DESC');
			$categories = $this->db->get('categories')->result_array();
		}

		$this->db->where('cat_parent', $id);
		$metas = $this->db->get('categories_meta')->result_array();


		foreach ($categories as $category) {
			foreach ($metas as $meta) {
				$category[$meta['cat_key']] = $meta['cat_value'];
			}
		}
		return $categories;
	}

	public function insert_Category($slug, $image)
	{
		$data = array(
			'categories_name' => $this->input->post('name'),
			'categories_icon' => $image,
			'categories_slug' => $slug,
			'categories_type' => 'product',
			'categories_parent' => $this->input->post('parent'),
			'categories_status' => $this->input->post('status'),
			'categories_created' => now(),
		);
		$this->db->insert('categories', $data);
	}



	public function update_Category($id, $image)
	{

		$data = array(
			'categories_name' => $this->input->post('name'),
			'categories_status' => $this->input->post('status'),
			'categories_featured' => $this->input->post('featured'),
			'categories_parent' => $this->input->post('parent'),
			'categories_icon' => $image,
		);
		$this->db->where('categories_id', $id);
		$this->db->update('categories', $data);
	}

	public function insert_Surface($slug)
	{
		$data = array(
			'categories_name' => $this->input->post('name'),
			'categories_slug' => $slug,
			'categories_type' => 'surface',
			'categories_status' => $this->input->post('status'),
			'categories_created' => now(),
		);
		$this->db->insert('categories', $data);
	}

	public function insert_Grade($slug)
	{
		$data = array(
			'categories_name' => $this->input->post('name'),
			'categories_slug' => $slug,
			'categories_type' => 'grade',
			'categories_status' => $this->input->post('status'),
			'categories_created' => now(),
		);
		$this->db->insert('categories', $data);
	}



	public function delete_Categories($id)
	{
		$this->db->where('categories_id', $id);
		$this->db->delete('categories');
		$this->db->where('cat_parent', $id);
		$this->db->delete('categories_meta');
	}

	public function attributes($id = FALSE)
	{
		if ($id) {
			$this->db->where('product_attributes_post', $id);
			$array = $this->db->get('product_attributes')->result_array();
			$prc = [];
			if ($array) {
				foreach ($array as $row) {
					$row['variables'] = $this->db->where('product_variables_attribute', $row['product_attributes_id'])->get('product_variables')->result_array();
					$prc[] = $row;
				}
			}
			return $prc;
		} else {
			$this->db->order_by('product_attributes_id', 'DESC');
			$array = $this->db->get('product_attributes')->result_array();
			$prc = [];
			if ($array) {
				foreach ($array as $row) {
					$row['variables'] = $this->db->where('product_variables_attribute', $row['product_attributes_id'])->get('product_variables')->result_array();
					$prc[] = $row;
				}
			}
			return $prc;
		}
	}


	public function add_Attribute($id)
	{
		$data = array(
			'product_attributes_name' => $this->input->post('name'),
			'product_attributes_type' => $this->input->post('type'),
			'product_attributes_post' => $id,
		);
		$this->db->insert('product_attributes', $data);
	}


	// public function update_Attribute($id, $image){

	// $data = array(
	// 'categories_name' => $this->input->post('name'),
	// 'categories_status' => $this->input->post('status'),
	// 'categories_featured' => $this->input->post('featured'),
	// 'categories_parent' => $this->input->post('parent'),
	// 'categories_icon' => $image,
	// );
	// $this->db->where('categories_id', $id);
	// $this->db->update('categories', $data);
	// }


	public function delete_Attributes($id)
	{
		$this->db->where('product_variables_attribute', $id);
		$this->db->delete('product_variables');
		$this->db->where('product_attributes_id', $id);
		$this->db->delete('product_attributes');
	}

	public function delete_Variant($id)
	{
		$this->db->where('product_variables_id', $id);
		$this->db->delete('product_variables');
	}

	public function add_Variant($id, $image)
	{
		$data = array(
			'product_variables_value' => $this->input->post('name'),
			'product_variables_price' => $this->input->post('price'),
			'product_variables_image' => $image,
		);
		$this->db->where('product_variables_id', $id);
		$this->db->update('product_variables', $data);
	}

	public function new_Variant($id, $image)
	{
		$data = array(
			'product_variables_value' =>  $this->input->post('name'),
			'product_variables_price' => $this->input->post('price'),
			'product_variables_image' => $image,
			'product_variables_attribute' => $id,
		);
		$this->db->insert('product_variables', $data);
	}

	public function variants($id = FALSE)
	{
		if ($id) {
			$this->db->where('product_variables_attribute ', $id);
			$this->db->join('product_attributes', 'product_attributes_id = product_variables_attribute', 'left');
			return $this->db->get('product_variables')->row_array();
		} else {
			$this->db->join('product_attributes', 'product_attributes_id = product_variables_attribute', 'left');
			$this->db->order_by('product_variables_id', 'DESC');
			$array = $this->db->get('product_variables')->result_array();
		}
	}

	public function brands()
	{
		return $this->db->order_by('brands_url')->get('brands')->result_array();
	}

	public function multipleImages($id, $files)
	{
		if ($files) {
			foreach ($files as $file) {
				$this->db->insert('products_gallery', [
					'products_gallery_post' => $id,
					'products_gallery_image' => $file
				]);
			}
		}
	}
}
