<div class="card">
	<div class="card-body">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-12">
					<img src="<?= base_url(getenv('uploads') . $slider['sliders_image']) ?>" class="img-fluid">
				</div>
			</div>
			<form action="<?= admin_url('sliders/edit-slider/' . $slider['sliders_id']) ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group row gutters">
					<label for="one" class="col-form-label">Browse Image</label>
					<label class="custom-file col-12">
						<input type="file" id="file2" class="custom-file-input" name="userfile">
						<span class="custom-file-control">Choose file</span>
					</label>
					<input type="hidden" value="<?= $slider['sliders_image'] ?>" name="old_Picture">
				</div>
				<div class="form-group row gutters">
					<label for="one" class="col-form-label">Title</label>
					<input type="text" class="form-control" id="one" placeholder="Title" value="<?= $slider['sliders_title'] ?>" name="title">
				</div>
				<div class="form-group row gutters">
					<label for="two2" class="col-form-label">Description</label>
					<textarea type="number" class="form-control" id="two2" placeholder="Description" name="description"><?= $slider['sliders_description'] ?></textarea>
				</div>
				<div class="form-group row gutters">
					<label for="three3" class="col-form-label">Category</label>
					<select name="category" class="custom-select col-12">
						<?php if ($categories) {
							foreach ($categories as $category) { ?>
								<option value="<?= $category['categories_id'] ?>" <?= $slider['sliders_category'] == $category['categories_id'] ? 'selected' : '' ?>><?= $category['categories_name'] ?></option>
						<?php }
						} ?>
					</select>
				</div>
				<div class="form-group row gutters">
					<label for="two" class="col-form-label">Sort</label>
					<input type="number" class="form-control" id="two" placeholder="Sort" value="<?= $slider['sliders_sort'] ?>" name="sort">
				</div>
				<div class="form-group row gutters">
					<label for="three" class="col-form-label">Status</label>
					<select name="status" class="custom-select col-12">
						<option value="1" <?= $slider['sliders_status'] == 1 ? 'selected' : '' ?>>Active</option>
						<option value="0" <?= $slider['sliders_status'] == 0 ? 'selected' : '' ?>>Inactive</option>
					</select>
				</div>
				<div class="form-group row gutters">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-primary">Save Changes</button>
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