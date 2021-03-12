
						<style>
							.ms-list {
								height: 600px !important;
							}
						</style>
						<form method="POST" enctype="multipart/form-data">
							<div class="row gutters">
								<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
									<div class="card">
										<div class="card-header">Edit Offer</div>
										<div class="card-body">
											<form method="POST" enctype="multipart/form-data">
												<div class="form-group mb-3">
													<label for="name">Offer Title</label>
													<input type="text" class="form-control" id="name" placeholder="Offer Title" value="<?=$offer['products_best_offers_title']?>" name="name">
													<label class="m-0 text-danger"><?=form_error('name')?></label>
												</div>
												<div class="form-group mb-3">
													<label for="image">Offer Image</label>
													<img src="<?=base_url(getenv('uploads').($offer['products_best_offers_image']))?>" class="img-fluid" style="max-width: 100%; height: 155px;">
													<input type="file" class="form-control" id="image" name="userfile">
													<input type="hidden" value="<?=$offer['products_best_offers_image']?>" name="old_Picture">
												</div>
												<div class="form-group mb-3">
													<label for="status">Status</label>
													<select class="form-control" id="status" name="status">
														<option value="1" <?=$offer['products_best_offers_status'] == '1'?'selected':''?>>Active</option>
														<option value="0" <?=$offer['products_best_offers_status'] == '0'?'selected':''?>>Inactive</option>
													</select>
												</div>
												<button type="submit" class="btn btn-success">Save Offer</button>
											</form>
										</div>
									</div>
								</div>
								<div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
									<!-- Row start -->
									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">Products</div>
												<div class="card-body">
													<form action="<?=admin_url('offers/save-best-offers/'.$offer['products_best_offers_id'])?>" method="POST">
														<div class="form-row">
															<select multiple="multiple" class="multiselect" name="products[]">
																<?php if($products){ foreach($products as $product){ ?>
																<option value="<?=$product['posts_id']?>"
																
																<?=(in_array($product['posts_id'], $offerproducts))?'selected':''?>
																
																><?=$product['posts_title']?></option>
																<?php } } ?>
															</select>
														</div>
														<button type="submit" class="btn btn-success mt-3">Save Offers</button>
													</form>
												</div>
											</div>
										</div>
									</div>
									<!-- Row end -->
								</div>
							</div>

