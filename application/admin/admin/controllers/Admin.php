<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MX_Controller
{

	public function cron_job()
	{
		$this->load->model('Admin_model');
		$mail = $this->Admin_model->get_Mail_Email();
		if ($mail) {
			$to = $mail->mail_queue_to;
			$subject = $mail->mail_queue_subject;
			$body = $mail->mail_queue_body;
			$result = $this->email
				->from(getenv('email'), getenv('title'))
				->reply_to(getenv('email'), getenv('title'))    // Optional, an account where a human being reads.
				->to($to)
				->subject($subject)
				->message($body)
				->send();
		}
	}

	public function logout()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('admin/shopping');
		}
		save_Activity('Succesfully logged out');
		$this->Basic_model->set_User_Cookie($this->session->userdata('user_id'), get_cookie('users_local_session'));
		$this->session->sess_destroy();
		redirect('admin/shopping');
	}

	public function shopping()
	{
		$this->load->helper('cookie');
		delete_cookie('users_local_session');
		// setcookie("users_local_session", md5(uniqid(rand(), true)), 31536000);
		set_cookie("users_local_session", md5(uniqid(rand(), true)), 31536000);
		redirect('');
	}

	public function index()
	{
		$data['title'] = 'Login to Admin Panel';
		$data['css'] = modules::run('layouts/layouts/css');
		$data['sidebar'] = $this->load->view('sidebar', false, true);
		$data['pagetitle'] = $this->load->view('page-title', false, true);
		$data['js'] = modules::run('layouts/layouts/js');
		$data['header'] = $this->load->view('header', $data, true);
		$data['footer'] = $this->load->view('footer', $data, true);
		$this->load->view('index', $data);
	}

	public function profile()
	{
		allowUser([2, 121]);
		$this->load->model("Admin_model");
		$data["title"] = "Profile";
		$data['profile'] = $this->Admin_model->get_My_Profile();
		$data["page"] = $this->load->view("profile", $data, true);
		echo modules::run("layouts/layouts/load", $data);
	}

	public function login_script()
	{
		$this->load->model('Admin_model');

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if (!empty($email) && !empty($password)) {
			// Get Admin Info by Email Address
			$uEmail = $this->Admin_model->admin_Email($email);
			if (!empty($uEmail)) {
				$hash = $uEmail->users_password;
				if (verifyPass($password, $hash)) {
					$this->session->set_userdata([
						'user_id' => $uEmail->users_id,
						'user_fname' => $uEmail->users_first_name,
						'user_lname' => $uEmail->users_last_name,
						'user_name' => $uEmail->users_first_name . ' ' . $uEmail->users_last_name,
						'user_email' => $uEmail->users_email,
						'user_mobile' => $uEmail->users_mobile,
						'user_role' => $uEmail->users_role,
						'user_in' => 1
					]);
					set_User_Cookie($uEmail->users_id, get_cookie('users_local_session'));
					$this->session->set_flashdata('success', 'Welcome to Admin Panel');
					save_Activity('Logged in successfully');
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('error', 'Wrong Password!');
					save_Activity('Tried to login with invalid password', $uEmail->users_id);
					redirect('admin');
				}
			} else {
				$this->session->set_flashdata('error', 'Looks like admin not found!');
				redirect('admin');
			}
		} else {
			$this->session->set_flashdata('error', 'Email and Password are required!');
			redirect('admin');
		}
	}

	public function user_login_script($id = FALSE)
	{
		$this->load->model('Admin_model');

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if ($id) {
			$uEmail = $this->Admin_model->get_User_data($id);
			$this->session->set_userdata([
				'user_id' => $uEmail->users_id,
				'user_fname' => $uEmail->users_first_name,
				'user_lname' => $uEmail->users_last_name,
				'user_name' => $uEmail->users_first_name . ' ' . $uEmail->users_last_name,
				'user_email' => $uEmail->users_email,
				'user_mobile' => $uEmail->users_mobile,
				'user_role' => $uEmail->users_role,
				'user_in' => 1
			]);
			set_User_Cookie($uEmail->users_id, get_cookie('users_local_session'));
		}

		if (!empty($email) && !empty($password)) {
			// Get Admin Info by Email Address
			$uEmail = $this->Admin_model->user_Email($email);
			if (!empty($uEmail)) {
				$hash = $uEmail->users_password;
				if (verifyPass($password, $hash)) {
					$this->session->set_userdata([
						'user_id' => $uEmail->users_id,
						'user_fname' => $uEmail->users_first_name,
						'user_lname' => $uEmail->users_last_name,
						'user_name' => $uEmail->users_first_name . ' ' . $uEmail->users_last_name,
						'user_email' => $uEmail->users_email,
						'user_mobile' => $uEmail->users_mobile,
						'user_role' => $uEmail->users_role,
						'user_in' => 1
					]);
					set_User_Cookie($uEmail->users_id, get_cookie('users_local_session'));
					$this->session->set_flashdata('success', 'Welcome');
					redirect($_SERVER['HTTP_REFERER']);
				} else {
					$this->session->set_flashdata('error', 'Wrong Password!');
					redirect($_SERVER['HTTP_REFERER']);
				}
			} else {
				$this->session->set_flashdata('error', 'Looks like user not found!');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			$this->session->set_flashdata('error', 'Email and Password are required!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function user_register_script()
	{
		$this->load->model('Admin_model');

		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'min_length[1]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.users_email]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]|is_numeric');

		if ($this->form_validation->run() === FALSE) {
			echo modules::run("shopping/shopping/open_Page", 'login');
		} else {
			$user = $this->Admin_model->save_New_User();
			$this->user_login_script($user);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function forgot_password_script()
	{
		$this->load->model('Admin_model');

		$email = $this->input->post('email');
		$uEmail = $this->Admin_model->user_Email_For_Reset($email);
		if ($uEmail) {
			$token = $uEmail->users_password;
			$data['link'] = site_url('reset-password/?token=' . $token);
			$page = $this->load->view('forgot-password', $data, true);
			addMailQueue($email, 'Password Reset', $page);
			$this->session->set_flashdata('success', 'Password Reset link is sent to your email address');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$this->session->set_flashdata('error', 'Enter valid email');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function reset_password()
	{
		$this->load->model('Admin_model');
		$password = $this->input->post('password');
		$token = $this->input->get('token');
		$user = $this->Admin_model->get_User_By_Token($token);
		if ($user) {
			$uEmail = $this->Admin_model->change_Password_Id($user, $token, $password);
			redirect('login');
		}
		echo 'OHH';
	}

	public function is_email_exist()
	{
		$this->load->model('Admin_model');
		$email = $this->input->post('email');
		$uEmail = $this->Admin_model->check_Email($email);
		if (!$uEmail) {
			die('1');
		}
		die('0');
	}

	public function register_vendor_script()
	{
		$this->load->model('Admin_model');

		$user = $this->Admin_model->save_New_Vendor();
		$this->vendor_login_script($user);
		save_Activity('Register successfully and logged in to the dashboard ');
		redirect('vendor-dashboard');
	}

	public function vendor_login_script($id = FALSE)
	{
		$this->load->model('Admin_model');

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if ($id) {
			$uEmail = $this->Admin_model->get_User_data($id);
			$this->session->set_userdata([
				'user_id' => $uEmail->users_id,
				'user_fname' => $uEmail->users_first_name,
				'user_lname' => $uEmail->users_last_name,
				'user_name' => $uEmail->users_first_name . ' ' . $uEmail->users_last_name,
				'user_email' => $uEmail->users_email,
				'user_mobile' => $uEmail->users_mobile,
				'user_role' => $uEmail->users_role,
				'user_status' => $uEmail->users_status,
				'user_in' => 1
			]);
			set_User_Cookie($uEmail->users_id, get_cookie('users_local_session'));
		}

		if (!empty($email) && !empty($password)) {
			// Get Admin Info by Email Address
			$uEmail = $this->Admin_model->vendor_Email($email);
			if (!empty($uEmail)) {
				$hash = $uEmail->users_password;
				if (verifyPass($password, $hash)) {
					$this->session->set_userdata([
						'user_id' => $uEmail->users_id,
						'user_fname' => $uEmail->users_first_name,
						'user_lname' => $uEmail->users_last_name,
						'user_name' => $uEmail->users_first_name . ' ' . $uEmail->users_last_name,
						'user_email' => $uEmail->users_email,
						'user_mobile' => $uEmail->users_mobile,
						'user_role' => $uEmail->users_role,
						'user_status' => $uEmail->users_status,
						'user_in' => 1
					]);
					set_User_Cookie($uEmail->users_id, get_cookie('users_local_session'));
					save_Activity('Logged in to Vendor Panel');
					$this->session->set_flashdata('success', 'Welcome to Vendor Panel');
					redirect('vendor-dashboard');
				} else {
					save_Activity('Tried to login to Vendor Panel with wrong password', $uEmail->users_id);
					$this->session->set_flashdata('error', 'Wrong Password!');
					redirect($_SERVER['HTTP_REFERER']);
				}
			} else {
				$this->session->set_flashdata('error', 'Looks like vendor not found!');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			$this->session->set_flashdata('error', 'Email and Password are required!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update_profile()
	{
		allowUser([2, 121]);
		$this->load->model('Admin_model');

		$update = $this->Admin_model->update_Profile();
		if ($update) {
			$this->session->set_flashdata('success', 'Successfully updated your profile');
			save_Activity('Profile updated successfully');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error', 'Something went wrong while updating your profile');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function change_password()
	{
		allowUser([2, 121]);
		$this->load->helper('security');
		$this->load->model('Admin_model');

		$this->form_validation->set_rules('old_Password', 'Old Password', 'required|callback_check_old_password');
		$this->form_validation->set_rules('new_Password', 'New Password', 'required|min_length[8]');
		$this->form_validation->set_rules('confirm_Password', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run($this) === FALSE) {
			$this->profile();
		} else {
			$update = $this->Admin_model->change_Password();
			if ($update) {
				$this->session->set_flashdata('success', 'Successfully updated your password');
				save_Activity('Password Changed');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('error', 'Something went wrong while updating your password');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function check_old_password($password)
	{
		$this->db->where('users_id', $this->session->userdata('user_id'));
		$user_Password = $this->db->get('users')->row()->users_password;
		if (verifyPass($password, $user_Password)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('check_old_password', 'Your current password is invalid.');
			return FALSE;
		}
	}

	public function activity()
	{
		allowUser([2, 121]);
		$this->load->model("Admin_model");
		$data["title"] = "Activities";
		$data['activities'] = $this->Admin_model->get_My_Activities();
		$data["page"] = $this->load->view("activities", $data, true);
		echo modules::run("layouts/layouts/load", $data);
	}
}





































// modules::run('module/controller/method', $params, $...);