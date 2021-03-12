<?php
	
?>
						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Activities</div>
									<div class="card-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
													<th>Title</th>
													<th>IP</th>
													<th>Date Time</th>
												</tr>
											</thead>
											<tbody>
												<?php if($activities){ $cnt = 1; foreach($activities as $activity){ ?>
												<tr>
													<td><?=$cnt++?></td>
													<td><?=$activity['activities_title']?></td>
													<td><?=$activity['activities_ip']?></td>
													<td><?=date('M d, Y - h:i:s a', strtotime($activity['activities_created']))?></td>
												</tr>
												<?php } } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->