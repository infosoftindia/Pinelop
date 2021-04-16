		<!-- START SECTION BREADCRUMB -->
		<div class="breadcrumb_section bg_gray page-title-mini">
			<div class="container">
				<!-- STRART CONTAINER -->
				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="page-title">
							<h1>Shopping Cart</h1>
						</div>
					</div>
					<div class="col-md-6">
						<ol class="breadcrumb justify-content-md-end">
							<li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
							<li class="breadcrumb-item active">Shopping Cart</li>
						</ol>
					</div>
				</div>
			</div><!-- END CONTAINER-->
		</div>
		<!-- END SECTION BREADCRUMB -->

		<!-- START MAIN CONTENT -->
		<div class="main_content">

			<!-- START SECTION SHOP -->
			<div class="section">
				<div class="container">
					<?php if ($carts) { ?>
						<form action="<?= site_url('shopping/update_cart') ?>" method="POST">
							<div class="row">
								<div class="col-12">
									<div class="table-responsive shop_cart_table">
										<table class="table">
											<thead>
												<tr>
													<th class="product-thumbnail">&nbsp;</th>
													<th class="product-name">Product</th>
													<th class="product-price">Price</th>
													<th class="product-quantity">Quantity</th>
													<th class="product-subtotal">Total</th>
													<th class="product-remove">Remove</th>
												</tr>
											</thead>
											<tbody>
												<?php $total = 0;
												foreach ($carts as $cart) { ?>
													<?php
													$price = $cart['products_price'];
													$salePrice = $cart['products_sale_price'];
													if ($salePrice != '0' && $salePrice != '' && $salePrice < $price) {
														$sPrice = $salePrice;
													} else {
														$sPrice = $price;
													}
													$sPrice = $cart['variable']['cart_variables_price'];
													?>
													<input value="<?= $cart['carts_id'] ?>" type="hidden" name="cart[]">

													<tr>
														<td class="product-thumbnail"><a href="#"><img src="<?= site_url('themes/shopping') ?>/assets/load.gif" class="lazy" data-src="<?= base_url(getenv('uploads') . $cart['carts_image']) ?>" alt="product1" style="height: 80px; object-fit: contain;"></a></td>
														<td class="product-name" data-title="Product">
															<a href="#"><?= $cart['posts_title'] ?></a><br>
															<small><?= ($cart['variable']) ? $cart['variable']['cart_variables_key'] . ': ' . $cart['variable']['cart_variables_value'] : '' ?></small>
														</td>
														<td class="product-price" data-title="Price"><?= pPrice($sPrice) ?></td>
														<td class="product-quantity" data-title="Quantity">
															<div class="quantity">
																<input type="button" value="-" class="minus">
																<input type="text" name="quantity[]" value="<?= $cart['carts_quantity'] ?>" title="Qty" class="qty" size="4">
																<input type="button" value="+" class="plus">
															</div>
														</td>
														<td class="product-subtotal" data-title="Total"><?= pPrice($sPrice * $cart['carts_quantity']) ?></td>
														<?php
														$total += $sPrice * $cart['carts_quantity'];
														?>
														<td class="product-remove" data-title="Remove"><a href="<?= base_url('shopping/remove_cart/' . $cart['carts_id']) ?>"><i class="ti-close"></i></a></td>
													</tr>
												<?php } ?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="6" class="px-0">
														<div class="row no-gutters align-items-center">
															<div class="col-lg-12 col-md-6 text-left text-md-right">
																<button class="btn btn-line-fill btn-sm" type="submit">Update Cart</button>
															</div>
														</div>
													</td>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</form>

						<div class="row">
							<div class="col-12">
								<div class="medium_divider"></div>
								<div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
								<div class="medium_divider"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 mb-3 mb-md-0">
								<div class="coupon field_form input-group">
									<input type="text" class="form-control form-control-sm" id="coupon-code" placeholder="Enter Coupon Code.." value="<?= get_cookie('my_coupon') ?>">
									<div class="input-group-append">
										<button class="btn btn-fill-out btn-sm" type="button" id="apply-coupon">Apply Coupon</button>
									</div>
								</div>
								<p id="coupon_message" class="text-danger"></p>
								<!-- <div class="heading_s1 mb-3 pt-4">
							<h6>Calculate Shipping</h6>
						</div>
						<form class="field_form shipping_calculator">
							<div class="form-row">
								<div class="form-group col-lg-12">
									<div class="custom_select">
										<select class="form-control">
											<option value="">Choose a option...</option>
											<option value="AX">Aland Islands</option>
											<option value="ZW">Zimbabwe</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-lg-6">
									<input required="required" placeholder="State / Country" class="form-control" name="name" type="text">
								</div>
								<div class="form-group col-lg-6">
									<input required="required" placeholder="PostCode / ZIP" class="form-control" name="name" type="text">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-lg-12">
									<button class="btn btn-fill-line" type="submit">Update Totals</button>
								</div>
							</div>
						</form> -->
							</div>

							<div class="col-md-6">
								<div class="border p-3 p-md-4">
									<div class="heading_s1 mb-3">
										<h6>Cart Totals</h6>
									</div>
									<div class="table-responsive">
										<table class="table">
											<tbody>
												<tr>
													<td class="cart_total_label">Cart Subtotal</td>
													<td class="cart_total_amount"><?= pPrice($total) ?></td>
												</tr>
												<tr>
													<td class="cart_total_label">Shipping</td>
													<td class="cart_total_amount">Free Shipping</td>
												</tr>
												<tr>
													<td class="cart_total_label">Total</td>
													<td class="cart_total_amount"><strong><?= pPrice($total) ?></strong></td>
												</tr>
											</tbody>
										</table>
									</div>
									<?php if ($this->session->userdata('user_id')) { ?>
										<a href="javascript:void(0);" data-toggle="modal" data-target="#selectAddress" class="btn btn-fill-out">Proceed to Checkout</a>
									<?php } else { ?>
										<a href="<?= site_url('checkout') ?>" class="btn btn-fill-out">Proceed to Checkout</a>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } else {
						echo '<center style="font-size: 20px;" class="m-5 text-danger">Your cart is empty!</center>';
					} ?>
				</div>
			</div>
			<!-- END SECTION SHOP -->

			<!-- START SECTION SUBSCRIBE NEWSLETTER -->
			<div class="section bg_default small_pt small_pb">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-6">
							<div class="heading_s1 mb-md-0 heading_light">
								<h3>Subscribe Our Newsletter</h3>
							</div>
						</div>
						<div class="col-md-6">
							<div class="newsletter_form">
								<form action="<?= site_url('shopping/subscribe_newsletter') ?>" method="POST">
									<input type="text" name="email" required="" class="form-control rounded-0" placeholder="Enter Email Address">
									<button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- START SECTION SUBSCRIBE NEWSLETTER -->

		</div>
		<!-- END MAIN CONTENT -->


		<div class="modal fade" id="selectAddress">
			<div class="modal-dialog modal-dialog-centered modal-dialog-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Select your Address</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<?php if ($addresses) {
								foreach ($addresses as $address) { ?>
									<div class="col-md-12 col-sm-12 col-12">
										<div class="card">
											<div class="card-body">
												<h4 class="card-title"><?= $address['user_address_fname'] . ' ' . $address['user_address_lname'] ?></h4>
												<p class="card-text">
													<?= $address['user_address_company'] ?><br>
													<?= $address['user_address_email'] ?><br>
													<?= $address['address_line5'] ?><br>
													<?= $address['address_line3'] . ', ' . $address['address_line2'] ?><br>
													<?= $address['address_line1'] . '-' . $address['address_line4'] ?>
												</p>
												<div class="btn-group">
													<a href="javascript:;" onclick="show_Modal('<?= site_url('shopping/edit_address/' . $address['user_address_id']) ?>', '#tracking_Result', 'Edit Address')" data-toggle="modal" data-target="#tracking_Result_Modal" class="card-link btn btn-dark btn-sm">Edit</a>
													<a href="<?= site_url('place-order?mode=paypal&address=' . $address['user_address_id']) ?>" class="card-link btn btn-info btn-sm">Select</a>
													<a href="<?= site_url('shopping/delete_address/' . $address['user_address_id']) ?>" class="card-link btn btn-danger btn-sm">Remove</a>
												</div>
											</div>
										</div>
									</div>
								<?php }
							} else { ?>
								<div style="color: red;width: 100%;text-align: center;">
									<span>
										<p class="h3">No address found!</p>
										<a href="<?= site_url('account') ?>" class="btn btn-info">Add Address</a>
									</span>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="modal-footer">
						<a href="<?= site_url('account') ?>" class="btn btn-info">Add new Address</a>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="tracking_Result_Modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="mdl_title"></h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body" id="tracking_Result">
						Loading...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>