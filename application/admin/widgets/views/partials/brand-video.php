<form class="ajaxForm" action="<?=site_url('widgets/save_brand_video')?>" method="POST">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 p-3" style="border: 2px solid #179978; border-radius: 5px">
			<div class="form-group">
				<label for="video">YouTube Video Id:</label>
				<input type="text" class="form-control" placeholder="Enter YouTube Video Id" id="video" name="video" value="<?=getMeta('brand_video', 'brand')?>">
			</div>
			<div class="form-group">
				<label for="heading">Heading:</label>
				<input type="text" class="form-control" placeholder="Enter Heading" id="heading" name="heading" value="<?=getMeta('brand_heading', 'brand')?>">
			</div>
			<div class="form-group">
				<label for="description">Description:</label>
				<textarea name="description" class="form-control" placeholder="Description" id="description"><?=getMeta('brand_description', 'brand')?></textarea>
			</div>
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" placeholder="Enter Name" id="name" name="name" value="<?=getMeta('brand_name', 'brand')?>">
			</div>
			<div class="form-group">
				<label for="date">Date:</label>
				<input type="text" class="form-control" placeholder="Enter Date" id="date" name="date" value="<?=getMeta('brand_date', 'brand')?>">
			</div>
			<div class="form-group">
				<label for="btn_label">Button Label:</label>
				<input type="text" class="form-control" placeholder="Enter Button Label" id="btn_label" name="btn_label" value="<?=getMeta('brand_btn_label', 'brand')?>">
			</div>
			<div class="form-group">
				<label for="btn_link">Button Link:</label>
				<input type="text" class="form-control" placeholder="Enter Button Link" id="btn_link" name="btn_link" value="<?=getMeta('brand_btn_link', 'brand')?>">
			</div>
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
</form>