
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
						<li>Place Order</li>
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
			<form action="" method="POST">
				<div class="row">
					<div class="col-lg-9 col-md-8">
						<div class="row border p-3">
							<div class="col-md-4">
								<b>Shipping address</b>
								<p><?=$address['user_address_fname'].' '.$address['user_address_lname']?><br>
								<?=$address['address_line1']?><br>
								<?=$address['address_line2']?><br>
								<?=$address['address_line3']?>, <?=$address['address_line5']?> - <?=$address['address_line4']?><br>
								India.<br>
								Phone: <?=$address['user_address_phone']?></p>
								<a href="javascript:void(0);" data-toggle="modal" data-target="#myModal"><?=($this->session->userdata('_delivery_note') == '')?'Add':'Edit'?> delivery instructions</a>
							</div>
							<div class="col-4">
								<b>Payment method</b>
								<p><?=($this->input->get('mode') == 'paytm')?'PayTm':'COD'?></p>
								<b>Billing address</b>
								<p>Same as delivery address</p>
							</div> 
							<div class="col-4">
								<p class="bold">Gift cards, Voucher & Promotional codes</p>   
								<div class="input-group mb-0">
									<input type="text" class="form-control" placeholder="Enter Code" id="coupon-code" value="<?=get_cookie('my_coupon')?>">
									<div class="input-group-append">
										<button class="input-group-text btn btn-success" type="button" id="apply-coupon">Apply</button>
									</div>
								</div>
								<p id="coupon_message" class="text-danger"></p>
							</div>
						</div>
						<div class="row border p-3">
							<div class="col-12">
								<div class="table_desc">
									<div class="cart_page table-responsive">
										<table>
											<thead>
												<tr>
													<th class="product_remove">Delete</th>
													<th class="product_thumb">Image</th>
													<th class="product_name">Product</th>
													<th class="product-price">Price</th>
													<th class="product_total">Total</th>
												</tr>
											</thead>
											<tbody>
												<?php $priceTotal = 0; foreach($carts as $cart){ ?>
												<tr>
													<td class="product_remove"><a href="<?=base_url('shopping/remove_cart/'.$cart['carts_id'])?>"><i class="fa fa-trash-o"></i></a></td>
													<td class="product_thumb"><a href="#"><img src="<?=base_url(getenv('uploads').$cart['posts_cover'])?>" alt="" style="height: 100px; width: auto;"></a></td>
													<td class="product_name"><a href="#"><?=$cart['posts_title']?> (<?=$cart['carts_quantity']?>)</a></td>
													<?php
														$price = $cart['products_price'];
														$salePrice = $cart['products_sale_price'];
														if($salePrice != '0' && $salePrice != '' && $salePrice < $price){
															$sPrice = $salePrice;
														}else{
															$sPrice = $price;
														}
														$priceTotal+=$sPrice*$cart['carts_quantity'];
													?>
													<td class="product-price"><?=pPrice($sPrice)?></td>
													<td class="product_total"><?=pPrice($cart['carts_quantity']*$sPrice)?></td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="card">
							<div class="card-body">
								<a href="<?=site_url(($this->input->get('mode') == 'paytm')?'shopping/make_payment':'shopping/complete_cod_order')?>" class="btn btn-info btn-block mb-3">Place Your Order and Pay </a>
								<p class="text-justify" style="color: gray">You'll be securely payment page to complete your purchase. </p>
								<p><b>Order Summary</b></p>
								<div class="d-flex justify-content-between">
									<span>Sub Total:</span> 	  
									<span>&#8377; <?=($priceTotal)?></span>
								</div>
								<div class="d-flex justify-content-between">
									<span>Coupon Applied:</span> 	  
									<span id="discount_amount">-<?=pPrice(0)?></span>
								</div>
								<hr>
								<div class="d-flex justify-content-between" style="font-size: 18px;">
									<span class="bold">Order Total:</span>
									<span class="bold" id="total_amount"> <?=pPrice($priceTotal)?></span>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Checkout page section end-->

