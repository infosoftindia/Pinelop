<style>
	.youtubeimg{
		position: relative;
	}
	.youbutton{
		position: absolute;
		top: 0px;
		right: 0px;
		opacity: 0;
		transition: .3s ease;
	}
	.youtubeimg:hover .youbutton{
		opacity: 1;
	}
</style>
<form class="ajaxForm" action="<?=site_url('widgets/save_brands')?>" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 p-3" style="border: 2px solid #179978; border-radius: 5px">
			<div class="input-group mb-3">
				<input class="form-control mb-2" type="text" name="url_link" placeholder="Enter URL">
				<div class="input-group-append">
					<label class="btn btn-info" for="browseLogo">
						<input type="file" name="userfile" hidden id="browseLogo" required>
						Browse Logo
					</label>
				</div>
			</div>
			<button type="submit" class="btn btn-primary btn-sm">Save</button>
		</div>
	</div>
</form>

	<div class="row mt-3">
		<?php if($brands){ foreach($brands as $brand){ ?>
		<div class="col-md-2" >
			<div class="youtubeimg" style="border: 1px solid green">
				<img src="<?=base_url(getenv('uploads').$brand['brands_image'])?>" class="img-fluid w-100" style="height: 175px; object-fit: cover;">
				<div class="youbutton">
				<a href="<?=site_url('widgets/delete_brand/'.$brand['brands_image'])?>" class="delete_Widget btn btn-danger btn-sm rounded-circle">Delete</a>
				</div>
			</div>

			
			
		</div>
		<?php } } ?>
	</div>