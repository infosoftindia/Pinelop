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
<form class="ajaxForm" action="<?=site_url('widgets/save_footer_promo')?>" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 p-3" style="border: 2px solid #179978; border-radius: 5px">
			<input class="form-control mb-2" type="text" name="title" placeholder="Enter Title" value="<?=getMeta('footer_promo_title', 'footer')?>">
			<input class="form-control mb-2" type="text" name="sub_title" placeholder="Enter Sub-Title" value="<?=getMeta('footer_promo_sub_title', 'footer')?>">
			<div class="input-group mb-3">
				<input class="form-control mb-2" type="text" name="url_link" placeholder="Enter URL" value="<?=getMeta('footer_promo_link', 'footer')?>">
				<div class="input-group-append">
					<label class="btn btn-info" for="browseLogo">
						<input type="file" name="userfile" hidden id="browseLogo">
						Browse Image
					</label>
				</div>
			</div>
			<button type="submit" class="btn btn-primary btn-sm">Save</button>
		</div>
	</div>
</form>

	<div class="row mt-3">
		<div class="col-md-2" >
			<div class="youtubeimg" style="border: 1px solid green">
				<img src="<?=base_url(getenv('uploads').getMeta('footer_promo_img', 'footer'))?>" class="img-fluid w-100" style="height: 175px; object-fit: cover;">
			</div>
		</div>
	</div>