
						<div class="row gutters">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
								<div class="card">
									<div class="card-header">Add New Offer</div>
									<div class="card-body">
										<form method="POST" enctype="multipart/form-data">
											<div class="form-group mb-3">
												<label for="name">Offer Title</label>
												<input type="text" class="form-control" id="name" placeholder="Offer Title" value="<?=set_value('name')?>" name="name">
												<label class="m-0 text-danger"><?=form_error('name')?></label>
											</div>
											<div class="form-group mb-3">
												<label for="image">Offer Image</label>
												<input type="file" class="form-control" id="image" name="userfile">
											</div>
											<button type="submit" class="btn btn-success">Save Offer</button>
										</form>
									</div>
								</div>
							</div>
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
								<div class="card">
									<div class="card-header">Manage Offers</div>
									<div class="card-body">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th>#</th>
													<th>Image</th>
													<th>Offer Title</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													if($offers){
														$count = 1;
														foreach($offers as $offer) { ?>
												<tr>
													<td><?=$count++?></td>
													<td><img src="<?=base_url(getenv('uploads').$offer['products_best_offers_image'])?>" class="img-fluid" style="width: 75px"></td>
													<td><?=$offer['products_best_offers_title']?></td>
													<td><?=($offer['products_best_offers_status'] == 1)?'Active':'Inactive'?></td>
													<td>
														<div class="btn-group">
															<a href="<?=admin_url('offers/edit-best-offers/'.$offer['products_best_offers_id'])?>" class="btn btn-info" class="btn btn-primary"><span class="icon-edit"></span></a>
															<a href="<?=admin_url('offers/delete-best-offers/'.$offer['products_best_offers_id'])?>" class="btn btn-danger delete"><span class="icon-trash"></span></a>
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
										<h4 class="modal-title">Modal Heading</h4>
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