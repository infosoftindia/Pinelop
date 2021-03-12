<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function index(){
		// addMailQueue('gaurav@pearlorganisation.com', 'Hello Gaurav, any update?', 'Can you give me update?');
		allowUser([2, 121]);
		$data['title'] = 'Dashboard';
		$data['page'] = $this->load->view('dashboard', false, true);
		echo modules::run('layouts/layouts/load', $data);
	}
}
// 