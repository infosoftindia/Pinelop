

<!--breadcrumbs area start-->
<div class="breadcrumbs_area mt-45">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="<?=site_url()?>">home</a></li>
						<li>My account</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->

<style>
	.rad-info-box {
		margin-bottom: 16px;
		box-shadow: 1px 1px 2px 0 #CCCCCC;
		padding: 20px;
		box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
		background: white !important;
	}
	.rad-info-box i {
		display: block;
		background-clip: padding-box;
		margin-right: 15px;
		height: 60px;
		width: 60px;
		border-radius: 100%;
		line-height: 60px;
		text-align: center;
		font-size: 4.4em;
		position: absolute;
	}
	.rad-info-box .value,
	.rad-info-box .heading {
		display: block;
		position: relative;
		color: #515d6e;
		text-align: right;
		z-index: 10;
	}
	.rad-info-box .heading {
		font-size: 1.2em;
		font-weight: 300;
		text-transform: uppercase;
	}
	.rad-info-box .value {
		font-size: 1em;
		font-weight: 600;
		margin-top: 5px;
		font-style: italic;
	}
	.rad-txt-primary {
		color: #1C7EBB;
	}
	.rad-txt-success {
		color: #23AE89;
	}
	.rad-txt-danger {
		color: #E94B3B;
	}
	.rad-txt-warning {
		color: #F98E33;
	}
	.rad-txt-violet {
		color: #6A55C2;
	}
	.border-add-new{
		border: 2px dashed gray;
		height: 125px;
		width: 125px;
	}
	
</style>

<!-- my account start  -->
<section class="main_content_area">
	<div class="container">
		<div class="account_dashboard">
			<div class="row">
				<div class="col-sm-12 col-md-3 col-lg-3">
					<!-- Nav tabs -->
					<div class="dashboard_tab_button">
						<ul role="tablist" class="nav flex-column dashboard-list">
							<li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
							<li><a href="#orders" data-toggle="tab" class="nav-link" id="pOrder">Orders</a></li>
							<li><a href="#address" data-toggle="tab" class="nav-link" id="pAddress">Addresses</a></li>
							<li><a href="#account-details" data-toggle="tab" class="nav-link" id="pSecurity">Account &amp; Security</a></li>
							<li><a href="#subscribe" data-toggle="tab" class="nav-link" id="pSubscription">Subscription</a></li>
							<li><a href="<?=site_url('admin/logout')?>" class="nav-link">logout</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-9 col-lg-9">
					<!-- Tab panes -->
					<div class="tab-content dashboard_content">
						<div class="tab-pane fade show active" id="dashboard">
							<?php if($this->session->flashdata('info')){ ?>
								<div class="alert alert-info"><?=$this->session->flashdata('info')?></div>
							<?php } ?>
							<?php if($this->session->flashdata('error')){ ?>
								<div class="alert alert-danger"><?=$this->session->flashdata('error')?></div>
							<?php } ?>
							<h3>Dashboard </h3>
							<div class="row">
								<div class="col-lg-4 col-md-6 col-12">
									<div class="rad-info-box rad-txt-success">
										<i class="fa fa-gift"></i>
										<span class="heading">Orders</span>
										<a class="value" href="javascript:clickk('#pOrder')"><span>View <span class="fa fa-angle-double-right"></span></span></a>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="rad-info-box rad-txt-primary">
										<i class="fa fa-lock"></i>
										<span class="heading">Security</span>
										<a class="value" href="javascript:clickk('#pSecurity')"><span>View <span class="fa fa-angle-double-right"></span></span></a>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="rad-info-box rad-txt-danger">
										<i class="fa fa-map-marker"></i>
										<span class="heading">Address</span>
										<a class="value" href="javascript:clickk('#pAddress')"><span>View <span class="fa fa-angle-double-right"></span></span></a>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="rad-info-box">
										<i class="fa fa-envelope"></i>
										<span class="heading">Subscription</span>
										<a class="value" href="javascript:clickk('#pSubscription')"><span>View <span class="fa fa-angle-double-right"></span></span></a>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="orders">
							<h3>Orders</h3>
							<?php if($orders){ /* print_r($orders); */ $cnt = 1; foreach($orders as $order){ ?>
							<div class="card my-2">
								<div class="card-header">
									<div class="row">
										<div class="col-md-3">
											<b>Order placed</b><br>
											<?=date('M d, Y', strtotime($order['orders_created_on']))?>
										</div>
										<div class="col-md-3">
											<b>Ship to</b><br>
											<?=$order['orders_address_fname'].' '.$order['orders_address_lname']?>
										</div>
										<div class="offset-md-3 col-md-3 text-right">
											<b>Order #<?=$order['orders_id']?></b><br>
											<a href="" class="mr-3">Details</a>	<a href="<?=site_url('shopping/invoice/'.((($order['orders_id'])*5683)-5))?>">Invoice</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<h4><?=(($order['orders_status'] == 1)?'Completed':((($order['orders_status'] == 2)?'Processing':((($order['orders_status'] == 3)?'Dispatched':((($order['orders_status'] == 4)?'Out for Delivery':(($order['orders_status'] == 99)?'Cancelled':'Order Received'))))))))?></h4>
									<div class="row">
										<div class="col-md-9">
											<?php if($order['products']){ foreach($order['products'] as $product){ ?>
											<div class="row">
												<div class="col-md-2">
													<img src="<?=base_url(getenv('uploads').$product['posts_cover'])?>" class="img-fluid">
												</div>
												<div class="col-md-9">
													<a href="<?=site_url('product/'.$product['posts_slug'])?>"><?=$product['posts_title']?></a>
													<?php
														if($product['return']){
															$status = $product['return']['return_orders_status'];
															if($status == '0'){
																echo '<span class="badge badge-warning">Return Requested</span>';
															}elseif($status == '1'){
																echo '<span class="badge badge-success">Product Returned</span>';
															}elseif($status == '2'){
																echo '<span class="badge badge-danger">Return Request Rejected</span>';
															}elseif($status == '3'){
																echo '<span class="badge badge-info">Return Request Processing</span>';
															}else{
																echo '<span class="badge badge-warning">Return Requested</span>';
															}
														}
													?>
													<br>
													Sold by: <?=$product['users_first_name'].' '.$product['users_last_name']?><br>
													<?=pPrice($product['order_products_price'])?>
												</div>
											</div>
											<hr>
											<?php } } ?>
										</div>
										<div class="col-md-3 text-right">
											<!-- <a href="javascript:;" class="btn btn-block btn-primary btn-sm mb-3" onclick="tracking_Package('<?=((($order['orders_id'])*5683)-5)?>')" data-toggle="modal" data-target="#tracking_Result_Modal">Track Package</a> -->
											<a href="javascript:;" class="btn btn-block btn-primary btn-sm mb-1 mt-0" onclick="show_Modal('<?=site_url('shopping/return_form/'.((($order['orders_id'])*5683)-5))?>', '#tracking_Result', 'Return Product')" data-toggle="modal" data-target="#tracking_Result_Modal">Request Return</a>
											<a href="javascript:;" class="btn btn-block btn-secondary btn-sm mb-1 mt-0" onclick="show_Modal('<?=site_url('shopping/order_feedback/'.((($order['orders_id'])*5683)-5))?>', '#tracking_Result', 'Feedback')" data-toggle="modal" data-target="#tracking_Result_Modal">Give Feedback</a>
											<!-- <a href="javascript:;" class="btn btn-block btn-secondary btn-sm mb-1 mt-0">Write Review</a> -->
										</div>
									</div>
								</div>
							</div>
							<?php } } ?>
						</div>
						<div class="tab-pane fade" id="subscribe">
							<h3>Subscribe to Newsletter</h3>
							<div class="table-responsive">
								<?php
									// echo $subscribe;
									$array = json_decode($subscribe, TRUE);
									// print_r($array);
									if(@$array['email'] == $user["users_email"]){
										echo '<p>You are already subscribed to our newsletter list. You can unsubscribe your email by <a href="'.site_url('shopping/un_subscribe_newsletter?email='.$user["users_email"]).'">clicking here</a>.</p>';
									}
								?>
									<form action="<?=site_url('shopping/subscribe_newsletter')?>" method="POST">
										<div class="col-md-12">
											<label for="email">Subscribe to Newsletter:</label>
											<input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" value="<?=$user["users_email"]?>">
										</div>
										<div class="col-md-12 mt-3">
											<input type="submit" class="btn btn-info" value="Subscribe">
										</div>
									</form>
							</div>
						</div>
						<div class="tab-pane" id="address">
							<h4 class="billing-address">Addresses</h4>
							<div class="row">
								<?php if($addresses){ foreach($addresses as $address){ ?>
								<div class="col-md-4 col-sm-6 col-12">
									<div class="card h-100">
										<div class="card-body h-100">
											<h4 class="card-title"><?=$address['user_address_fname'].' '.$address['user_address_lname']?></h4>
											<p class="card-text">
												<?=$address['user_address_company']?><br>
												<?=$address['user_address_email']?><br>
												<?=$address['address_line5']?><br>
												<?=$address['address_line3'].', '.$address['address_line2']?><br>
												<?=$address['address_line1'].'-'.$address['address_line4']?>
											</p>
											<a href="<?=site_url('shopping/delete_address/'.$address['user_address_id'])?>" class="card-link btn btn-danger">Remove</a>
										</div>
									</div>
								</div>
								<?php } } ?>
								<div class="col-md-4 col-sm-6 col-12">
									<div class="card h-100 align-items-center">
										<div class="card-body h-100 d-flex align-items-center">
											<div class="border-add-new" onclick="show_Modal('<?=site_url('shopping/add_address')?>', '#tracking_Result', 'Add New Address')" data-toggle="modal" data-target="#tracking_Result_Modal" style="display: flex; align-items: center; justify-content: center; cursor: pointer;">
												<i class="fa fa-plus d-flex" style="font-size: 75px; color: #a0a0a0;justify-content: center; line-height: normal;"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="account-details">
							<div class="row">
								<div class="col-md-7 col-sm-12 col-12">
									<h3>Account details </h3>
									<div class="login">
										<div class="login_form_container">
											<div class="account_login_form">
												<form action="<?=site_url('shopping/change_profile')?>" method="POST">
													<label>First Name</label>
													<input type="text" name="fname" value="<?=$user['users_first_name']?>">
													<label>Last Name</label>
													<input type="text" name="lname" value="<?=$user['users_last_name']?>">
													<label>Email</label>
													<input type="text" name="email" value="<?=$user['users_email']?>" readonly disabled>
													<label>Mobile</label>
													<input type="text" name="mobile" value="<?=$user['users_mobile']?>">
													<br>
													<div class="save_button primary_btn default_button">
														<button type="submit">Save</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-sm-12 col-12">
									<h3>Change Password </h3>
									<div class="login">
										<div class="login_form_container">
											<div class="account_login_form">
												<form action="<?=site_url('shopping/change_password')?>" method="POST">
													<label>Old Password</label>
													<input type="password" name="old-password" id="oldPassword">
													<label>New Password</label>
													<input type="password" name="new-password" id="newPassword">
													<label>Confirm Password</label>
													<input type="password" name="confirm-password" id="confirmPassword">
													<label id="helpText" style="color: red"></label>
													<div class="save_button primary_btn default_button">
														<button type="button" id="btn-disable">Save</button>
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
			</div>
		</div>
	</div>
</section>
<!-- my account end   -->

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




