<form action="<?= admin_url('orders/save-cancel-thread/' . $order['orders_id']) ?>" method="POST">
	<div class="form-group">
		<label for="reason">Reason:</label>
		<textarea class="form-control" rows="5" id="reason" name="reason"></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>