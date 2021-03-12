
<div class="row gutters">
	<div class="col-lg-4 col-md-4">
		<div class="card">
			<div class="card-header">Start new Advertisement</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<h4 class="card-title"><?=$title;?></h4>
					<div class="form-group m-t-20">
						<label>Campaign Name:</label>
						<input type="text" class="form-control" name="campaign_name" value="<?=set_value('campaign_name');?>" placeholder="Enter Campaign Name">
						<div class="col-form-label text-danger"><?=form_error('campaign_name');?></div>
					</div>
					<div class="form-group">
						<label>Select Product:</label>
						<select class="form-control select2" name="product" style="height: 36px;width: 100%;">
							<option value="">Select Product</option>
							<?php if($allProducts){ foreach($allProducts as $product){ ?>
							<option value="<?=$product['posts_id']?>"><?=$product['posts_title']?></option>
							<?php } } ?>
						</select>
						<div class="col-form-label text-danger"><?=form_error('product');?></div>
					</div>
					<div class="form-group m-t-20" id="numValue" <?=form_error('type') == ''?'':'style="display: none"'?>>
						<label id="ThisNumber">Budget:</label>
						<input type="text" class="form-control" name="budget" value="<?=set_value('budget');?>" placeholder="">
						<div class="col-form-label text-danger"><?=form_error('budget');?></div>
					</div>
					<div class="form-group m-t-20" id="numValue" <?=form_error('type') == ''?'':'style="display: none"'?>>
						<label id="ThisNumber">Total Days:</label>
						<input type="text" class="form-control" name="days" value="<?=set_value('days');?>" placeholder="">
						<div class="col-form-label text-danger"><?=form_error('days');?></div>
					</div>
					<button type="submit" name="saveForEdit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Request Ads Campaign</button>
				</form>	
			</div>
		</div>
	</div>
	
</div>
