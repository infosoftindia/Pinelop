
		<style>
			.order-notes textarea {
				height: auto;
			}
			a.payment_method{
				font-size: 20px;
				color: blue
				font-weight: 500;
			}
		</style>
		<!--breadcrumbs area start-->
		<div class="breadcrumbs_area mt-45">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="breadcrumb_content">
							<ul>
								<li><a href="<?=site_url()?>">home</a></li>
								<li>Checkout</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--breadcrumbs area end-->
		<!--Checkout page section-->
		<div class="Checkout_section mt-45">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<?php if(!$this->session->userdata('user_id')){ ?>
						<div class="user-actions">
							<h3> 
								<i class="fa fa-file-o" aria-hidden="true"></i>
								Returning customer?
								<a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">Click here to login</a>     
							</h3>
							<div id="checkout_login" class="collapse" data-parent="#accordion">
								<div class="checkout_info">
									<p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>
									<form action="<?=site_url('admin/user_login_script')?>" method="POST">
										<div class="form_group">
											<label>Username or email <span>*</span></label>
											<input type="text" name="email">
										</div>
										<div class="form_group">
											<label>Passwords <span>*</span></label>
											<input type="password" name="password">
										</div>
										<div class="form_group group_3">
											<button type="submit">login</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php } ?>
						<div class="user-actions">
							<h3> 
								<i class="fa fa-file-o" aria-hidden="true"></i>
								Returning customer?
								<a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon" aria-expanded="true">Click here to enter your code</a>     
							</h3>
							<div id="checkout_coupon" class="collapse" data-parent="#accordion">
								<div class="checkout_info">
									<form action="#">
										<input placeholder="Coupon code" type="text">
										<button type="submit">Apply coupon</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="checkout_form">
					<form action="" method="POST">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<h3>Shipping Details</h3>
								<div class="row">
									<div class="col-lg-6 mb-20">
										<label>First Name <span>*</span></label>
										<input type="text" name="fname" value="<?=$this->session->userdata('user_fname')?>" required>    
									</div>
									<div class="col-lg-6 mb-20">
										<label>Last Name  <span>*</span></label>
										<input type="text" name="lname" value="<?=$this->session->userdata('user_lname')?>"> 
									</div>
									<div class="col-12 mb-20">
										<label>Company Name</label>
										<input type="text" name="company" value="">     
									</div>
									<div class="col-12 mb-20">
										<label for="country">Country <span>*</span></label>
										<select class="niceselect_option" name="cuntry" id="country" required>
											<option value="India" selected>India</option>
										</select>
									</div>
									<div class="col-12 mb-20">
										<label>Street address  <span>*</span></label>
										<input placeholder="House number and street name" type="text" name="street" required>     
									</div>
									<div class="col-12 mb-20">
										<input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="street2">     
									</div>
									<div class="col-12 mb-20">
										<label>Town / City <span>*</span></label>
										<input type="text" name="city" required>    
									</div>
									<div class="col-12 mb-20">
										<label>State <span>*</span></label>
										<input type="text" name="state" required>    
									</div>
									<div class="col-lg-6 mb-20">
										<label>Phone<span>*</span></label>
										<input type="text" name="phone" value="<?=$this->session->userdata('user_phone')?>" required> 
									</div>
									<div class="col-lg-6 mb-20">
										<label> Email Address <span>*</span></label>
										<input type="text" name="email" value="<?=$this->session->userdata('user_email')?>" required> 
									</div>
									<div class="col-12 mb-20">
										<input id="account" type="checkbox" class="create_account_checkbox" name="do_register" value="1">
										<label for="account">Create an account?</label>
										<div class="show_register_password" style="display: none">
											<div class="card-body1">
												<label> Account password <span>*</span></label>
												<input placeholder="password" type="password" name="password">  
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="order-notes">
											<label for="order_note">Order Notes</label>
											<textarea id="order_note" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" name="delivery_message"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<h3>Your order</h3>
								<div class="order_table table-responsive">
									<table>
										<thead>
											<tr>
												<th>Product</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
											<?php $total = 0; foreach($carts as $cart){ ?>
											<?php
												$price = $cart['products_price'];
												$salePrice = $cart['products_sale_price'];
												if($salePrice != '0' && $salePrice != '' && $salePrice < $price){
													$sPrice = $salePrice;
												}else{
													$sPrice = $price;
												}
											?>
											<tr>
												<td> <?=$cart['posts_title']?> <strong> × <?=$cart['carts_quantity']?></strong></td>
												<td> <?=pPrice($total += $cart['carts_quantity']*$sPrice)?></td>
											</tr>
											<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th>Cart Subtotal</th>
												<td><?=pPrice($total)?></td>
											</tr>
											<!--<tr>
												<th>Shipping</th>
												<td><strong>$5.00</strong></td>
											</tr>-->
											<tr class="order_total">
												<th>Order Total</th>
												<td><strong><?=pPrice($total)?></strong></td>
											</tr>
										</tfoot>
									</table>
								</div>
								<button type="submit" class="btn btn-outline-info btn-block">
									<i class="ion-android-done"></i>
									Continue to Payment
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Checkout page section end-->

