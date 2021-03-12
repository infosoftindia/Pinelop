<div class="card">
	<div class="card-body">
		<table>
			<tr>
				<td><b>Vendor Name</b><br><?=$campaign['users_first_name'].' '.$campaign['users_last_name']?><br><br></td>
			</tr>
			<tr>
				<td><b>Email</b><br><?=$campaign['users_email']?><br><br></td>
			</tr>
			<tr>
				<td><b>Phone</b><br><?=$campaign['users_mobile']?><br><br></td>
			</tr>
			<tr>
				<td><b>Product</b><br><?=$campaign['posts_title']?><br><br></td>
			</tr>
			<tr>
				<td><b>Budget</b><br><?=$campaign['ads_amount']?><br><br></td>
			</tr>
			<tr>
				<td><b>Num. of Days</b><br><?=$campaign['ads_day']?><br><br></td>
			</tr>
			<tr>
				<td><b>Requested on</b><br><?=$campaign['ads_created_on']?><br><br></td>
			</tr>
		</table>
		<div class="row">
			<div class="col-12">
				<form action="<?=base_url('campaign/update_campaign/'.$campaign['ads_id'])?>" method="POST">
					<label for="status">Status:</label>
					<div class="form-group">
						<select name="status" class="custom-select">
							<option selected>Please Choose</option>
							<option value="0" <?=$campaign['ads_approved'] == '0'?'selected':''?>>Pending</option>
							<option value="1" <?=$campaign['ads_approved'] == '1'?'selected':''?>>Approved</option>
						</select>
					</div>
					<div class="form-group">
						<label for="comment">Ads Amount:</label>
						<input type="number" class="form-control" name="amount" value="<?=$campaign['ads_amount']?>">
					</div> 
					<div class="form-group">
						<a href="<?=site_url('campaign/send_email/'.$campaign['ads_id'])?>" class="btn btn-info">Send Email to Vendor for Confirmation</a>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form> 
			</div>
		</div>
	</div>
</div>