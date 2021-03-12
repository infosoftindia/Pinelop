
<div class="row gutters">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-header">Manage Vendors</div>
			<div class="card-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php if($vendors) { $cnt=1; foreach($vendors as $vendor) { ?>
						<tr>
							<td><?=$cnt++;?></td>
							<td><?=$vendor['users_first_name'].' ' .$vendor['users_last_name']?></td>
							<td><?=$vendor['users_email']?></td>
							<td><?=$vendor['users_mobile']?></td>
							<td><?=($vendor['users_status'] == '0') ? 'Inactive':'Active' ?></td>
							<td>
								<div class="btn-group">
									<button data-title="View Vendor Data" data-href="<?=site_url('vendors/view/'.$vendor['users_id'])?>" class="btn btn-info" data-toggle="modal" data-target="#admin_model"><i class="icon-eye"></i></button>
									
									<a href="<?=base_url('vendors/status/'.$vendor['users_id'].'/1?redirect='.current_url());?>" class="btn btn-warning"><span class="icon-check"></span></a>
									
									<a href="<?=base_url('vendors/status/'.$vendor['users_id'].'/2?redirect='.current_url());?>" class="btn btn-danger"><span class="icon-trash"></span></a>
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

