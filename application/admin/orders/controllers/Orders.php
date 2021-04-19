<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends MX_Controller
{

	public function view($id)
	{
		allowUser([2, 121]);
		$this->load->model('Orders_model');
		$data['order'] = $this->Orders_model->view_Orders($id);
		// header('Content-Type: application/json');
		// echo json_encode($data['order']);
		if (!isset($data['order']['orders_id']) && @$data['order']['orders_id'] < 1) {
			show_404();
		}
		$data['title'] = 'View Order';
		$data['page'] = $this->load->view('view', $data, true);
		echo modules::run('layouts/layouts/load', $data);
	}

	public function pendings()
	{
		allowUser([2, 121]);
		$this->load->model('Orders_model');
		$data['orders'] = $this->Orders_model->pending_Orders();
		$data['title'] = 'Pending Orders';
		$data['page'] = $this->load->view('orders', $data, true);
		echo modules::run('layouts/layouts/load', $data);
	}

	public function return()
	{
		allowUser([2, 121]);
		$this->load->model('Orders_model');
		$data['orders'] = $this->Orders_model->return_Orders();
		$data['title'] = 'Returns';
		$data['page'] = $this->load->view('return', $data, true);
		echo modules::run('layouts/layouts/load', $data);
	}

	public function manage()
	{
		allowUser([2, 121]);
		$this->load->model('Orders_model');
		$data['orders'] = $this->Orders_model->all_Orders();
		$data['title'] = 'Manage All Orders';
		$data['page'] = $this->load->view('orders', $data, true);
		echo modules::run('layouts/layouts/load', $data);
	}

	public function update_status($id)
	{
		allowUser([2, 121]);
		$this->load->model('Orders_model');
		$value = $this->input->post('value');
		$data['orders'] = $this->Orders_model->update_Status($id, $value);
		save_Activity('Order status changed');
	}

	public function reject_order($id)
	{
		allowUser([2, 121]);
		$this->load->model('Orders_model');
		$data['orders'] = $this->Orders_model->reject_Order($id);
		save_Activity('Order has been marked as reject.');
		redirect(admin_url() . 'orders/view/' . $id);
	}

	public function return_single_order($id)
	{
		$this->load->model('Orders_model');
		return $this->Orders_model->view_Orders($id);
	}

	public function open_return_thread($id)
	{
		$this->load->model('Orders_model');
		$data['order'] = $this->Orders_model->view_Orders($id);
		$this->load->view('return-form', $data);
	}

	public function open_cancel_thread($id)
	{
		$this->load->model('Orders_model');
		$data['order'] = $this->Orders_model->view_Orders($id);
		$this->load->view('cancel-form', $data);
	}

	public function save_return_thread($id)
	{
		$this->load->model('Orders_model');
		$order = $this->Orders_model->view_Orders($id);
		$this->Orders_model->open_Return_Thread($id, $order);
		redirect('account?page=orders');
	}

	public function save_cancel_thread($id)
	{
		$this->load->model('Orders_model');
		$this->Orders_model->open_Cancel_Thread($id);
		redirect('account?page=orders');
	}

	public function return_View($id)
	{
		allowUser([2, 121]);
		$this->load->model('Orders_model');
		$data['order'] = $this->Orders_model->return_Detail($id);
		// print_r($data);
		$data['title'] = 'Product Return';
		$data['page'] = $this->load->view('return-view', $data, true);
		echo modules::run('layouts/layouts/load', $data);
	}

	public function return_Approve($id)
	{
		allowUser([2, 121]);
		$this->load->model('Orders_model');
		$this->Orders_model->return_Status($id, 1);
		$this->Orders_model->order_Product_Delete($id, $this->input->get('p'));
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function return_Decline($id)
	{
		allowUser([2, 121]);
		$this->load->model('Orders_model');
		$this->Orders_model->return_Status($id, 2);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function return_Processing($id)
	{
		allowUser([2, 121]);
		$this->load->model('Orders_model');
		$this->Orders_model->return_Status($id, 3);
		redirect($_SERVER['HTTP_REFERER']);
	}
}
