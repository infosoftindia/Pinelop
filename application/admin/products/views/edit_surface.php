
	<form method="POST" action="<?=base_url('products/update_Surface/'.$category['categories_id'])?>" enctype="multipart/form-data">
		<div class="form-group mb-3">
			<label for="name">Category Name</label>
			<input type="text" class="form-control" id="name" placeholder="Category Name" value="<?=$category['categories_name']?>" name="name">
		</div>
		<!--<div class="form-group mb-3">
			<label for="name">Category Icon</label><br>
			<img src="<?=base_url(getenv('uploads').($category['categories_icon']))?>" class="img-fluid" style="max-width: 100%; height: 155px;">
			<input type="file" class="form-control" name="userfile">
			<input type="hidden" value="<?=$category['categories_icon']?>" name="old_Picture">
		</div>-->
		<div class="form-group mb-3">
			<label for="status">Status</label>
			<select class="form-control" id="status" name="status">
				<option value="1" <?=$category['categories_status'] == '1'?'selected':''?>>Active</option>
				<option value="0" <?=$category['categories_status'] == '0'?'selected':''?>>Inactive</option>
			</select>
		</div>
		<button type="submit" class="btn btn-success ">Update Category</button>
	</form>

