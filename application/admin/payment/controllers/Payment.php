<?php

class Payment extends MX_Controller
{

	public function pending()
	{
		allowUser([121]);
		$this->load->model("Payment_model");
		$data['payments'] = $this->Payment_model->pending_Payment();
		// Code here
		$data["title"] = "Pending Payments";
		$data["page"] = $this->load->view("pending", $data, true);
		echo modules::run("layouts/layouts/load", $data);
	}

	public function history()
	{
		allowUser([121]);
		$this->load->model("Payment_model");
		$data['payments'] = $this->Payment_model->transaction_History();
		// Code here
		$data["title"] = "Transaction History";
		$data["page"] = $this->load->view("history", $data, true);
		echo modules::run("layouts/layouts/load", $data);
	}


	public function pending_edit($id)
	{
		allowUser([121]);
		$this->load->model("Payment_model");
		$data['payment'] = $this->Payment_model->pending_Payment($id);
		$this->load->view("edit", $data);
	}

	public function update_Payment($id)
	{
		allowUser([121]);
		$this->load->model('Payment_model');
		$this->Payment_model->update_Payment($id);
		save_Activity('Payment request was updated');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function completed()
	{
		allowUser([121]);
		$this->load->model("Payment_model");
		$data['payments'] = $this->Payment_model->completed_Payment();
		// Code here
		$data["title"] = "Completed Payments";
		$data["page"] = $this->load->view("completed", $data, true);
		echo modules::run("layouts/layouts/load", $data);
	}

	public function completed_edit($id)
	{
		allowUser([121]);
		$this->load->model("Payment_model");
		$data['payment'] = $this->Payment_model->completed_Payment($id);
		$this->load->view("edit", $data);
	}
}
