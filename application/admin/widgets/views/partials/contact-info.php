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
<form class="ajaxForm" action="<?=site_url('widgets/save_footer_address')?>" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 p-3" style="border: 2px solid #179978; border-radius: 5px">
			<input class="form-control mb-2" type="text" name="address" placeholder="Enter Address" value="<?=getMeta('footer_address', 'footer')?>">
			<input class="form-control mb-2" type="text" name="phone" placeholder="Enter Phone" value="<?=getMeta('footer_phone', 'footer')?>">
			<input class="form-control mb-2" type="text" name="email" placeholder="Enter Email" value="<?=getMeta('footer_email', 'footer')?>">
			<button type="submit" class="btn btn-primary btn-sm">Save</button>
		</div>
	</div>
</form>
