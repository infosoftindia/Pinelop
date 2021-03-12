
	<div class="card">
		<div class="card-body">
			<div class="card-body">
				<form action="<?=admin_url('testimonials/add-testimonial')?>" method="POST" enctype="multipart/form-data">
					<!--<div class="form-group row gutters">
						<label for="one" class="col-form-label">Browse Image</label>
						<label class="custom-file col-12">
							<input type="file" id="file2" class="custom-file-input" name="userfile">
							<span class="custom-file-control">Choose file</span>
						</label>
					</div>-->
					<div class="form-group row gutters">
						<label for="two" class="col-form-label">Name</label>
						<input type="text" class="form-control" id="two" placeholder="Name" value="" name="name">
					</div>
					<div class="form-group row gutters">
						<label for="two1" class="col-form-label">Image</label>
						<input type="file" class="form-control" id="two1"  value="" name="userfile">
					</div>
					<div class="form-group row gutters">
						<label for="three" class="col-form-label">Message</label>
						<textarea class="form-control" id="three" placeholder="Message" value="" name="message"></textarea>
					</div>
					<div class="form-group row gutters">
						<label for="three" class="col-form-label">Status</label>
						<select name="status" class="custom-select col-12" >
							<option value="1">Active</option>
							<option value="0">Inactive</option>
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