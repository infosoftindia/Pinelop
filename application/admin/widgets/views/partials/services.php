<form class="ajaxForm" action="<?=site_url('widgets/save_services')?>" method="POST">
	<div class="row">
		<?php for($i=1; $i<=3; $i++){ ?>
		<div class="col-md-4">
			<div class="form-group">
				<label for="icon">Icon:</label>
				<input type="text" class="form-control" placeholder="Enter Icon" id="icon" name="icon_<?=$i?>" value="<?=getMeta('service_icon_'.$i, 'service')?>">
			</div>
			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" class="form-control" placeholder="Enter Title" id="title" name="title_<?=$i?>" value="<?=getMeta('service_title_'.$i, 'service')?>">
			</div>
			<div class="form-group">
				<label for="description">Description:</label>
				<textarea name="description_<?=$i?>" class="form-control" placeholder="Short Description" id="description"><?=getMeta('service_description_'.$i, 'service')?></textarea>
			</div>
		</div>
		<?php } ?>
		<div class="col-12">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
</form>