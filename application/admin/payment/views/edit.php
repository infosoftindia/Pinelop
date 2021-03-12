<div class="card">
	<div class="card-body">
		<table>
			<tr>
				<td><b>User Name :</b> <?=$payment['users_first_name'].' '.$payment['users_last_name']?><br><br></td>
			</tr>
			<tr>
				<td><b>Email : </b> <?=$payment['users_email']?><br><br></td>
			</tr>
			<tr>
				<td><b>Phone :</b> <?=$payment['users_mobile']?><br><br></td>
			</tr>
			<tr>
				<td><b>Amount :</b> <?=$payment['payments_amount']?><br><br></td>
			</tr>
			<tr>
				<td><b>Payment Method :</b> <?=$payment['payments_methods']?><br><br></td>
			</tr>
			<tr>
				<td><b>Payment Detail :</b> <?=$payment['payments_details']?><br><br></td>
			</tr>
			<tr>
				<td><b>Requested on :</b> <?=$payment['payments_created_on']?><br><br></td>
			</tr>
		</table>
		<div class="row">
			<div class="col-12">
				<form action="<?=admin_url('payment/update-payment/'.$payment['payments_id'])?>" enctype="multipart/form-data" method="POST">
					<label for="status">Status:</label>
					<div class="form-group">
						<select name="status" class="custom-select">
							<option selected>Please Choose</option>
							<option value="0" <?=$payment['payments_status'] == '0'?'selected':''?>>Pending</option>
							<option value="1" <?=$payment['payments_status'] == '1'?'selected':''?>>Completed</option>
							<option value="2" <?=$payment['payments_status'] == '2'?'selected':''?>>Cancelled</option>
							<option value="3" <?=$payment['payments_status'] == '3'?'selected':''?>>Rejected</option>
						</select>
					</div>
					<div class="form-group">
						<label for="comment">Comment/Note:</label>
						<textarea class="form-control" rows="5" id="comment" name="note"><?=$payment['payments_note']?></textarea>
					</div> 
					<button type="submit" class="btn btn-primary">Submit</button>
				</form> 
			</div>
		</div>
	</div>
</div>