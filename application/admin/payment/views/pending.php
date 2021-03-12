
<div class="row gutters">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-header">Pending Payments</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="data-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Amount</th>
							<th>Phone</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php if($payments){ $cnt=1; foreach($payments as $payment){?>
						<tr>
							<td><?=$cnt++;?></td>
							<td><?=$payment['users_first_name'].' '.$payment['users_last_name'];?></a></td>
							<td><?=$payment['users_email'];?></td>
							<td><?=$payment['payments_amount']?></td>
							<td><?=$payment['payments_methods'];?></td>
							<td><?=date('M d, Y', strtotime($payment['payments_created_on']));?></td>
							<td>
								<div class="btn-group " role="group">
									<button data-title="View Payment Data" data-href="<?=site_url('payment/pending-edit/'.$payment['payments_id'])?>" class="btn btn-info" data-toggle="modal" data-target="#admin_model"><i class="icon-edit"></i></button>
								</div>
							</td>
						</tr>
					<?php } } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

