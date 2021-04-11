<form action="<?= admin_url('orders/save-return-thread/' . $order['orders_id']) ?>" method="POST">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Product</th>
				<th>Quantity</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($order['products']) {
				$count = 0;
				foreach ($order['products'] as $product) {
					if (empty($product['return'])) {
						$count++; ?>
						<tr>
							<td>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="post_id-<?= $product['posts_slug'] ?>" name="products[]" value="<?= $product['order_products_id'] ?>">
									<label class="custom-control-label" for="post_id-<?= $product['posts_slug'] ?>"><?= $product['posts_title'] ?></label>
								</div>
							</td>
							<td><?= $product['order_products_quantity'] ?></td>
						</tr>
			<?php }
				}
			} ?>
		</tbody>
	</table>
	<?php
	if ($count == 0) {
		echo '<h4>You have requested for return.</h4>';
	} else {
	?>
		<div class="form-group">
			<label for="reason">Reason:</label>
			<textarea class="form-control" rows="5" id="reason" name="reason"></textarea>
		</div>
		<h4>Return Address</h4>
		<div class="form-group row">
			<div class="col-md-6">
				<label for="country">Country:</label>
				<input type="text" class="form-control" name="country" id="country">
			</div>
			<div class="col-md-6">
				<label for="state">State:</label>
				<input type="text" class="form-control" name="state" id="state">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-6">
				<label for="city">City:</label>
				<input type="text" class="form-control" name="city" id="city">
			</div>
			<div class="col-md-6">
				<label for="pincode">Pincode:</label>
				<input type="text" class="form-control" placeholder="Enter Pincode" name="pin" id="pincode">
			</div>
		</div>
		<div class="form-group">
			<label for="address1">Address 1:</label>
			<textarea class="form-control" rows="2" id="address1" name="address"></textarea>
		</div>
		<div class="form-group">
			<label for="address2">Address 2:</label>
			<textarea class="form-control" rows="2" id="address2" name="additional"></textarea>
		</div>
		<button type="submit" class="btn btn-primary" <?= $count == 0 ? 'data-dismiss="modal"' : '' ?>>Submit</button>
	<?php } ?>
</form>