
	<form method="POST" action="<?=admin_url('coupons/update-coupon/'.$coupon['coupons_id'])?>">
		<div class="form-group mb-3">
			<label for="name">Coupon Name</label>
			<input type="text" class="form-control" id="name" placeholder="Category Name" value="<?=$coupon['coupons_name']?>" name="name">
		</div>
		<div class="form-group mb-3">
			<label for="code">Coupon Code</label>
			<input type="text" class="form-control" id="code" placeholder="Category Code" value="<?=$coupon['coupons_code']?>" name="code">
		</div>
		<div class="form-group mb-3">
			<label for="type">Coupon Type</label>
			<select class="form-control" id="type" name="type">
				<option value="a" <?=$coupon['coupons_type'] == 'a'?'selected':''?>>Amount</option>
				<option value="p" <?=$coupon['coupons_type'] == 'p'?'selected':''?>>Percentage (%)</option>
			</select>
		</div>
		<div class="form-group mb-3">
			<label for="amount">Coupon Amount</label>
			<input type="text" class="form-control" id="amount" placeholder="Category Amount" value="<?=$coupon['coupons_amount']?>" name="amount">
		</div>
		<div class="form-group mb-3">
			<label for="max_usage">Coupon Max Usage</label>
			<input type="text" class="form-control" id="max_usage" placeholder="Category Max Usage" value="<?=$coupon['coupons_max_usage']?>" name="max_usage">
		</div>
		<div class="form-group mb-3">
			<label for="min_order">Coupon Min Order</label>
			<input type="text" class="form-control" id="min_order" placeholder="Category Min Order" value="<?=$coupon['coupons_min_order']?>" name="min_order">
		</div>
		<div class="form-group mb-3">
			<label for="discount">Coupon Max Discount</label>
			<input type="text" class="form-control" id="discount" placeholder="Category Max Discount" value="<?=$coupon['coupons_max_discount']?>" name="discount">
		</div>
		<div class="form-group mb-3">
			<label for="status">Status</label>
			<select class="form-control" id="status" name="status">
				<option value="1" <?=$coupon['coupons_status'] == '1'?'selected':''?>>Active</option>
				<option value="0" <?=$coupon['coupons_status'] == '0'?'selected':''?>>Inactive</option>
			</select>
		</div>
		<button type="submit" class="btn btn-success ">Update Coupon</button>
	</form>

