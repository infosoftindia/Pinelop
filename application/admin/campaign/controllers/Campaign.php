<?php

	class Campaign extends MX_Controller{

		public function pending(){
			allowUser([121]);
			$this->load->model("Campaign_model");
			$data['campaigns'] = $this->Campaign_model->pending_Campaign();
			// Code here
			$data["title"] = "Pending Campaign";
			$data["page"] = $this->load->view("pending", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}

		public function pending_view($id){
			allowUser([121]);
			$this->load->model("Campaign_model");
			$data['campaign'] = $this->Campaign_model->pending_Campaign($id);
			$this->load->view("view", $data);
		}

		public function update_campaign($id){
			allowUser([121]);
			$this->load->model('Campaign_model');
			$this->Campaign_model->update_campaign($id);
			$url = $_SERVER['HTTP_REFERER'];
			redirect($url);
		}

		public function completed(){
			allowUser([121]);
			$this->load->model("Campaign_model");
			$data['campaigns'] = $this->Campaign_model->completed_Campaign();
			// Code here
			$data["title"] = "Pending Campaign";
			$data["page"] = $this->load->view("completed", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}

		public function completed_view($id){
			allowUser([121]);
			$this->load->model("Campaign_model");
			$data['campaign'] = $this->Campaign_model->completed_Campaign($id);
			$this->load->view("view", $data);
		}

		public function send_email($id){
			allowUser([121]);
			$this->load->model("Campaign_model");
			$ads = $this->Campaign_model->pending_Campaign($id);
			$data['amount'] = pPrice($ads['ads_amount']);
			$data['link'] = site_url('campaign/confirm/'.(($ads['ads_id']+5)*5683));
		echo	$body = $this->load->view('email/confirm', $data, true);
			// addMailQueue($data['ads']['users_email'], 'Verify your Ads Campaign', $body);
		}

		public function confirm($ids){
			$id = ($ids/5683)-5;
			$this->load->model("Campaign_model");
			$ads = $this->Campaign_model->completed_Campaign($id);

			$this->load->helper('paytm');
			$TXN_AMOUNT = $ads['ads_amount'];
			$checkSum = "";
			$paramList = array();
			$url = "";
			
			if(getenv('PAYTM_ENVIRONMENT') == 'TEST'){
				$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
				$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
			}elseif(getenv('PAYTM_ENVIRONMENT') == 'PROD'){
				$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
				$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
			}
			
			$paramList["MID"] = getenv('PAYTM_MERCHANT_MID');
			$paramList["ORDER_ID"] = "ORDS" . uniqid(rand());
			$paramList["CUST_ID"] = "CUST" . rand(100,999);
			$paramList["INDUSTRY_TYPE_ID"] = 'Retail';
			$paramList["CHANNEL_ID"] = 'WEB';
			$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
			$paramList["WEBSITE"] = getenv('PAYTM_MERCHANT_WEBSITE');

			$paramList["CALLBACK_URL"] = base_url('campaign/paytm_success/'.$ids).'?txnid='.$paramList["ORDER_ID"];
			
			$checkSum = getChecksumFromArray($paramList, getenv('PAYTM_MERCHANT_KEY'));
			echo '<center><h1>Please do not refresh this page...</h1></center>
			<form method="post" action="'.$PAYTM_TXN_URL.'" name="f1">
				<table border="1">
					<tbody>';
					foreach($paramList as $name => $value) {
						echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
					}
					echo '<input type="hidden" name="CHECKSUMHASH" value="'.$checkSum.'">
					</tbody>
				</table>
				<script type="text/javascript">
					document.f1.submit();
				</script>
			</form>';
		}
		
		public function paytm_success($id){
			print_r($_POST);

			$id = ($id/5683)-5;
			$this->load->model("Campaign_model");
			$ads = $this->Campaign_model->completed_Campaign($id);
			$day = $ads['ads_day'];
			date_default_timezone_set('Asia/Kolkata');

			$trans = [
				'transactions_user' => $ads['ads_user'],
				'transactions_gateway' => 'PayTm',
				'transactions_order_id' => $this->input->post('ORDERID'),
				'transactions_mid' => $this->input->post('MID'),
				'transactions_txnid' => $this->input->post('TXNID'),
				'transactions_amount' => $this->input->post('TXNAMOUNT'),
				'transactions_mode' => $this->input->post('PAYMENTMODE'),
				'transactions_currency' => $this->input->post('CURRENCY'),
				'transactions_txndate' => $this->input->post('TXNDATE'),
				'transactions_status' => $this->input->post('STATUS'),
				'transactions_response_code' => $this->input->post('RESPCODE'),
				'transactions_message' => $this->input->post('RESPMSG'),
				'transactions_created' => now()
			];
			$this->Basic_model->save_Transaction_PayTm($trans );
			
			if($this->input->post('RESPCODE') == '01' ||$this->input->post('RESPCODE') == '400' ||$this->input->post('RESPCODE') == '402'){
				$this->db->insert('campaigns', [
					'campaigns_ads' => $id,
					'campaigns_user' => $ads['ads_user'],
					'campaigns_post' => $ads['ads_product'],
					'campaigns_expires' => strtotime("+{$day} day"),
					'campaigns_created' => now()
				]);
			}else{
				redirect('campaign/failed');
			}
		}
		
		public function failed(){
			echo 'Sorry! Your payment has not been success';
		}
	}







