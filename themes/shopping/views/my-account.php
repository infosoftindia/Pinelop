		<div class="breadcrumb_section bg_gray page-title-mini">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="page-title">
							<h1>My Account</h1>
						</div>
					</div>
					<div class="col-md-6">
						<ol class="breadcrumb justify-content-md-end">
							<li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
							<li class="breadcrumb-item active">My Account</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!-- END SECTION BREADCRUMB -->
		<!-- START MAIN CONTENT -->
		<div class="main_content">
			<!-- START SECTION SHOP -->
			<div class="section">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="alert alert-info">You are currently logged in as <?= $user['users_first_name'] . ' ' . $user['users_last_name'] ?></div>
						</div>
						<div class="col-lg-3 col-md-4">
							<div class="dashboard_menu">
								<ul class="nav nav-tabs flex-column" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Dashboard</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>My Address</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Account details</a>
									</li>
									<?php if ($this->session->userdata('user_role') == '121') { ?>
										<li class="nav-item">
											<a class="nav-link" id="user-cart-tab" data-toggle="tab" href="#user-cart" role="tab" aria-controls="user-cart" aria-selected="true"><i class="ti-shopping-cart"></i>Cart</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="user-wishlist-tab" data-toggle="tab" href="#user-wishlist" role="tab" aria-controls="user-wishlist" aria-selected="true"><i class="ti-heart"></i>Wishlist</a>
										</li>
									<?php } else { ?>
										<?php if (!$this->session->userdata('user_social') == 'google') { ?>
											<li class="nav-item">
												<a class="nav-link" id="password-detail-tab" data-toggle="tab" href="#password-detail" role="tab" aria-controls="password-detail" aria-selected="true"><i class="ti-id-badge"></i>Change Password</a>
											</li>
										<?php } ?>
										<li class="nav-item">
											<a class="nav-link" href="<?= site_url('shopping/logout') ?>"><i class="ti-lock"></i>Logout</a>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-md-8">
							<div class="tab-content dashboard_content">
								<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
									<?php if ($this->session->flashdata('info')) { ?>
										<div class="alert alert-info"><?= $this->session->flashdata('info') ?></div>
									<?php } ?>
									<?php if ($this->session->flashdata('error')) { ?>
										<div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
									<?php } ?>
									<div class="card">
										<div class="card-header">
											<h3>Dashboard</h3>
										</div>
										<div class="card-body">
											<p>From your account dashboard. you can easily check &amp; view your <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">recent orders</a>, manage your <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">shipping and billing addresses</a> and <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">edit your password and account details.</a></p>
										</div>
									</div>
								</div>
								<?php if ($this->session->userdata('user_role') == '121') { ?>
									<div class="tab-pane fade" id="user-cart" role="tabpanel" aria-labelledby="user-cart-tab">
										<div class="card">
											<div class="card-header">
												<h3>Cart</h3>
											</div>
											<div class="card-body">
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
																				if ($cart['variable']['cart_variables_price'] > 0) {
																					$sPrice = $cart['variable']['cart_variables_price'];
																				}
																				?>
																				<input value="<?= $cart['carts_id'] ?>" type="hidden" name="cart[]">

																				<tr>
																					<td class="product-thumbnail"><a href="<?= site_url('product/' . $cart['posts_slug']) ?>"><img src="<?= site_url('themes/shopping') ?>/assets/load.gif" class="lazy" data-src="<?= base_url(getenv('uploads') . $cart['carts_image']) ?>" alt="product1" style="height: 80px; object-fit: contain;"></a></td>
																					<td class="product-name" data-title="Product">
																						<a href="<?= site_url('product/' . $cart['posts_slug']) ?>"><?= $cart['posts_title'] ?></a><br>
																						<?php if ($cart['variable']) {
																							foreach ($cart['variable'] as $variable) { ?>
																								<small class="ml-3"><?= '<i>' . $variable['product_attributes_name'] . '</i>: ' . $variable['cart_variables_value']  ?></small><br>
																						<?php }
																						} ?>
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
														<div class="col-lg-6 col-md-6 mb-3 mb-md-0"> </div>
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
															</div>
														</div>
													</div>
												<?php } else {
													echo '<center style="font-size: 20px;" class="m-5 text-danger">Your cart is empty!</center>';
												} ?>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="user-wishlist" role="tabpanel" aria-labelledby="user-wishlist-tab">
										<div class="card">
											<div class="card-header">
												<h3>Wishlist</h3>
											</div>
											<div class="card-body">
												<form action="#">
													<?php if ($wishlists) { ?>
														<div class="row">
															<div class="col-12">
																<div class="table-responsive wishlist_table">
																	<table class="table">
																		<thead>
																			<tr>
																				<th class="product-thumbnail" width="5%">#</th>
																				<th class="product-name" width="25%">Product</th>
																				<th class="product-price" width="10%">Price</th>
																				<th class="product-stock-status" width="15%">Stock Status</th>
																				<th class="product-add-to-cart" width="25%">Option</th>
																				<th class="product-remove" width="20%">Remove</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php foreach ($wishlists as $wishlist) { ?>
																				<tr>
																					<td class="product-thumbnail"><a href="<?= site_url('product/' . $wishlist['posts_slug']) ?>"><img src="<?= base_url(getenv('uploads') . $wishlist['posts_cover']) ?>" style="height: 80px; object-fit: contain;" alt="product1"></a></td>
																					<td class="product-name" data-title="Product"><a href="<?= site_url('product/' . $wishlist['posts_slug']) ?>"><?= $wishlist['posts_title'] ?></a></td>
																					<td class="product-price" data-title="Price"><?= pPrice($wishlist['products_price']) ?></td>
																					<td class="product-stock-status" data-title="Stock Status"><span class="badge badge-pill badge-success">In Stock</span></td>
																					<td class="product-add-to-cart"><a href="<?= base_url('product/' . $wishlist['posts_slug']) ?>" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> View Product</a></td>
																					<td class="product-remove" data-title="Remove"><a href="<?= base_url('shopping/remove_wishlist/' . $wishlist['wishlists_id']) ?>"><i class="ti-close"></i></a></td>
																				</tr>
																			<?php } ?>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													<?php } else {
														echo '<center style="font-size: 20px;" class="m-5 text-danger">Your wishlist is empty!</center>';
													} ?>
												</form>
											</div>
										</div>
									</div>
								<?php } ?>
								<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
									<?php if ($orders) { /* print_r($orders); */
										$cnt = 1;
										foreach ($orders as $order) { ?>
											<div class="card">
												<div class="card-header">
													<div class="row">
														<div class="col-md-3">
															<b>Order placed</b><br>
															<?= date('M d, Y', strtotime($order['orders_created_on'])) ?>
														</div>
														<div class="col-md-3">
															<b>Ship to</b><br>
															<?= $order['user_address_fname'] . ' ' . $order['user_address_lname'] ?>
														</div>
														<div class="col-md-3">
															<b>Status</b><br>
															<?= (($order['orders_status'] == 1) ? 'Completed' : ((($order['orders_status'] == 2) ? 'Processing' : ((($order['orders_status'] == 3) ? 'Dispatched' : ((($order['orders_status'] == 4) ? 'Out for Delivery' : (($order['orders_status'] == 99) ? 'Cancelled' : 'Order Received')))))))) ?>
														</div>
														<div class="col-md-3 text-right">
															<b>Order #<?= $order['orders_id'] ?></b><br>
															<?= ($order['orders_status'] == 1) ? '<a href="' . site_url('shopping/invoice/' . ((($order['orders_id']) * 5683) - 5)) . '">Invoice</a>' : '' ?>
														</div>
													</div>
												</div>
												<div class="card-body">
													<h4><?= (($order['orders_status'] == 1) ? 'Completed' : ((($order['orders_status'] == 2) ? 'Processing' : ((($order['orders_status'] == 3) ? 'Dispatched' : ((($order['orders_status'] == 4) ? 'Out for Delivery' : (($order['orders_status'] == 99) ? 'Cancelled' : 'Order Received')))))))) ?></h4>
													<div class="row">
														<div class="col-md-8">
															<?php if ($order['products']) {
																foreach ($order['products'] as $product) { ?>
																	<div class="row">
																		<div class="col-md-2">
																			<img src="<?= base_url(getenv('uploads') . $product['posts_cover']) ?>" class="img-fluid">
																		</div>
																		<div class="col-md-9">
																			<a href="<?= site_url('product/' . $product['posts_slug']) ?>"><?= $product['posts_title'] ?></a>
																			<?php
																			$status = 0;
																			if ($product['return']) {
																				$status = $product['return']['return_orders_status'];
																				if ($status == '0') {
																					echo '<span class="badge badge-warning">Return Requested</span>';
																				} elseif ($status == '1') {
																					echo '<span class="badge badge-success">Product Returned</span>';
																				} elseif ($status == '2') {
																					echo '<span class="badge badge-danger">Return Request Rejected</span>';
																				} elseif ($status == '3') {
																					echo '<span class="badge badge-info">Return Request Processing</span>';
																				} else {
																					echo '<span class="badge badge-warning">Return Requested</span>';
																				}
																			}
																			?>
																			<br>
																			<!-- Sold by: <?= $product['users_first_name'] . ' ' . $product['users_last_name'] ?><br> -->
																			<?= pPrice($product['order_products_price']) ?>
																			<?php if ($order['orders_status'] == '1') { ?>
																				<?php if ($status == '0') {
																					if ($product['review'] == 0) { ?>
																						<br>
																						<a href="#" onclick="show_Modal('<?= site_url('shopping/rate_product/' . $product['posts_id']) ?>', '#tracking_Result', 'Rate <?= $product['posts_title'] ?>')" data-toggle="modal" data-target="#tracking_Result_Modal" class="label label-info p-1 px-3" style="background-color: #ff324d75; border-radius: 3px">Rate this product</a>
																			<?php }
																				}
																			} ?>
																		</div>
																	</div>
																	<hr>
															<?php }
															} ?>
														</div>
														<div class="col-md-4 text-right">
															<?php if ($order['orders_status'] != '99') { ?>
																<?php if ($order['orders_status'] == '0') { ?>
																	<a href="javascript:;" class="btn btn-fill-line mb-2 btn-sm" onclick="show_Modal('<?= site_url('shopping/cancel_form/' . ((($order['orders_id']) * 5683) - 5)) ?>', '#tracking_Result', 'Cancel Order')" data-toggle="modal" data-target="#tracking_Result_Modal">Cancel Order</a>
																<?php } else { ?>
																	<!-- <a href="javascript:;" class="btn btn-block btn-primary btn-sm mb-3" onclick="tracking_Package('<?= ((($order['orders_id']) * 5683) - 5) ?>')" data-toggle="modal" data-target="#tracking_Result_Modal">Track Package</a> -->
																	<a href="javascript:;" class="btn btn-fill-line mb-2 btn-sm" onclick="show_Modal('<?= site_url('shopping/return_form/' . ((($order['orders_id']) * 5683) - 5)) ?>', '#tracking_Result', 'Return Product')" data-toggle="modal" data-target="#tracking_Result_Modal">Request Return</a>

																	<a href="javascript:;" class="btn btn-fill-out btn-sm" onclick="show_Modal('<?= site_url('shopping/order_feedback/' . ((($order['orders_id']) * 5683) - 5)) ?>', '#tracking_Result', 'Feedback')" data-toggle="modal" data-target="#tracking_Result_Modal">Give Feedback&nbsp;</a>
																	<!-- <a href="javascript:;" class="btn btn-block btn-secondary btn-sm mb-1 mt-0">Write Review</a> -->
																<?php }  ?>
															<?php }  ?>
														</div>
													</div>
												</div>
											</div>
									<?php }
									} ?>
								</div>
								<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
									<div class="row">
										<?php if ($addresses) {
											foreach ($addresses as $address) { ?>
												<div class="col-lg-6">
													<div class="card mb-3 mb-lg-0">
														<div class="card-header">
															<h3><?= $address['user_address_fname'] . ' ' . $address['user_address_lname'] ?></h3>
														</div>
														<div class="card-body">
															<address><?= $address['user_address_company'] ?><br>
																<br><?= $address['user_address_email'] ?><br>
																<?= $address['user_address_phone'] ?><br>
																<?= $address['address_line5'] . ', ' . $address['address_line6'] ?> <br>
																<?= $address['address_line3'] . ', ' . $address['address_line2'] ?> <br>
																<?= $address['address_line1'] . '-' . $address['address_line4'] ?>
															</address>
															<a href="<?= site_url('shopping/delete_address/' . $address['user_address_id']) ?>" class="btn btn-fill-out">Remove</a>
														</div>
													</div>
												</div>
											<?php }
										}
										if ($this->session->userdata('user_role') != '121') { ?>
											<div class="col-md-4 col-sm-6 col-12 pt-4">
												<div class="card h-100 align-items-center">
													<div class="card-body h-100 d-flex align-items-center">
														<div class="border-add-new" onclick="show_Modal('<?= site_url('shopping/add_address') ?>', '#tracking_Result', 'Add New Address')" data-toggle="modal" data-target="#tracking_Result_Modal" style="display: flex; align-items: center; justify-content: center; cursor: pointer;">
															<i class="fa fa-plus d-flex" style="font-size: 75px; color: #a0a0a0;justify-content: center; line-height: normal;"></i>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
									<div class="card">
										<div class="card-header">
											<h3>Account Details</h3>
										</div>
										<div class="card-body">
											<!-- <p>Already have an account? <a href="#">Log in instead!</a></p> -->
											<form action="<?= site_url('shopping/change_profile') . ((($this->input->get('user') > 0 && $this->session->userdata('user_role') == '121')) ? '?user=' . $this->input->get('user') : '') ?>" method="POST">
												<div class="row">
													<div class="form-group col-md-6">
														<label>First Name <span class="required">*</span></label>
														<input class="form-control" name="fname" value="<?= $user['users_first_name'] ?>" type="text">
													</div>
													<div class="form-group col-md-6">
														<label>Last Name <span class="required">*</span></label>
														<input class="form-control" name="lname" value="<?= $user['users_last_name'] ?>" type="text">
													</div>
													<div class="form-group col-md-12">
														<label>Email Address <span class="required">*</span></label>
														<input required="" class="form-control" name="email" type="email" value="<?= $user['users_email'] ?>" readonly disabled>
													</div>
													<div class="form-group col-md-12">
														<label>Phone <span class="required">*</span></label>
														<input required="" class="form-control" name="mobile" type="text" value="<?= $user['users_mobile'] ?>">
													</div>
													<div class="col-md-12">
														<button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="password-detail" role="tabpanel" aria-labelledby="password-detail-tab">
									<div class="card">
										<div class="card-header">
											<h3>Change Password</h3>
										</div>
										<div class="card-body">
											<form action="<?= site_url('shopping/change_password') ?>" method="POST">
												<div class="row">
													<div class="form-group col-md-12">
														<label>Old Password <span class="required">*</span></label>
														<input class="form-control" name="old-password" type="password" required>
													</div>
													<div class="form-group col-md-12">
														<label>New Password <span class="required">*</span></label>
														<input class="form-control" name="new-password" type="password" required>
													</div>
													<div class="form-group col-md-12">
														<label>Confirm Password <span class="required">*</span></label>
														<input class="form-control" name="confirm-password" type="password" required>
													</div>
													<div class="col-md-12">
														<button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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