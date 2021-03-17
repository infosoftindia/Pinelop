
<style>
.order-notes textarea {
	height: auto;
}
a.payment_method{
	font-size: 20px;
	color: blue
	font-weight: 500;
}
.bg-custom{
	background: #f7f8fb !important;
    color: white !important;
    font-weight: 600;
    border: 1px solid #f7f8fb !important;
    border-radius: 0 0 0 0 !important;
}
.bg-custom:hover{
	background: #ff324d !important;
	color: white !important;
}
.bg-custom a:hover{
	color: white !important;
}
.card-no-border{
	border: 0 !important;
	border-radius: 0 0 0 0 !important;
}
</style>
<!-- START SECTION BREADCRUMB -->
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
					<li class="breadcrumb-item"><a href="<?=site_url()?>">Home</a></li>
					<li class="breadcrumb-item"><a href="<?=site_url('checkout')?>">Home</a></li>
					<li class="breadcrumb-item active">Select Payment</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<!-- START MAIN CONTENT -->
<div class="main_content">
	<!-- START SECTION SHOP -->
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 offset-md-3 offset-lg-3">
					<h3>Select a payment method</h3>
					<div class="card">
						<div class="card-body">
							<h4 class="card-title"></h4>
							<div id="accordion">
								<div class="card card-no-border">
									<div class="card-header bg-custom">
										<a class="collapsed card-link" data-toggle="collapse" href="#collapsePayPal">
											Pay with PayPal
										</a>
										</div>
									<div id="collapsePayPal" class="collapse" data-parent="#accordion" style="border: 1px solid;">
										<div class="card-body">
											<p>Paypal is an e-commerce payment system and financial technology company, available worldwide.</p>
											<p><a href="<?=site_url('place-order').'?mode=paypal&address='.$address?>" class="btn btn-sm btn-info">Continue with PayPal</a></p>
										</div>
									</div>
									<div class="card card-no-border">
										<div class="card-header bg-custom">
											<a class="collapsed card-link" data-toggle="collapse" href="#collapseCOD">
											Pay on Delivery (COD)
											</a>
										</div>
										<div id="collapseCOD" class="collapse" data-parent="#accordion" style="border: 1px solid;">
											<div class="card-body">
												<p>You can pay with any Debit card, Credit card, Google Pay, PhonePe, UPI, etc to our delivery executive when you receive your packages.</p>
												<p><a href="<?=site_url('place-order').'?mode=cod&address='.$address?>" class="btn btn-sm btn-info">Continue with COD</a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!---
						<div class="col-lg-5 col-md-5">
							<h3>Add your Card</h3>
							<div class="card">
								<div class="card-body">
									<form role="form" id="payment-form" method="POST" action="<?=base_url('shopping/save_card')?>">
										<div class="row">
											<div class="col-md-12">
												<div class="mb-3">
													<label for="cardName">Name on card</label>
													<input class="form-control atmcard" id="cardName" name="_card_name">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<label for="cardNumber">Card Number</label>
												<div class="input-group mb-3">
													<input class="form-control atmcard" id="cardNumber" name="_card_num">
													<div class="input-group-append">
														<span class="input-group-text"><i class="fa fa-credit-card"></i></span>
													</div>
													<label style="color: red" id="card-error" class="col-md-12"></label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-8 col-md-8">
												<label for="cardExpiry">Expire on</label>
												<div class="row">
													<div class="col-xs-6 col-md-6">
														<div class="form-group">
															<select class="form-control" id="cardExpiryMonth" name="_date_month">
																<option value="">Month</option>
																<option value="1">Jan</option>
																<option value="2">Feb</option>
																<option value="3">Mar</option>
																<option value="4">Apr</option>
																<option value="5">May</option>
																<option value="6">Jun</option>
																<option value="7">Jul</option>
																<option value="8">Aug</option>
																<option value="9">Sep</option>
																<option value="10">Oct</option>
																<option value="11">Nov</option>
																<option value="12">Dec</option>
															</select>
														</div>
													</div>
													<div class="col-xs-6 col-md-6">
														<div class="form-group">
															<select class="form-control" id="cardExpiryYear" name="_date_year">
																<option value="">Year</option>
																<?php for($y=date('Y');$y<=date('Y')+25;$y++){ ?>
																<option value="<?=$y?>"><?=$y?></option>
																<?php } ?>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4 pull-right">
												<div class="form-group">
													<label for="cardCVC">CVV Code</label>
													<input class="form-control numberOnly" id="cardCVC" name="_cvv" maxlength="4">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12" style="justify-content: center;">
												<button class="pay btn btn-success btn-block" type="save">Add your Card</button>
											</div>
										</div>
										<div class="row" style="display:none;">
											<div class="col-md-12">
												<p class="payment-errors"></p>
											</div>
										</div>
									</form>
								</div>
							</div>
						</form>
						</div>-->
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
						<form>
							<input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
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