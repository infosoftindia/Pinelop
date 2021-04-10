<div class="card">
	<div class="card-body">
		<div class="card-body">
			<form action="<?= admin_url('sliders/add-slider') ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group row gutters">
					<label for="file2" class="col-form-label">Browse Image</label>
					<label class="custom-file col-12">
						<input type="file" id="file2" class="custom-file-input" name="userfile">
						<span class="custom-file-control">Choose file</span>
					</label>
				</div>
				<div class="form-group row gutters">
					<label for="one" class="col-form-label">Title</label>
					<input type="text" class="form-control" id="one" placeholder="Title" value="" name="title">
				</div>
				<div class="form-group row gutters">
					<label for="two2" class="col-form-label">Description</label>
					<textarea type="number" class="form-control" id="two2" placeholder="Description" value="" name="description"></textarea>
				</div>
				<div class="form-group row gutters">
					<label for="three3" class="col-form-label">Category</label>
					<select name="category" class="custom-select col-12">
						<?php if ($categories) {
							foreach ($categories as $category) { ?>
								<option value="<?= $category['categories_id'] ?>"><?= $category['categories_name'] ?></option>
						<?php }
						} ?>
					</select>
				</div>
				<div class="form-group row gutters">
					<label for="two" class="col-form-label">Sort</label>
					<input type="number" class="form-control" id="two" placeholder="Sort" value="" name="sort">
				</div>
				<div class="form-group row gutters">
					<label for="three" class="col-form-label">Status</label>
					<select name="status" class="custom-select col-12">
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
				</div>
				<div class="form-group row gutters">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-primary">Save Slider</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(function() {
		$(".custom-file-input").on("change", function() {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-control").addClass("selected").html(fileName);
		});
	});
</script>