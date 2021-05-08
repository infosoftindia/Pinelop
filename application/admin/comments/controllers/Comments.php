<?php

class Comments extends MX_Controller
{

	public function manage()
	{
		allowUser([121]);
		$this->load->model("Comments_model");
		$data["title"] = "Products Reviews";
		$data["comments"] = $this->Comments_model->get_All_Comments();
		$data["page"] = $this->load->view("comments", $data, true);
		echo modules::run("layouts/layouts/load", $data);
	}

	public function view($id)
	{
		allowUser([121]);
		$this->load->model("Comments_model");
		$data["comment"] = $this->Comments_model->get_All_Comments($id);
		$this->load->view("comment", $data);
	}

	public function approve($id)
	{
		allowUser([121]);
		$this->load->model("Comments_model");
		$this->Comments_model->approve_Comment($id);
		save_Activity('<a href="' . site_url('comments/view/' . $id) . '">Comment approved</a>');
		$this->session->set_flashdata('success', 'Comment Approved successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($id)
	{
		allowUser([121]);
		$this->load->model("Comments_model");
		$this->Comments_model->delete_Comment($id);
		save_Activity('Password Changed');
		save_Activity('Comment deleted');
		$this->session->set_flashdata('success', 'Comment Deleted successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
