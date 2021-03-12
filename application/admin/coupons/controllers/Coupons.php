<?php

class Coupons extends MX_Controller{
	
	public function manage(){
		allowUser([121]);
		$this->form_validation->set_rules('name', 'Coupon Name', 'required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('code', 'Coupon Code', 'required|min_length[1]|max_length[10]');
		if ($this->form_validation->run() === FALSE){
			$this->load->model('Coupons_model');
			$data['coupons'] = $this->Coupons_model->all_Coupons();
			$data['title'] = 'Coupons';
			$data['page'] = $this->load->view('coupon', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_New_coupon();
		}
	}
	
	public function save_New_coupon(){
		allowUser([121]);
		$this->load->model('Coupons_model');
		$insert = $this->Coupons_model->insert_Coupon();
		save_Activity('New coupon created');
		redirect(admin_url().'coupons/manage');
	}
	
	public function edit_coupon($id){
		allowUser([121]);
		$this->load->model('Coupons_model');
		$data['coupon'] = $this->Coupons_model->all_Coupons($id);
		$this->load->view('edit_coupon', $data);
	}
	
	public function update_Coupon($id){
		allowUser([121]);
		$this->load->model('Coupons_model');
		$this->Coupons_model->update_Coupon($id);
		save_Activity('Coupon has been modified');
		redirect('coupons/manage');
	}
	
	public function delete_coupon($id){
		allowUser([121]);
		$data = array(
			'coupons_status' => '111',
		);
		$this->db->where('coupons_id', $id);
		$this->db->update('coupons', $data);
		save_Activity('Coupon was deleted');
		redirect(admin_url().'coupons/manage');
	}
	
	public function apply_coupon($codeD = FALSE, $xx = FALSE){
		$total = 0;
		$total_amount = 0;
		set_cookie('my_coupon', '', 436800);
		$this->load->model('Coupons_model');
		if($xx === FALSE){
			$code = $this->input->post('coupon');
		}else{
			$code = $codeD;
		}

		$carts = $this->Coupons_model->get_Cart();
		foreach($carts as $cart){
			$price = $cart['products_price'];
			$salePrice = $cart['products_sale_price'];
			if($salePrice != '0' && $salePrice != '' && $salePrice < $price){
				$sPrice = $salePrice;
			}else{
				$sPrice = $price;
			}
			$total+=$price*$cart['carts_quantity'];
		}

		$coupon = $this->Coupons_model->get_Coupons($code);

		if($coupon){
			if($coupon['coupons_max_usage'] > 0){
				if($coupon['coupons_min_order'] <= $total || $coupon['coupons_min_order'] == 0){
					if($coupon['coupons_status'] == 1){
						$type = $coupon['coupons_type'];
						$discount = $coupon['coupons_amount'];
						if($type == 'a'){
							$amount = $discount; //discount amount 				100
							if($coupon['coupons_max_discount'] > 0){		//	50
								if($amount > $coupon['coupons_max_discount']){
									$amount = $coupon['coupons_max_discount'];
								}
							}
						}else{
							$amount = ($discount/100)*$total;
							if($coupon['coupons_max_discount'] > 0){
								if($amount > $coupon['coupons_max_discount']){
									$amount = $coupon['coupons_max_discount'];
								}
							}
						}
						if ($total < $amount) {
							$amount = $total;
						}
						$discount_amount = $amount;
						$total_amount = $total-$discount_amount;
						$tax_amount = (getenv('TaxRate')/100)*$total;
						$total_amount+=$tax_amount;

						set_cookie('my_coupon', $code, 436800);
						$json = json_encode([
							'status' => 1,
							'discount_amount' => (($xx)?($discount_amount):('- '.pPrice($discount_amount, 1))),
							'total_amount' => (($xx)?($total_amount):(pPrice($total_amount,1))),
							'tax_amount' => (($xx)?($tax_amount):(pPrice($tax_amount,1)))
						]);

					} else {
						$json = json_encode(['status' => 0, 'message' => 'You cannot use this coupon!', 'total_amount' => $total_amount]);
					}	
				} else {
					$json = json_encode(['status' => 0, 'message' => 'Minimum amount '.pPrice($coupon['coupons_min_order']).' is required to use this coupon!', 'total_amount' => $total_amount]);
				}
			} else {
				$json = json_encode(['status' => 0, 'message' => 'Coupon expired!', 'total_amount' => $total_amount]);
			}
		} else {
			$json = json_encode(['status' => 0, 'message' => 'Invalid Coupon!', 'total_amount' => $total_amount]);
		}
		if($xx){
			return $json;
		}else{
			echo $json;
		}
	}
	
}




































