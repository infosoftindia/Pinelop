<form method="POST" action="<?= base_url('products/update_Brand/' . $brand['brands_id']) ?>" enctype="multipart/form-data">
	<div class="form-group mb-3">
		<label for="url_link">Brand Name</label>
		<input type="text" class="form-control" id="url_link" placeholder="Brand Name" value="<?= $brand['brands_url'] ?>" name="url_link">
	</div>
	<div class="form-group mb-3">
		<label for="image">Brand Image</label><br>
		<img src="<?= base_url(getenv('uploads') . ($brand['brands_image'])) ?>" class="img-fluid" style="max-width: 100%; height: 155px;">
		<input type="file" class="form-control" name="userfile">
		<input type="hidden" value="<?= $brand['brands_image'] ?>" name="old_Picture">
	</div>
	<button type="submit" class="btn btn-success">Update Brand</button>
</form>