
<div class="row gutters">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-header">Pending Payments</div>
			<div class="card-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Ads Name</th>
							<th data-breakpoints="xs">Vendor</th>
							<th data-breakpoints="xs">Product</th>
							<th>Budget</th>
							<th>Days</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if($campaigns){ $cnt=1; foreach($campaigns as $campaign){?>
							<tr>
								<td><?=$cnt++;?></td>
								<td><?=$campaign['ads_title'];?></a></td>
								<td><?=$campaign['users_first_name'].' '.$campaign['users_last_name'];?></td>
								<td><?=$campaign['posts_title'];?></td>
								<td><?=pPrice($campaign['ads_amount']);?></td>
								<td><?=$campaign['ads_day'];?></td>
								<td>
									<div class="btn-group " role="group">
										<button data-title="View Campaign Data" data-href="<?=site_url('campaign/completed_view/'.$campaign['ads_id'])?>" class="btn btn-info" data-toggle="modal" data-target="#admin_model"><i class="icon-eye"></i></button>
									</div>
								</td>
							</tr>
						<?php } } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

