
	<form action="<?=site_url('shopping/save_address')?>" method="POST">
		<div class="form-group row">
			<div class="col-md-6">
				<label for="fname">First Name:</label>
				<input type="text" class="form-control" placeholder="Enter First Name" name="fname" id="fname">
			</div>
			<div class="col-md-6">
				<label for="lname">Last Name:</label>
				<input type="text" class="form-control" placeholder="Enter Last Name" name="lname" id="lname">
			</div>
		</div>
		<div class="form-group">
			<label for="company">Company Name:</label>
			<input type="text" class="form-control" placeholder="Enter Company Name" name="company" id="company">
		</div>
		<div class="form-group row">
			<div class="col-md-6">
				<label for="email">Email:</label>
				<input type="text" class="form-control" placeholder="Enter Email" name="email" id="email">
			</div>
			<div class="col-md-6">
				<label for="phone">Phone:</label>
				<input type="text" class="form-control" placeholder="Enter Phone" name="phone" id="phone">
			</div>
		</div>
		<hr>
		<div class="form-group row">
			<div class="col-md-6">
				<label for="state">State:</label>
				<input type="hidden" class="form-control" name="country" id="country" value="India">
				<input type="text" class="form-control" name="state" id="state">
			</div>
			<div class="col-md-6">
				<label for="city">City:</label>
				<input type="text" class="form-control" name="city" id="city">
			</div>
		</div>
		<div class="form-group">
			<label for="pincode">Pincode:</label>
			<input type="text" class="form-control" placeholder="Enter Pincode" name="pin" id="pincode">
		</div>
		<div class="form-group">
			<label for="address1">Address 1:</label>
			<textarea class="form-control" rows="2" id="address1" name="address"></textarea>
		</div>
		<div class="form-group">
			<label for="address2">Address 2:</label>
			<textarea class="form-control" rows="2" id="address2" name="additional"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
