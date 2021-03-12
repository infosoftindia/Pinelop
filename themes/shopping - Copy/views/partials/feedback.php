
	<form action="<?=site_url('shopping/save_feedback/'.$order['orders_id'])?>" method="POST">
		<div class="form-group">
			<label for="feedback">Feedback:</label>
			<textarea class="form-control" rows="5" id="feedback" name="feedback"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
