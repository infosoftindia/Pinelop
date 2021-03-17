<style>
	.m-h-200px {
		min-height: 200px;
	}
</style>
<div class="row gutters">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<form method="POST">
			<!-- Row start -->
			<div class="row gutters">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">Terms and Conditions</div>
						<div class="card-body m-h-200px">
							<div class="form-group mb-3">
								<textarea class="form-control editor" placeholder="Start writting Terms and Conditions here" name="terms"><?= $setting1['pages_description'] ?></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Row end -->
			<!-- Row start -->
			<div class="row gutters">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">Privacy and Policies</div>
						<div class="card-body">
							<div class="m-h-200px">
								<div class="form-group mb-3">
									<textarea class="form-control editor" placeholder="Start writting Privacy and Policies here" name="policies"><?= $setting2['pages_description'] ?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Row end -->
			<!-- Row start -->
			<div class="row gutters">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">About Us</div>
						<div class="card-body">
							<div class="m-h-200px">
								<div class="form-group mb-3">
									<textarea class="form-control editor" placeholder="Start writting About Us here" name="about"><?= $setting3['pages_description'] ?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row gutters">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">Return Policy</div>
						<div class="card-body">
							<div class="m-h-200px">
								<div class="form-group mb-3">
									<textarea class="form-control editor" placeholder="Start writting Return Policy here" name="return_policy"><?= $setting4['pages_description'] ?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row gutters">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">Order Tracking</div>
						<div class="card-body">
							<div class="m-h-200px">
								<div class="form-group mb-3">
									<textarea class="form-control editor" placeholder="Start writting Order Tracking here" name="order_tracking"><?= $setting5['pages_description'] ?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row gutters">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">Shipping Cost & Policy</div>
						<div class="card-body">
							<div class="m-h-200px">
								<div class="form-group mb-3">
									<textarea class="form-control editor" placeholder="Start writting Shipping Cost & Policy here" name="shipping_cost"><?= $setting6['pages_description'] ?></textarea>
								</div>
							</div>
							<button type="submit" class="btn btn-success ">Save Settings</button>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Row end -->
		</form>
	</div>
</div>