
	<style>
	.modal-dialog.modal-dialog-centered {
		min-width: auto;
	}

	.modal-content button.close {
		position: absolute;
		right: 3%;
		width: auto;
		height: auto;
		line-height: 33px;
		display: block;
		border: 0px;
		top: auto;
		border-radius: 0%;
		cursor: pointer;
		font-size: 20px;
		z-index: 9;
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
							<li>Vendor Registration</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--breadcrumbs area end-->
	<!-- customer login start -->
	<div class="customer_login mt-45">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-sm-6 border border-primary shadow rounded pt-2">
					<div class="text-center"><img src="<?=base_url('themes/shopping/assets/img/logo/logo.png')?>" class="p-1"></div>
					<div class="col-sm-12">
						<form method="post" id="prc_singnupFrom" onSubmit="return validation();" action="<?=site_url('admin/register_vendor_script')?>">
							<div class="form-group">
								<label class="font-weight-bold">Email <span class="text-danger">*</span></label>
								<div class="input-group">
									<input type="email" name="email" id="prc_email" class="form-control" placeholder="Enter valid email">
									<div class="input-group-append">
										<button type="button" class="btn btn-primary" id="prc_signup_btn" onClick="return emailCheck();">Sign up</button>
									</div>
								</div>
								<p class="text-danger" id="prc_error_message"></p>
							</div>
							<div id="prc_next-form" class="collapse">
								<div class="form-group">
									<label class="font-weight-bold">First Name <span class="text-danger">*</span></label>
									<input type="text" name="fname" id="prc_fname" class="form-control" placeholder="First Name">
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Last Name</label>
									<input type="text" name="lname" id="prc_lname" class="form-control" placeholder="Last Name">
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Company Name <span class="text-danger">*</span></label>
									<input type="text" name="company" id="prc_company_name" class="form-control" placeholder="Company Name">
								</div>
								<div class="form-group">
									<label class="font-weight-bold">GST Number <span class="text-danger">*</span></label>
									<input type="text" name="gst" id="prc_gst_number" class="form-control" placeholder="GST Number">
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Company PAN Number <span class="text-danger">*</span></label>
									<input type="text" name="pan" id="prc_pan_number" class="form-control" placeholder="Company PAN Number">
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Phone<span class="text-danger">*</span></label>
									<input type="text" name="phone" id="prc_phone" class="form-control" placeholder="Mobile Number">
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Password <span class="text-danger">*</span></label>
									<input type="password" name="password" id="prc_password" class="form-control" placeholder="Password">
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Confirm Password <span class="text-danger">*</span></label>
									<input type="password" name="cpassword" id="prc_cpassword" class="form-control" placeholder="Confirm Password">
									<em id="prc_cp"></em>
								</div>
								<div class="form-group">
									<label><input type="checkbox" name="condition" id="prc_condition" required> I agree with the <a href="javascript:;">Terms &amp; Conditions</a> for Registration.</label>
								</div>
								<div class="form-group">
									<input type="submit" name="submit" value="Sign Up" class="btn btn-block btn-danger">
								</div>
							</div> <!--/.next-form-->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- customer login end -->

