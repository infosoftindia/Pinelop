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
							<li class="breadcrumb-item"><a href="<?=site_url()?>">Home</a></li>
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
									<?php if(!$this->session->userdata('user_social') == 'google') { ?>
									<li class="nav-item">
										<a class="nav-link" id="password-detail-tab" data-toggle="tab" href="#password-detail" role="tab" aria-controls="password-detail" aria-selected="true"><i class="ti-id-badge"></i>Change Password</a>
									</li>
									<?php } ?>
									<li class="nav-item">
										<a class="nav-link" href="<?=site_url('shopping/logout')?>"><i class="ti-lock"></i>Logout</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-md-8">
							<div class="tab-content dashboard_content">
								<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
									<?php if($this->session->flashdata('info')){ ?>
									<div class="alert alert-info"><?=$this->session->flashdata('info')?></div>
									<?php } ?>
									<?php if($this->session->flashdata('error')){ ?>
									<div class="alert alert-danger"><?=$this->session->flashdata('error')?></div>
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
								<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
									<?php if($orders){ /* print_r($orders); */ $cnt = 1; foreach($orders as $order){ ?>
									<div class="card">
										<div class="card-header">
											<div class="row">
												<div class="col-md-3">
													<b>Order placed</b><br>
													<?=date('M d, Y', strtotime($order['orders_created_on']))?>
												</div>
												<div class="col-md-3">
													<b>Ship to</b><br>
													<?=$order['user_address_fname'].' '.$order['user_address_lname']?>
												</div>
												<div class="col-md-3">
													<b>Status</b><br>
													<?=(($order['orders_status'] == 1)?'Completed':((($order['orders_status'] == 2)?'Processing':((($order['orders_status'] == 3)?'Dispatched':((($order['orders_status'] == 4)?'Out for Delivery':(($order['orders_status'] == 99)?'Cancelled':'Order Received'))))))))?>
												</div>
												<div class="col-md-3 text-right">
													<b>Order #<?=$order['orders_id']?></b><br>
													<a href="" class="mr-3">Details</a>	<a href="<?=site_url('shopping/invoice/'.((($order['orders_id'])*5683)-5))?>">Invoice</a>
												</div>
											</div>
										</div>
										<div class="card-body">
											<h4><?=(($order['orders_status'] == 1)?'Completed':((($order['orders_status'] == 2)?'Processing':((($order['orders_status'] == 3)?'Dispatched':((($order['orders_status'] == 4)?'Out for Delivery':(($order['orders_status'] == 99)?'Cancelled':'Order Received'))))))))?></h4>
											<div class="row">
												<div class="col-md-8">
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
												<div class="col-md-4 text-right">
													<!-- <a href="javascript:;" class="btn btn-block btn-primary btn-sm mb-3" onclick="tracking_Package('<?=((($order['orders_id'])*5683)-5)?>')" data-toggle="modal" data-target="#tracking_Result_Modal">Track Package</a> -->
													<a href="javascript:;" class="btn btn-fill-line mb-2 btn-sm" onclick="show_Modal('<?=site_url('shopping/return_form/'.((($order['orders_id'])*5683)-5))?>', '#tracking_Result', 'Return Product')" data-toggle="modal" data-target="#tracking_Result_Modal">Request Return</a>
													
													<a href="javascript:;" class="btn btn-fill-out btn-sm" onclick="show_Modal('<?=site_url('shopping/order_feedback/'.((($order['orders_id'])*5683)-5))?>', '#tracking_Result', 'Feedback')" data-toggle="modal" data-target="#tracking_Result_Modal">Give Feedback&nbsp;</a>
													<!-- <a href="javascript:;" class="btn btn-block btn-secondary btn-sm mb-1 mt-0">Write Review</a> -->
												</div>
											</div>
										</div>
									</div>
									<?php } } ?>
								</div>
								<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
									<div class="row">
										<?php if($addresses){ foreach($addresses as $address){ ?>
										<div class="col-lg-6">
											<div class="card mb-3 mb-lg-0">
												<div class="card-header">
													<h3><?=$address['user_address_fname'].' '.$address['user_address_lname']?></h3>
												</div>
												<div class="card-body">
													<address><?=$address['user_address_company']?><br>
													<br><?=$address['user_address_email']?><br>
													<?=$address['user_address_phone']?><br>
													<?=$address['address_line5'].', '.$address['address_line6']?> <br>
													<?=$address['address_line3'].', '.$address['address_line2']?> <br> 
													<?=$address['address_line1'].'-'.$address['address_line4']?> </address>
													<a href="<?=site_url('shopping/delete_address/'.$address['user_address_id'])?>" class="btn btn-fill-out">Remove</a>
												</div>
											</div>
										</div>
										<?php } } ?>
										<div class="col-md-4 col-sm-6 col-12 pt-4">
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
								<div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
									<div class="card">
										<div class="card-header">
											<h3>Account Details</h3>
										</div>
										<div class="card-body">
											<p>Already have an account? <a href="#">Log in instead!</a></p>
											<form action="<?=site_url('shopping/change_profile')?>" method="POST">
												<div class="row">
													<div class="form-group col-md-6">
														<label>First Name <span class="required">*</span></label>
														<input class="form-control" name="fname" value="<?=$user['users_first_name']?>" type="text">
													</div>
													<div class="form-group col-md-6">
														<label>Last Name <span class="required">*</span></label>
														<input class="form-control" name="lname" value="<?=$user['users_last_name']?>"  type="text">
													</div>
													<div class="form-group col-md-12">
														<label>Email Address <span class="required">*</span></label>
														<input required="" class="form-control" name="email" type="email" value="<?=$user['users_email']?>" readonly disabled>
													</div>
													<div class="form-group col-md-12">
														<label>Phone <span class="required">*</span></label>
														<input required="" class="form-control" name="mobile" type="text" value="<?=$user['users_mobile']?>">
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
											<form action="<?=site_url('shopping/change_password')?>" method="POST">
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
