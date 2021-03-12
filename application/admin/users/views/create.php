
<div class="row gutters">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-header">New User</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="form-group mb-3">
								<label for="name">First Name</label>
								<input type="text" class="form-control" id="name" placeholder="First Name" value="<?=set_value('fname')?>" name="fname">
								<label class="m-0 text-danger"><?=form_error('fname')?></label>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="form-group mb-3">
								<label for="name">Last Name</label>
								<input type="text" class="form-control" id="name" placeholder="Last Name" value="<?=set_value('lname')?>" name="lname">
								<label class="m-0 text-danger"><?=form_error('lname')?></label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="form-group mb-3">
								<label for="password">Phone</label>
								<input type="text" class="form-control" id="phone" placeholder="Phone" value="<?=set_value('phone')?>" name="phone">
								<label class="m-0 text-danger"><?=form_error('phone')?></label>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="form-group mb-3">
								<label for="name">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email" value="<?=set_value('email')?>" name="email">
								<label class="m-0 text-danger"><?=form_error('email')?></label>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="form-group mb-3">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" placeholder="Password" value="<?=set_value('password')?>" name="password">
								<label class="m-0 text-danger"><?=form_error('password')?></label>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="form-group mb-3">
								<label for="cpassword">Confirm Password</label>
								<input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" value="<?=set_value('cpassword')?>" name="cpassword">
								<label class="m-0 text-danger"><?=form_error('cpassword')?></label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="form-group mb-3">
								<label for="status">Status</label>
								<select class="form-control form-control-sm" id="status" name="status">
									<option <?=set_value('status') == '1'?'selected':''?> value="1">Active</option>
									<option <?=set_value('status') == '0'?'selected':''?> value="0">Inactive</option>
								</select>
								<label class="m-0 text-danger"><?=form_error('status')?></label>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="form-group mb-3">
								<label for="role">Role</label>
								<select class="form-control form-control-sm" id="role" name="role">
									<option <?=set_value('role') == '1'?'selected':''?> value="1">User</option>
									<option <?=set_value('role') == '121'?'selected':''?> value="121">Admin</option>
									<option <?=set_value('role') == '2'?'selected':''?> value="2">Vendor</option>
								</select>
								<label class="m-0 text-danger"><?=form_error('status')?></label>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-success ">Add User</button>
				</form>
			</div>
		</div>
	</div>
</div>

