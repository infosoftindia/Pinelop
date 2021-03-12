
<div class="row gutters">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
		<div class="card">
			<div class="card-header">Make New Transaction</div>
			<div class="card-body">
			<form method="POST" action="<?=base_url('payments/new_Payment');?>">
				<div class="form-group m-t-20">
					<label>Amount:</label>
					<input type="text" class="form-control" name="withdrawal_amount" value="<?=set_value('withdrawal_amount');?>" placeholder="Enter Withdrawal Amount" required>
					<div class="col-form-label text-danger"><?=form_error('withdrawal_amount');?></div>
				</div>
				<div class="form-group m-t-20">
					<label>Payments Method:</label>
					<select size="1" class="form-control" name="payment_method">
						<option value="PayPal">PayPal</option>
						<option value="PayUmoney">PayUmoney</option>
						<option value="PayTM">PayTM</option>
						<option value="Remittance">Remittance</option>
						<option value="Bank Transfer">Bank Transfer</option>
					</select>
					<div class="col-form-label text-danger"><?=form_error('payment_method');?></div>
				</div>
				<div class="form-group m-t-20">
					<label>Payments Detail:</label>
					<textarea class="form-control" name="payment_detail" placeholder="Enter a full Payment Detail."><?=set_value('payment_detail');?></textarea>
					<div class="col-form-label text-danger"><?=form_error('payment_method');?></div>
				</div>
				<button type="submit" name="saveForPreview" class="btn btn-outline-primary btn-sm">Request Withdrawal</button>
			</form>
		</div>
		</div>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
		<div class="card">
			<div class="card-header">Manage Categories</div>
			<div class="card-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>
								<label class="customcheckbox m-b-20">
									<input type="checkbox" id="mainCheckbox" />
									<span class="checkmark"></span>
								</label>
							</th>
							<th scope="col">#</th>
							<th scope="col">Date</th>
							<th scope="col">Payment ID</th>
							<th scope="col">Payment Method</th>
							<th scope="col">Amount</th>
							<th scope="col">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if($payments){ $cnt=1; foreach($payments as $payment){ ?>
							<tr>
								<th>
									<label class="customcheckbox">
										<input type="checkbox" class="listCheckbox" />
										<span class="checkmark"></span>
									</label>
								</th>
								<td><?=$cnt++;?></td>
								<td><?=date('M d, Y', strtotime($payment['payments_created_on']));?></td>
								<td><?=$payment['payments_id'];?></td>
								<td><?=$payment['payments_methods'];?></td>
								<td><?=$payment['payments_amount'];?></td>
								<td><?=($payment['payments_status']==0)?'<i class="fas fa-dot-circle text-info"></i> Pending':(($payment['payments_status']==2)?'<i class="fas fa-dot-circle text-secondary"></i> Cancelled':(($payment['payments_status']==3)?'<i class="fas fa-dot-circle text-danger"></i> Rejected':'<i class="fas fa-dot-circle text-success"></i> Completed'));?></td>
							</tr>
						<?php } } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Coupon</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="modal_Output">
				Modal body..
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>