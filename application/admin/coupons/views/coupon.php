
<div class="row gutters">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
		<div class="card">
			<div class="card-header">New Coupon</div>
			<div class="card-body">
				<form method="POST">
					<div class="form-group mb-3">
						<label for="name">Coupon Name</label>
						<input type="text" class="form-control" id="name" placeholder="Coupon Name" value="<?=set_value('name')?>" name="name">
						<label class="m-0 text-danger"><?=form_error('name')?></label>
					</div>
					<div class="form-group mb-3">
						<label for="code">Coupon Code</label>
						<input type="text" class="form-control" id="code" placeholder="Coupon Code" value="<?=set_value('code')?>" name="code">
						<label class="m-0 text-danger"><?=form_error('code')?></label>
					</div>
					<div class="form-group mb-3">
						<label for="type">Coupon Type</label>
						<select class="form-control form-control-sm" id="type" name="type">
							<option <?=set_value('type') == 'a'?'selected':''?> value="a">Amount</option>
							<option <?=set_value('type') == 'p'?'selected':''?> value="p">Percentage (%)</option>
						</select>
						<label class="m-0 text-danger"><?=form_error('coupon_type')?></label>
					</div>
					<div class="form-group mb-3">
						<label for="amount">Coupon Amount</label>
						<input type="text" class="form-control" id="amount" placeholder="Coupon Amount" value="<?=set_value('amount')?>" name="amount">
						<label class="m-0 text-danger"><?=form_error('amount')?></label>
					</div>
					<div class="form-group mb-3">
						<label for="name">Coupon Max Usage</label>
						<input type="text" class="form-control" id="name" placeholder="Coupon Max Usage" value="<?=set_value('max_usage')?>" name="max_usage">
						<label class="m-0 text-danger"><?=form_error('max_usage')?></label>
					</div>
					<div class="form-group mb-3">
						<label for="min_order">Coupon Min Order</label>
						<input type="text" class="form-control" id="min_usage" placeholder="Coupon Min Order" value="<?=set_value('min_order')?>" name="min_order">
						<label class="m-0 text-danger"><?=form_error('min_order')?></label>
					</div>
					<div class="form-group mb-3">
						<label for="discount">Coupon Max Discount</label>
						<input type="text" class="form-control" id="discount" placeholder="Coupon Max Discount" value="<?=set_value('discount')?>" name="discount">
						<label class="m-0 text-danger"><?=form_error('discount')?></label>
					</div>
					<div class="form-group mb-3">
						<label for="status">Status</label>
						<select class="form-control" id="status" name="status">
							<option value="1" <?=set_value('status') == '1'?'selected':''?>>Active</option>
							<option value="0" <?=set_value('status') == '0'?'selected':''?>>Inactive</option>
						</select>
					</div>
					<button type="submit" class="btn btn-success ">Save Coupon</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
		<div class="card">
			<div class="card-header">Manage Coupon</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="data-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Coupon Name</th>
							<th>Coupon Code</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if($coupons){
								$count = 1;
								foreach($coupons as $coupon) { ?>
						<tr>
							<td><?=$count++?></td>
							<td><?=$coupon['coupons_name']?></td>
							<td><?=$coupon['coupons_code']?></td>
							<td><?=($coupon['coupons_status'] == 1)?'Active':'Inactive'?></td>
							<td>
								<div class="btn-group">
									<a href="javascript:;" class="btn btn-info" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="show_Modal('<?=admin_url('coupons/edit-coupon/'.$coupon['coupons_id'])?>', '#modal_Output')"><span class="icon-edit"></span></a>
									<a href="<?=admin_url('coupons/delete-coupon/'.$coupon['coupons_id'])?>" class="btn btn-danger delete"><span class="icon-trash"></span></a>
								</div>
							</td>
						</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Coupon</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="modal_Output">
				Modal body..
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>