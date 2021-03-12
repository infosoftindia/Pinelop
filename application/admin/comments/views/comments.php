
<style>
</style>
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Manage Comments</div>
									<div class="card-body">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th>#</th>
													<th>Post Title</th>
													<th>User</th>
													<th>Date</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php if($comments){ $count=1; foreach($comments as $comment){ ?>
												<tr>
													<td><?=$count++?></td>
													<td><a href="<?=site_url($comment['posts_slug'])?>" target="_balnk"><?=$comment['posts_title']?></a></td>
													<td><?=$comment['comments_name']?></td>
													<td><?=date('M d, Y', strtotime($comment['comments_created']))?></td>
													<td><?=($comment['comments_status'] == 1)?'Approved':'Unapproved'?></td>
													<td>
														<div class="btn-group">
															<button data-title="View Comment" data-href="<?=site_url('comments/view/'.$comment['comments_id'])?>" class="btn btn-sm btn-info" data-toggle="modal" data-target="#admin_model"><i class="icon-info4"></i></button>
															<?=($comment['comments_status'] != 1)?'<a href="'.site_url('comments/approve/'.$comment['comments_id']).'" class="btn btn-sm btn-success"><i class="icon-check2"></i></a>':''?>
															<a href="<?=site_url('comments/delete/'.$comment['comments_id'])?>" class="btn btn-sm btn-danger"><i class="icon-trash2"></i></a>
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

