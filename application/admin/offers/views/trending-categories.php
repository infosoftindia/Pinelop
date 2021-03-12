
						<style>
							.ms-list {
								height: 600px !important;
							}
						</style>
						<form method="POST" action="<?=admin_url('offers/save_trending_categories')?>" enctype="multipart/form-data">
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<!-- Row start -->
									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">Daily Deals</div>
												<div class="card-body">
													<div class="form-row">
														<select multiple="multiple" class="multiselect" name="trendings[]">
															<?php if($categories){ foreach($categories as $category){ ?>
															<option value="<?=$category['categories_id']?>"
															
															<?=(in_array($category['categories_id'], $cat))?'selected':''?>
															
															><?=$category['categories_name']?></option>
															<?php } } ?>
														</select>
													</div>
													<button type="submit" class="btn btn-success mt-3">Save Offers</button>
												</div>
											</div>
										</div>
									</div>
									<!-- Row end -->
								</div>
							</div>
						</form>

