
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
	background: #2e6ed5 !important;
	color: white !important;
	font-weight: 600;
	border: 1px solid black !important;
	border-radius: 0 0 0 0 !important;
}
.bg-custom a:hover{
	color: white !important;
}
.card-no-border{
	border: 0 !important;
	border-radius: 0 0 0 0 !important;
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
						<li><a href="<?=site_url('checkout')?>">Checkout</a></li>
						<li><a href="<?=site_url('select-payment')?>">Select Payment</a></li>
						<li><a href="<?=site_url('place-order')?>">Place Order</a></li>
						<li>Make Payment</li>
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
		<div class="checkout_form">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="card">
						<div class="card-header text-black">
							<img src="<?=base_url('themes/shopping/assets/img/powered-by.png')?>" style="height: 30px">
						</div>
						<div class="card-body">
							<div class="text-dark">
								<div class="d-flex justify-content-start">
									<h4>Pay with PayTm </h4>
								</div>
								<p><small>Paytm is an Indian e-commerce payment system and financial technology company, based out of Noida, India.</small></p>
								<div class="row form">
									<div class="form-group col-lg-12 col-12">
										<label>&nbsp;</label>
										<a href="<?=site_url('shopping/make_payment')?>" id="" class="btn btn-warning btn-block">Pay with PayTm</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Checkout page section end-->
<?php /* ?>
<!--Checkout page section-->
<div class="Checkout_section mt-45">
	<div class="container">
		<div class="checkout_form">
			<form action="<?=site_url('shopping/complete_payment')?>" method="POST">
				<script
					src="https://checkout.razorpay.com/v1/checkout.js"
					data-key="<?=getenv('razor_api_key')?>"
					data-order_id="<?=$order_id?>"
					data-buttontext="Pay with Razorpay"
					data-name="Shopping"
					data-description="Order with Shopping.in"
					data-prefill.method="card"
					data-image="<?=base_url('themes/shopping/assets/img/logo/logo.png')?>"
					data-prefill.name="<?=$address['user_address_fname'].' '.$address['user_address_lname']?>"
					data-prefill.email="<?=$address['user_address_email']?>"
					data-prefill.contact="<?=$address['user_address_phone']?>"
					data-theme.color="#2e6ed5"
				></script>
				<input type="hidden" name="p_order_id" value="<?=$order_id?>">
			</form>
			
		</div>
	</div>
</div>
<!--Checkout page section end-->

<?php */ ?>

