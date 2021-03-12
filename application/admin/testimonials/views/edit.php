	
	<div class="card">
		<div class="card-body">
			<div class="card-body">
				<!--<div class="row">
					<div class="col-md-4 m-auto">
						<img src="<?=base_url(getenv('uploads').$testimonial['testimonials_image'])?>" class="img-fluid">
					</div>
				</div>-->
				<form action="<?=admin_url('testimonials/edit-testimonial/'.$testimonial['testimonials_id'])?>" method="POST" enctype="multipart/form-data">
					<div class="form-group row gutters">
						<label for="two" class="col-form-label">Name</label>
						<input type="text" class="form-control" id="two" placeholder="Name" value="<?=$testimonial['testimonials_name']?>" name="name">
					</div>
					<div class="form-group row gutters">
						<label for="three" class="col-form-label">Message</label>
						<textarea class="form-control" id="three" placeholder="Message" value="" name="message"><?=$testimonial['testimonials_message']?></textarea>
					</div>
					<img src="<?=base_url(getenv('uploads').$testimonial['testimonials_image'])?>" class="img-fluid pt-2">
					<div class="form-group row gutters">
						<label for="one" class="col-form-label">Browse Image</label>
						<label class="custom-file col-12">
							<input type="file" id="file2" class="custom-file-input" name="userfile">
							<span class="custom-file-control">Choose file</span>
						</label>
						<input type="hidden" value="<?=$testimonial['testimonials_image']?>" name="old_Picture">
					</div>
					<div class="form-group row gutters">
						<label for="three" class="col-form-label">Status</label>
						<select name="status" class="custom-select col-12" >
							<option value="1" <?=$testimonial['testimonials_status'] == 1?'selected':''?>>Active</option>
							<option value="0" <?=$testimonial['testimonials_status'] == 0?'selected':''?>>Inactive</option>
						</select>
					</div>
					<div class="form-group row gutters">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary">Save Testimonial</button>
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