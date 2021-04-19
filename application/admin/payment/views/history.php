<div class="row gutters">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-header">Transaction History</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="data-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Gateway</th>
							<th>Order ID</th>
							<th>Amount</th>
							<th>Txn Id</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($payments) {
							$cnt = 1;
							foreach ($payments as $payment) { ?>
								<tr>
									<td><?= $cnt++; ?></td>
									<td><?= $payment['users_first_name'] . ' ' . $payment['users_last_name']; ?><br><?= $payment['transactions_email'] ?></td>
									<td><?= $payment['transactions_gateway']; ?></td>
									<td><?= $payment['transactions_order_id'] ?></td>
									<td><?= $payment['transactions_currency'] . ' ' . $payment['transactions_gross'] ?></td>
									<td><?= $payment['transactions_txnid']; ?></td>
									<td><?= date('M d, Y', strtotime($payment['transactions_created'])); ?></td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>