<div class="row gutters">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
		<div class="card">
			<div class="card-header">Products Detail</div>
			<div class="card-body">
				<p><?= $order['posts_title'] ?></p>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
		<div class="card">
			<div class="card-header">Order Detail</div>
			<div class="card-body">
				<p><a href="<?= admin_url('orders/view/' . $order['orders_id']) ?>"><?= '#' . $order['orders_id'] . ' ' . $order['users_first_name'] . ' ' . $order['users_last_name'] ?></a></p>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
		<div class="card">
			<div class="card-header">Reason</div>
			<div class="card-body">
				<p><?= $order['return_orders_reason'] ?></p>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
		<div class="card">
			<div class="card-header">Address</div>
			<div class="card-body">
				<p>Country: <?= $order['address_line1'] ?></p>
				<p>State: <?= $order['address_line2'] ?></p>
				<p>City: <?= $order['address_line3'] ?></p>
				<p>Pin/Post: <?= $order['address_line4'] ?></p>
				<p>Address 1: <?= $order['address_line5'] ?></p>
				<p>Address 2: <?= $order['address_line6'] ?></p>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
		<div class="card">
			<div class="card-header">Billing</div>
			<div class="card-body">
				<p>Product: <?= $order['posts_title'] ?></p>
				<p>Quantity: <?= $order['order_products_quantity'] ?></p>
				<p>Amount: USD <?= $order['order_products_price'] ?></p>
				<p>Total: USD <?= $order['order_products_total'] ?></p>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
		<div class="card">
			<div class="card-header">Action</div>
			<div class="card-body">
				Current Status:<b>
					<?php
					$status = $order['return_orders_status'];
					if ($status == '0') {
						echo 'Return Requested';
					} elseif ($status == '1') {
						echo 'Product Returned';
					} elseif ($status == '2') {
						echo 'Return Request Rejected';
					} elseif ($status == '3') {
						echo 'Return Request Processing';
					} else {
						echo 'Return Requested';
					}
					?></b>
				<ul class="list-group mt-3">
					<li class="list-group-item"><a href="<?= admin_url('orders/return/processing/' . $order['return_orders_id']) ?>">Process Return</a></li>
					<li class="list-group-item"><a href="<?= admin_url('orders/return/approve/' . $order['return_orders_id']) ?>?p=<?= $order['return_orders_product'] ?>&o=<?= $order['orders_id'] ?>">Approve Return</a></li>
					<li class="list-group-item"><a href="<?= admin_url('orders/return/decline/' . $order['return_orders_id']) ?>">Decline Return</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>