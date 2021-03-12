
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Contact Datas</div>
									<div class="card-body">
										<table class="table table-striped table-bordered" id="data-table">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<!--<th>Phone</th>-->
													<th>Email</th>
													<th>Date</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php if($contacts){ $count = 1; foreach($contacts as $contact){ ?>
												<tr>
													<td><?=$count++?></td>
													<td><?=$contact['contacts_name']?></td>
													<!--<td><?=$contact['contacts_phone']?></td>-->
													<td><?=$contact['contacts_email']?></td>
													<td><?=date('M d, Y', strtotime($contact['contacts_created']))?></td>
													<td><?=($contact['contacts_status'] == 1)?'Opened':'New'?></td>
													<td><button data-title="View Contact Data" data-href="<?=admin_url('contacts/view/'.$contact['contacts_id'])?>" class="btn btn-sm btn-<?=($contact['contacts_status'] == 1)?'success':'info'?>" data-toggle="modal" data-target="#admin_model"><i class="icon-eye"></i></button></td>
												</tr>
												<?php } } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

