<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emails extends MX_Controller {

	public function account_confirmation(){
		$page = $this->load->view('account-confirm', false, true);
		var_dump(addMailQueue('prashant@pearlorganisation.com', 'Hello Sir, any update?', $page));
	}
}
// 