
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
							<li>Vendor Login</li>
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
						<form method="post" action="<?=site_url('admin/vendor_login_script')?>">
							<div id="" class="">
								<?=alert('danger', 'error')?>
								<div class="form-group">
									<label class="font-weight-bold">Email <span class="text-danger">*</span></label>
									<input type="text" name="email" class="form-control" placeholder="Email" required>
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Password <span class="text-danger">*</span></label>
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="form-group">
									<label class="text-primary"><a href="<?=base_url('vendor-registration')?>"> Register New Vendor </a></label>
								</div>
								<div class="form-group">
									<input type="submit" name="submit" value="Sign In" class="btn btn-block btn-danger">
								</div>
							</div> <!--/.next-form-->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- customer login end -->

