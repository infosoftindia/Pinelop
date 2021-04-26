<style>
	.order-notes textarea {
		height: auto;
	}

	a.payment_method {
		font-size: 20px;
		color: blue;
		font-weight: 500;
	}

	.bg-custom {
		background: #2e6ed5 !important;
		color: white !important;
		font-weight: 600;
		border: 1px solid black !important;
		border-radius: 0 0 0 0 !important;
	}

	.bg-custom a:hover {
		color: white !important;
	}

	.card-no-border {
		border: 0 !important;
		border-radius: 0 0 0 0 !important;
	}

	.black {
		color: #141515;
	}

	p {
		color: #141515;
		line-height: 28px;
		margin-bottom: 25px;
	}
</style>
<!--breadcrumbs area start-->
<div class="breadcrumb_section bg_gray page-title-mini">
	<div class="container">
		<!-- STRART CONTAINER -->
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="page-title">
					<h1>Checkout</h1>
				</div>
			</div>
			<div class="col-md-6">
				<ol class="breadcrumb justify-content-md-end">
					<li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
					<li class="breadcrumb-item"><a href="<?= site_url('checkout') ?>">Checkout</a></li>
					<li class="breadcrumb-item active">Complete Payment</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- END CONTAINER-->
</div>

<div class="main_content">
	<!-- START SECTION SHOP -->
	<div class="section">
		<div class="container">
			<div class="checkout_form">
				<form action="" method="POST">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="row border p-3">
								<div class="col-md-4">
									<b class="black">Shipping address</b>
									<p><?= $address['user_address_fname'] . ' ' . $address['user_address_lname'] ?><br>
										<?= $address['address_line1'] ?><br>
										<?= $address['address_line2'] ?><br>
										<?= $address['address_line3'] ?>, <?= $address['address_line5'] ?> - <?= $address['address_line4'] ?><br>
										<?= $address['address_line6'] ?>.<br>
										Phone: <?= $address['user_address_phone'] ?></p>
									<!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal"><?= ($this->session->userdata('_delivery_note') == '') ? 'Add' : 'Edit' ?> delivery instructions</a> -->
								</div>
								<div class="col-4">
									<b class="black">Payment method</b>
									<p><?= 'PayPal' //($this->input->get('mode') == 'paypal') ? 'PayPal' : 'COD' 
										?></p>
									<!-- <b class="black">Billing address</b>
									<p>Same as delivery address</p> -->
								</div>
								<div class="col-4">
									<!-- <p class="bold">Gift cards, Voucher & Promotional codes</p>
									<div class="input-group mb-0">
										<input type="text" class="form-control" placeholder="Enter Code" id="coupon-code" value="<?= get_cookie('my_coupon') ?>">
										<div class="input-group-append">
											<button class="input-group-text btn btn-success btn-sm" type="button" id="apply-coupon">Apply</button>
										</div>
									</div>
									<p id="coupon_message" class="text-danger"></p> -->
								</div>
							</div>
							<div class="row border p-3">
								<div class="col-12">
									<div class="table-responsive shop_cart_table">
										<table class="table">
											<thead>
												<tr>
													<th class="product-thumbnail">#</th>
													<th class="product-name">Product</th>
													<th class="product-price">Price</th>
													<th class="product-subtotal">Total</th>
													<th class="product-remove">Remove</th>
												</tr>
											</thead>
											<tbody>
												<?php $total = 0;
												$priceTotal = 0;
												foreach ($carts as $cart) { ?>
													<?php
													$price = $cart['products_price'];
													$salePrice = $cart['products_sale_price'];
													if ($salePrice != '0' && $salePrice != '' && $salePrice < $price) {
														$sPrice = $salePrice;
													} else {
														$sPrice = $price;
													}
													if ($cart['variable']['cart_variables_price'] > 0) {
														$sPrice = $cart['variable']['cart_variables_price'];
													}
													$priceTotal += $sPrice * $cart['carts_quantity'];
													?>

													<tr>
														<td class="product-thumbnail"><a href="<?= site_url('product/' . $cart['posts_slug']) ?>"><img src="<?= base_url(getenv('uploads') . $cart['carts_image']) ?>" alt="product1" style="height: 80px; object-fit: contain;"></a></td>
														<td class="product-name" data-title="Product"><a href="<?= site_url('product/' . $cart['posts_slug']) ?>"><?= $cart['posts_title'] ?> (<?= $cart['carts_quantity'] ?>)</a>
															<?php if ($cart['variable']) {
																foreach ($cart['variable'] as $variable) { ?>
																	<small class="ml-3"><?= '<i>' . $variable['product_attributes_name'] . '</i>: ' . $variable['cart_variables_value']  ?></small><br>
															<?php }
															} ?>
														</td>
														<td class="product-price" data-title="Price"><?= pPrice($sPrice) ?></td>
														<td class="product-subtotal" data-title="Total"><?= pPrice($sPrice * $cart['carts_quantity']) ?></td>
														<?php
														$total += $sPrice * $cart['carts_quantity'];
														?>
														<td class="product-remove" data-title="Remove"><a href="<?= base_url('shopping/remove_cart/' . $cart['carts_id']) ?>"><i class="ti-close"></i></a></td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="card">
								<div class="card-body">
									<a href="<?= site_url(($this->input->get('mode') == 'paypal') ? 'shopping/make_payment' : 'shopping/make_payment') . '?address=' . $add ?>" class="btn btn-fill-out mb-3">Place Your Order and Pay </a>
									<p class="text-justify" style="color: green"><i class="linearicons-lock text-success"></i>Secure transactions. </p>
									<p><b>Order Summary</b></p>
									<div class="d-flex justify-content-between">
										<span>Sub Total:</span>
										<span><?= pPrice($priceTotal) ?></span>
									</div>
									<!-- <div class="d-flex justify-content-between">
										<span>Coupon Applied:</span>
										<span id="discount_amount">-<?= pPrice(0) ?></span>
									</div> -->
									<hr>
									<div class="d-flex justify-content-between" style="font-size: 18px;">
										<span class="bold">Order Total:</span>
										<span class="bold" id="total_amount"> <?= pPrice($priceTotal) ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END SECTION SHOP -->