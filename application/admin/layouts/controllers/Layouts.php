<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layouts extends MX_Controller {

	public function css(){
		return $this->load->view('css', false, true);
	}

	public function js(){
		return $this->load->view('js', false, true);
	}

	public function load($data){
		if($this->session->userdata('user_role') != 121 && $this->session->userdata('user_role') != 2){
			redirect('');
		}
		allowUser([2, 121]);
		// if($this->uri->segment(1) != getenv('admin')){
			// $c = str_replace(site_url(), admin_url(), current_url());
			// redirect($c);
		// }
		$menus['menus'] = $this->menu->getMenu();
		$data['css'] = $this->css();
		$data['sidebar'] = $this->load->view('sidebar', $menus, true);
		$data['pagetitle'] = $this->load->view('page-title', $data, true);
		$data['js'] = $this->js();
		$data['header'] = $this->load->view('header', $data, true);
		$data['footer'] = $this->load->view('footer', $data, true);
		$this->load->view('index', $data);
	}
}
// modules::run('module/controller/method', $params, $...);