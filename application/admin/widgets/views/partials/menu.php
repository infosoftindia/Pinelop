<form class="ajaxForm" action="<?=site_url('widgets/save_menu')?>" method="POST">
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label for="title">Enter Title:</label>
				<input name="title" class="form-control" placeholder="Title" id="title">
			</div>
			<div class="form-group">
				<label for="url">Enter URL (Optional):</label>
				<input name="url" class="form-control" placeholder="URL" id="url">
			</div>
		</div>
		<div class="col-md-9">
			<div class="row">
				<?php for($i=1; $i<=4; $i++){ ?>
				<div class="col-md-3">
					<div class="form-group">
						<label for="title_<?=$i?>">Enter Title:</label>
						<input name="title_<?=$i?>" class="form-control" placeholder="Title" id="title_<?=$i?>">
					</div>
					<div class="form-group">
						<label for="url_<?=$i?>">Enter URL:</label>
						<input name="url_<?=$i?>" class="form-control" placeholder="URL" id="url_<?=$i?>">
					</div>
					<div class="form-group">
						<label for="navigation_<?=$i?>">Home|https://google.com:</label>
						<textarea name="navigation_<?=$i?>" class="form-control" placeholder="One link at a line Home|https://google.com" id="navigation_<?=$i?>" rows="5"></textarea>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="col-12">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
	<hr class="my-3">
</form>
<form class="ajaxForm" action="<?=site_url('widgets/update_menu')?>" method="POST">
	<?php if($menus){ foreach($menus as $menu){ ?>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label for="title">Enter Title:</label>
				<input name="title[]" class="form-control" placeholder="Title" id="title" value="<?=$menu['menus_title']?>">
				<input name="id[]" type="hidden" value="<?=$menu['menus_id']?>">
			</div>
			<div class="form-group">
				<label for="url">Enter URL (Optional):</label>
				<input name="url[]" class="form-control" placeholder="URL" id="url" value="<?=$menu['menus_url']?>">
			</div>
			<div class="form-group">
				<label for="sort">Sort:</label>
				<input name="sort[]" class="form-control" placeholder="Sort" id="sort" value="<?=$menu['menus_sort']?>">
			</div>
			<div class="form-group">
				<label for="is_hidden">Hidden:</label>
				<select name="is_hidden[]" class="form-control" id="is_hidden">
					<option value="0" <?=$menu['menus_hide'] == '0'?'selected':''?>>No</option>
					<option value="1" <?=$menu['menus_hide'] == '1'?'selected':''?>>Yes</option>
				</select>
			</div>
		</div>
		<div class="col-md-9">
			<div class="row">
				<?php for($i=1; $i<=4; $i++){ ?>
				<div class="col-md-3">
					<div class="form-group">
						<label for="title_<?=$i?>">Enter Title:</label>
						<input name="title_<?=$i?>[]" class="form-control" placeholder="Title" id="title_<?=$i?>" value="<?=$menu['menus_title_'.$i]?>">
					</div>
					<div class="form-group">
						<label for="url_<?=$i?>">Enter URL:</label>
						<input name="url_<?=$i?>[]" class="form-control" placeholder="URL" id="url_<?=$i?>" value="<?=$menu['menus_url_'.$i]?>">
					</div>
					<div class="form-group">
						<label for="navigation_<?=$i?>">Home|https://google.com:</label>
						<textarea name="navigation_<?=$i?>[]" class="form-control" placeholder="One link at a line Home|https://google.com" id="navigation_<?=$i?>" rows="5"><?=$menu['menus_navigation_'.$i]?></textarea>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<hr class="my-3">
	<?php } } ?>
	<div class="row">
		<div class="col-12">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
</form>