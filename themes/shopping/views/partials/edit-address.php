<form action="<?= site_url('shopping/save_edit_address/' . $address['user_address_id'] . '/' . $address['address_id']) ?>" method="POST">
	<div class="form-group row">
		<div class="col-md-6">
			<label for="fname">First Name:</label>
			<input type="text" class="form-control" placeholder="Enter First Name" name="fname" id="fname" value="<?= $address['user_address_fname'] ?>">
		</div>
		<div class="col-md-6">
			<label for="lname">Last Name:</label>
			<input type="text" class="form-control" placeholder="Enter Last Name" name="lname" id="lname" value="<?= $address['user_address_lname'] ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="company">Company Name:</label>
		<input type="text" class="form-control" placeholder="Enter Company Name" name="company" id="company" value="<?= $address['user_address_company'] ?>">
	</div>
	<div class="form-group row">
		<div class="col-md-6">
			<label for="email">Email:</label>
			<input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" value="<?= $address['user_address_email'] ?>">
		</div>
		<div class="col-md-6">
			<label for="phone">Phone:</label>
			<input type="text" class="form-control" placeholder="Enter Phone" name="phone" id="phone" value="<?= $address['user_address_phone'] ?>">
		</div>
	</div>
	<hr>
	<div class="form-group row">
		<div class="col-md-6">
			<label for="state">Country:</label>
			<input type="text" class="form-control" name="country" id="country" value="<?= $address['address_line1'] ?>">
		</div>
		<div class="col-md-6">
			<label for="state">State:</label>
			<input type="text" class="form-control" name="state" id="state" value="<?= $address['address_line2'] ?>">
		</div>
		<div class="col-md-6">
			<label for="city">City:</label>
			<input type="text" class="form-control" name="city" id="city" value="<?= $address['address_line3'] ?>">
		</div>
		<div class="col-md-6">
			<label for="city">Pincode/Postcode:</label>
			<input type="text" class="form-control" placeholder="Enter Pincode" name="pin" id="pincode" value="<?= $address['address_line4'] ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="address1">Address 1:</label>
		<textarea class="form-control" rows="2" id="address1" name="address"><?= $address['address_line5'] ?></textarea>
	</div>
	<div class="form-group">
		<label for="address2">Address 2:</label>
		<textarea class="form-control" rows="2" id="address2" name="additional"><?= $address['address_line6'] ?></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>