<?php

class Env
{

	public function load()
	{
		$prc = &get_instance();
		$curr = $prc->session->userdata('set_currency');
		if ($curr == '') {
			$prc->load->model('Shopping_model');
			$prc->session->set_userdata('set_currency', 'USD');
			$ss = $prc->Shopping_model->get_Setting('USD');
			$prc->session->set_userdata('set_currency_value', $ss['settings_value']);
		}
	}
}
