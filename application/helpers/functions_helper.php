<?php

function _csrf()
{
	$prc = &get_instance();
	return '<input type="hidden" name="' . $prc->security->get_csrf_token_name() . '" value="' . $prc->security->get_csrf_hash() . '">';
}

function setMenu($menu)
{
	$prc = &get_instance();
	$prc->menu->setMenu($menu);
}

function compareByName($a, $b)
{
	return strnatcmp($a["position"], $b["position"]);
}

function adminMenu($array)
{
	foreach ($array as $child) {
		echo '<li><a href="' . (($child['url'] != '') ? base_url($child['url']) : 'javascript:;') . '" ' . (isset($child['children']) ? 'class="has-arrow"' : '') . ' aria-expanded="false">' . (($child['icon'] != '') ? '<i class="' . $child['icon'] . '"></i>' : '') . '<span>' . $child['label'] . '</span></a>' . PHP_EOL;
		if (isset($child['children'])) {
			echo '<ul class="collapse" aria-expanded="false">' . PHP_EOL;
			adminMenu($child['children']);
			echo '</ul>' . PHP_EOL;
		}
		echo '</li>';
	}
}

function categoriesByType($parent = FALSE)
{
	$prc = &get_instance();
	return $prc->Basic_model->getCategoriesByType($parent);
}

function getCatProductCount($CatId)
{
	$prc = &get_instance();
	return $prc->Basic_model->getCatProductCount($CatId);
}

function makeSlug($text, $postId = FALSE)
{
	$prc = &get_instance();
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);
	// $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	$text = preg_replace('~[^-\w]+~', '', $text);
	$text = trim($text, '-');
	$text = preg_replace('~-+~', '-', $text);
	$text = strtolower($text);
	return $prc->Basic_model->check_Slug_Exist($text, $postId);
}

function make_Cat_Slug($text, $cat_ID = FALSE)
{
	$prc = &get_instance();
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);
	// $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	$text = preg_replace('~[^-\w]+~', '', $text);
	$text = trim($text, '-');
	$text = preg_replace('~-+~', '-', $text);
	$text = strtolower($text);
	return $prc->Basic_model->check_Cat_Slug_Exist($text, $cat_ID);
}

function getCategoryName($catId)
{
	$prc = &get_instance();
	$prc->db->where('categories_id', $catId);
	$result = $prc->db->get('categories');
	if ($result->num_rows() > 0) {
		return $result->row(0)->categories_name;
	} else {
		return 'N/A';
	}
}

function now($format = 'Y-m-d H:i:s')
{
	return date($format);
}

function doUpload($name = FALSE)
{
	$prc = &get_instance();
	$image = $prc->Basic_model->uploadImage($name);
	return $image;
}

function saveMedia($key, $value, $type = FALSE)
{
	$prc = &get_instance();
	return $prc->Basic_model->saveMedia($key, $value, $type);
}

function getMedia($id, $column = FALSE)
{
	$prc = &get_instance();
	return $prc->Basic_model->getMedia($id, $column);
}

function savePostMeta($post, $key, $value)
{
	$prc = &get_instance();
	return $prc->Basic_model->savePostMeta($post, $key, $value);
}

function getPostMeta($post, $key)
{
	$prc = &get_instance();
	return $prc->Basic_model->getPostMeta($post, $key);
}

function HashPass($pass)
{
	$options = [
		'cost' => 12,
	];
	return password_hash($pass, PASSWORD_BCRYPT, $options);
}

function verifyPass($password, $hash)
{
	return password_verify($password, $hash);
}

function alert($type, $key, $message = FALSE)
{
	$prc = &get_instance();
	if ($prc->session->flashdata($key)) {
		return '<div class="alert alert-' . $type . ' alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>' . $prc->session->flashdata($key) . '</div>';
	}
	if ($message) {
		return '<div class="alert alert-' . $type . ' alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>' . $message . '</div>';
	}
}

function upload_Path($file = FALSE)
{
	return base_url(getenv('uploads') . $file);
}

function deleteUpload($file)
{
	if (file_exists(getenv('uploads') . $file)) {
		unlink(getenv('uploads') . $file);
	}
}

function putScript($script)
{
	$prc = &get_instance();
	return $prc->Basic_model->addScript($script);
}

function getScript()
{
	$prc = &get_instance();
	return $prc->Basic_model->showScript();
}

function createTable($table_name, $fields)
{
	$prc = &get_instance();
	// print_r($fields);
	$prc->load->dbforge();
	$prc->dbforge->add_field($fields);
	$prc->dbforge->add_key("{$table_name}_id", TRUE);
	if (!$prc->db->table_exists($table_name)) {
		$prc->dbforge->create_table($table_name, TRUE);
		$prc->db->query("ALTER TABLE {$table_name} ADD {$table_name}_created VARCHAR(25) NOT NULL");
		$prc->db->query("ALTER TABLE {$table_name} ADD {$table_name}_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
	}
}

function product_grid($id, $table = 'products')
{
	$prc = &get_instance();
	$prc->load->model('Shopping_model');
	return $prc->Shopping_model->grid_Product($id, $table);
}

function category_grid($category)
{
	$prc = &get_instance();
	$prc->load->model('Shopping_model');
	return $prc->Shopping_model->grid_Category($category);
}

function sub_category_grid($category)
{
	$prc = &get_instance();
	$prc->load->model('Shopping_model');
	return $prc->Shopping_model->grid_Sub_Category($category);
}


function product_widget($id, $table = 'products')
{
	$prc = &get_instance();
	$prc->load->model('Shopping_model');
	return $prc->Shopping_model->widget_Product($id, $table);
}

function addMailQueue($to, $subject, $body)
{
	$prc = &get_instance();
	return $prc->Basic_model->addMailQueue($to, $subject, $body);
}

function objectToArray($object)
{
	if (!is_object($object) && !is_array($object))
		return $object;
	return array_map('objectToArray', (array) $object);
}

function allowUser($array)
{
	$prc = &get_instance();
	$flag = 0;
	foreach ($array as $role) {
		if ($prc->session->userdata('user_role') != $role) {
			if ($flag != 1) {
				$flag = 0;
			}
		} else {
			$flag = 1;
		}
	}
	if ($flag != 1) {
		show_error('This page is blocked. Only admin can access this page', 403);
	}
}

function pPrice($price, $numonly = FALSE)
{
	$prc = &get_instance();
	$curr_val = $prc->session->userdata('set_currency_value');
	$curr = $prc->session->userdata('set_currency');
	$price = $price * $curr_val;
	if($numonly == 1){
		return round($price, 2);
	}
	return $curr . ' ' . round($price, 2);
}

function api($method, $url, $header, $field)
{
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => $method,
		CURLOPT_POSTFIELDS => $field,
		CURLOPT_HTTPHEADER => $header,
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		return $err;
	} else {
		return $response;
	}
}

function month($year = NULL, $month = NULL)
{
	if (empty($year)) {
		$year = date('Y');
	}
	if (empty($month)) {
		$month = date('m');
	}
	$list = array();
	for ($d = 1; $d <= 31; $d++) {
		$time = mktime(12, 0, 0, $month, $d, $year);
		if (date('m', $time) == $month)
			$list[] = "'" . date('Y-m-d', $time) . "'";
	}
	return $list;
}

function get_ip()
{
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP'))
		$ipaddress = getenv('HTTP_CLIENT_IP');
	else if (getenv('HTTP_X_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	else if (getenv('HTTP_X_FORWARDED'))
		$ipaddress = getenv('HTTP_X_FORWARDED');
	else if (getenv('HTTP_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	else if (getenv('HTTP_FORWARDED'))
		$ipaddress = getenv('HTTP_FORWARDED');
	else if (getenv('REMOTE_ADDR'))
		$ipaddress = getenv('REMOTE_ADDR');
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}

function save_Activity($title, $user = FALSE)
{
	$prc = &get_instance();
	return $prc->Basic_model->save_Activity($title, $user);
}

function pdf($html)
{
	$prc = &get_instance();
	$prc->load->library('pdf');
	$prc->pdf->makePdf($html);
}

function set_User_Cookie($user, $session)
{
	$prc = &get_instance();
	$prc->Basic_model->set_User_Cookie($user, $session);
}

function check_Wishlist($post)
{
	$prc = &get_instance();
	$wishlist = $prc->Basic_model->check_Wishlist($post);
	if ($wishlist > 0) {
		return 'background: #f50000;';
	} else {
		return 'background: #363f4d;';
	}
}

function check_Wishlist_Text($post)
{
	$prc = &get_instance();
	$wishlist = $prc->Basic_model->check_Wishlist($post);
	if ($wishlist > 0) {
		return '- Remove from Wishlist';
	} else {
		return '+ Add to Wishlist';
	}
}



function admin_url($uri = "")
{
	return site_url(getenv('admin') . '/' . $uri);
}

function update_ENV($key, $value)
{
	$path = FCPATH . '.env';
	if (file_exists($path)) {
		file_put_contents($path, str_replace(
			$key . '=' . getenv($key),
			$key . '=' . $value,
			file_get_contents($path)
		));
		file_put_contents($path, str_replace(
			$key . '="' . getenv($key) . '"',
			$key . '="' . $value . '"',
			file_get_contents($path)
		));
	}
	return true;
}

function redirectF($path, $array)
{
	$prc = &get_instance();
	$prc->session->set_flashdata($array[0], $array[1]);
	redirect($path);
}
