
<div class="row gutters">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-header">Ads Campaign</div>
			<div class="card-body">
				<table class="table table-striped table-bordered">
					<thead class="thead-light">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Product</th>
							<th scope="col">Budget</th>
							<th scope="col">Days</th>
							<th scope="col">Status</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if($advertises){ $cnt=1; foreach($advertises as $advertise){ ?>
						<tr>
							<td><?=$cnt++;?></td>
							<td><?=$advertise['posts_title'];?></td>
							<td><?=pPrice($advertise['ads_amount']);?></td>
							<td><?=$advertise['ads_day'];?></td>
							<td><?=($advertise['ads_status']==0)?'Pending':(($advertise['ads_status']==2)?'Rejected':'Active');?></td>
							<td>
								<div class="btn-group" role="group" aria-label="Basic example">
									<a href="<?=site_url('advertise/view/'.$advertise['ads_id']);?>" class="btn btn-info btn-sm"><i class="icon-eye"></i> View</a>
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

