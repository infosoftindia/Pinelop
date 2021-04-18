<div class="row gutters">
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
		<div class="card h-100">
			<div class="card-header"> Order Details</div>
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item"><i class="icon-calendar mr-3"></i> <?= date('M d, Y', strtotime($order['orders_created_on'])) ?></li>
					<li class="list-group-item"><i class="icon-credit-card mr-3"></i> <?= ucwords($order['orders_payment_method']) ?></li>
					<li class="list-group-item"><i class="icon-subway mr-3"></i> <?= ucwords($order['orders_shipping']) ?></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
		<div class="card h-100">
			<div class="card-header"> Customer Details</div>
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item"><i class="icon-user mr-3"></i> <?= ucwords($order['users_first_name'] . ' ' . $order['users_last_name']) ?></li>
					<li class="list-group-item"><i class="icon-envelope mr-3"></i> <?= ucwords($order['users_email']) ?></li>
					<li class="list-group-item"><i class="icon-mobile mr-3"></i> <?= ucwords(empty($order['users_mobile']) ? 'Not found' : $order['users_mobile']) ?></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
		<div class="card h-100">
			<div class="card-header">Options</div>
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item"><a href="">Print Invoice</a></li>
					<li class="list-group-item"><a href="">Print Shipping Label</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
		<div class="card h-100">
			<div class="card-header">Order Status</div>
			<div class="card-body">
				<?php if ($order['orders_status'] != '99') { ?>
					<select class="form-control order_Status mb-1" data-url="<?= base_url('orders/update_status/' . $order['orders_id']) ?>">
						<option value="0" <?= $order['orders_status'] == '0' ? 'selected' : '' ?>>New Order (Pending)</option>
						<option value="1" <?= $order['orders_status'] == '1' ? 'selected' : '' ?>>Completed</option>
						<option value="2" <?= $order['orders_status'] == '2' ? 'selected' : '' ?>>Processing</option>
						<option value="3" <?= $order['orders_status'] == '3' ? 'selected' : '' ?>>Dispatched</option>
						<option value="4" <?= $order['orders_status'] == '4' ? 'selected' : '' ?>>Out for Delivery</option>
					</select>
					<hr>
					<div class="mt-1">
						<a href="javascript:;" class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#myModal">Cancel this Order (Reject)</a>
					</div>
				<?php } else { ?>
					<p class="bold">This Order has been rejected!</p>
					<p><b>Reason: </b> <?= $order['orders_reason'] ?></p>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
		<div class="card">
			<div class="card-header">Order (#<?= $order['orders_id'] ?>)</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td style="width: 50%;" class="text-left">Payment Address</td>
							<td style="width: 50%;" class="text-left">Shipping Address</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-left">
								<?= $order['users_first_name'] . ' ' . $order['users_last_name'] ?><br>
								<?= (!empty($order['orders_address_company'])) ? $order['orders_address_company'] . '<br>' : '' ?>
								<?= $order['address_line4'] ?><br>
								<?= (!empty($order['address_line5'])) ? $order['address_line5'] . '<br>' : '' ?>
								<?= $order['address_line3'] . ((!empty($order['address_line6'])) ? ' - ' . $order['address_line6'] : '') ?><br>
								<?= $order['address_line2'] ?><br>
								<?= $order['address_line1'] ?>
							</td>
							<td class="text-left">
								<?= $order['orders_address_fname'] . ' ' . $order['orders_address_lname'] ?><br>
								<?= (!empty($order['orders_address_company'])) ? $order['orders_address_company'] . '<br>' : '' ?>
								<?= $order['orders_address_add1'] ?><br>
								<?= (!empty($order['orders_address_add2'])) ? $order['orders_address_add2'] . '<br>' : '' ?>
								<?= $order['orders_address_city'] . ((!empty($order['orders_address_pin'])) ? ' - ' . $order['orders_address_pin'] : '') ?><br>
								<?= $order['orders_address_state'] ?><br>
								<?= $order['orders_address_country'] ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-header">Products</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td class="text-center" width="1">#</td>
							<td class="text-left">Product</td>
							<td class="text-right">Quantity</td>
							<td class="text-right">Unit Price</td>
							<td class="text-right">Total</td>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($order['products']) {
							$count = 1;
							foreach ($order['products'] as $product) {
						?>
								<tr>
									<td class="text-right"><?= $count++ ?></td>
									<td class="text-left">
										<a href="<?= base_url('product/' . $product['posts_slug']) ?>" target="_blank"><?= $product['order_products_returned'] == 1 ? '<b class="text-danger">' . $product['posts_title'] . '</b>' : $product['posts_title'] ?></a> <br />
										<?php if (!empty($product['attributes'])) {
											foreach ($product['attributes'] as $attribute) { ?>
												&nbsp;<small> - <?= $attribute['product_attributes_name'] ?>: <?= $attribute['order_attributes_value'] ?></small>
										<?php }
										} ?>
										<?= (strlen($product['order_products_text']) > 2) ? '&nbsp;<small> - ' . $product['order_products_text'] . '</small>' : '' ?>
									</td>
									<td class="text-right"><?= $product['order_products_quantity'] ?></td>
									<td class="text-right"><?= pPrice($product['order_products_price']) ?></td>
									<td class="text-right"><?= pPrice($product['order_products_total']) ?></td>
								</tr>
							<?php
							}
							?>
							<tr>
								<td colspan="4" class="text-right bold">Sub-Total</td>
								<td class="text-right"><?= pPrice($order['orders_total']) ?></td>
							</tr>
							<tr>
								<td colspan="4" class="text-right bold">Discount</td>
								<td class="text-right"><?= pPrice($order['orders_discount']) ?></td>
							</tr>
							<tr>
								<td colspan="4" class="text-right bold">Shipping Rate</td>
								<td class="text-right"><?= pPrice($order['orders_shipping_amount']) ?></td>
							</tr>
							<tr>
								<td colspan="4" class="text-right bold">Total</td>
								<td class="text-right"><?= pPrice($order['orders_final_amount']) ?></td>
							</tr>
						<?php
						}
						?>
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
				<h4 class="modal-title">Cancel this Order (Reject)</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="<?= admin_url('orders/reject-order/' . $order['orders_id']) ?>" method="POST">
					<div class="form-group">
						<label for="comment">Write the proper reason of Order Rejection:</label>
						<textarea class="form-control" rows="5" id="comment" name="reason"></textarea>
					</div>
					<div class="btn-group float-right btn-group-sm">
						<button type="submit" class="btn btn-primary">Confirm Cancel</button>
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>