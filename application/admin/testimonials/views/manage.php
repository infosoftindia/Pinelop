
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Manage Testimonials <button data-title="New Testimonial" data-href="<?=admin_url('testimonials/add')?>" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#admin_model"><i class="icon-plus"></i></button></div>
									<div class="card-body">
										<table class="table table-striped table-bordered" id="data-table">
											<thead>
												<tr>
													<th>#</th>
													<!--<th>Image</th>-->
													<th>Name</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php if($testimonials){ $count = 1; foreach($testimonials as $testimonial){ ?>
												<tr>
													<td><?=$count++?></td>
													<!--<td><img src="<?=base_url(getenv('uploads').$testimonial['testimonials_image'])?>" style="width: 50px; height: 50px; object-fit: cover"></td>-->
													<td><?=$testimonial['testimonials_name']?></td>
													<td><?=($testimonial['testimonials_status'] == 1)?'Active':'Deactive'?></td>
													<td>
														<div class="btn-group">
															<button data-title="Edit Testimonial" data-href="<?=admin_url('testimonials/edit/'.$testimonial['testimonials_id'])?>" class="btn btn-sm btn-<?=($testimonial['testimonials_status'] == 1)?'success':'warning'?>" data-toggle="modal" data-target="#admin_model"><i class="icon-pencil3"></i></button>
															<a href="<?=admin_url('testimonials/delete/'.$testimonial['testimonials_id'])?>" class="btn btn-sm btn-danger"><i class="icon-trash2"></i></a>
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

