<div class="row gutters">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-header"><?= $title ?></div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="data-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Orders</th>
							<th>Product Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($orders) {
							$count = 1;
							foreach ($orders as $order) { ?>
								<tr>
									<td><?= $count++ ?></td>
									<td><?= '#' . $order['orders_id'] . ' ' . $order['users_first_name'] . ' ' . $order['users_last_name'] ?></td>
									<td><?= $order['posts_title'] ?></td>
									<td>
										<div class="btn-group">
											<a href="<?= admin_url('orders/return/view/' . $order['return_orders_id']) ?>" class="btn btn-success btn-sm"><span class="icon-eye"></span> View Return </a>
										</div>
									</td>
								</tr>
						<?php
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>