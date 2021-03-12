
<div class="row gutters">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-header">Manage Vendors</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="data-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Role</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php if($users) { $cnt=1; foreach($users as $user) { ?>
						<tr>
							<td><?=$cnt++;?></td>
							<td><?=$user['users_first_name'].' ' .$user['users_last_name']?></td>
							<td><?=$user['users_email']?></td>
							<td><?=$user['users_mobile']?></td>
							<td><?=(($user['users_role']==0)?'Unknown':(($user['users_role']==1)?'User':(($user['users_role']==2)?'Vendor':(($user['users_role']==121)?'Admin':'Unknown'))));?></td>
							<td><?=(($user['users_status']==0)?'Inactive':(($user['users_status']==1)?'Active':(($user['users_status']==2)?'Blocked':(($user['users_status']==3)?'Removed':'Unknown'))));?></td>
							<td>
								<div class="btn-group">
									<button data-title="View Users Data" data-href="<?=admin_url('users/view/'.$user['users_id'])?>" class="btn btn-info" data-toggle="modal" data-target="#admin_model"><i class="icon-eye"></i></button>
									
									<a href="<?=admin_url('users/status/'.$user['users_id'].'/5?redirect='.current_url());?>" class="btn btn-danger"><span class="icon-trash"></span></a>
									
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

