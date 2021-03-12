
						<style>
							.custom-file {
								width: 100% !important;
							}
							.thumbnail-h-180{
								max-height: 180px !important;
								width: 100% !important;
								object-fit: cover;
								border: 1px solid #179978;
								border-radius: 5px;
								margin-bottom: 5px;
							}

							.thumbnail-h-100{
								height: 100px;
								object-fit: cover;
								padding: 3px;
								border-radius: 10px;
							}
						</style>
						<form method="POST" action="" enctype="multipart/form-data">
							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
									<!-- Row start -->
									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">General Information</div>
												<div class="card-body">
													<div class="form-group mb-3">
														<label for="name">Product Name</label>
														<input type="text" class="form-control" id="name" placeholder="Product Name" value="<?=$product['posts_title']?>" name="title">
														<label class="m-0 text-danger"><?=form_error('title')?></label>
													</div>
													<div class="form-group  mb-3">
														<label for="short_desc">Short Description</label>
														<textarea class="form-control" id="short_desc" rows="2" placeholder="Short Description" value="" name="short_desc"><?=$product['products_short_description']?></textarea>
														<label class="m-0 text-danger"><?=form_error('short_desc')?></label>
													</div>
													<div class="form-group  mb-3">
														<label for="desc">Description</label>
														<textarea class="form-control" id="desc" rows="6" placeholder="Product Description" value="" name="description"><?=$product['products_description']?></textarea>
														<label class="m-0 text-danger"><?=form_error('description')?></label>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">More Data</div>
												<div class="card-body">
													<div class="form-row">
														<div class="form-group col-md-6">
															<label for="sku">SKU</label>
															<input type="text" class="form-control" id="sku" placeholder="Store Keeping Unit" value="<?=$product['products_sku']?>" name="sku">
														<label class="m-0 text-danger"><?=form_error('sku')?></label>
														</div>
														<div class="form-group col-md-6">
															<label for="quantity">Stock Quantity</label>
															<input type="text" class="form-control" id="quantity" placeholder="Product Stock (Quantity)" value="<?=$product['products_stock']?>" name="quantity">
															<label class="m-0 text-danger"><?=form_error('quantity')?></label>
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-md-6">
															<label for="price">Price</label>
															<input type="text" class="form-control" id="price" placeholder="Product Price" value="<?=$product['products_price']?>" name="price">
															<label class="m-0 text-danger"><?=form_error('price')?></label>
														</div>
														<div class="form-group col-md-6">
															<label for="sale_price">Sale Price</label>
															<input type="text" class="form-control" id="sale_price" placeholder="Product Offer Price" value="<?=$product['products_sale_price']?>" name="sale_price">
															<label class="m-0 text-danger"><?=form_error('sale_price')?></label>
														</div>
													</div>
													<button type="submit" class="btn btn-success mt-3">Update Product</button>
												</div>
											</div>
										</div>
										<?php if($this->session->userdata('user_role') != 2){ ?>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">Similar Products</div>
												<div class="card-body">
													<div class="form-row">
														<select multiple="multiple" class="multiselect" name="similars[]">
															<?php if($products){ foreach($products as $similar){ ?>
															<option value="<?=$similar['posts_id']?>"
															
															<?=(in_array($similar['posts_id'], $product['similars']))?'selected':''?>
															
															><?=$similar['posts_title']?></option>
															<?php } } ?>
														</select>
													</div>
													<button type="submit" class="btn btn-success mt-3">Update Product</button>
												</div>
											</div>
										</div>
										<?php } ?>
									</div>
									<!-- Row end -->
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
									<!-- Row start -->
									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">Product Category</div>
												<div class="card-body">
													<div class="form-group">
														<?php
															$cat_ID = [];
															$cats = $product['categories'];
															foreach($cats as $cat){
																$cat_ID[] = $cat['categories_id'];
															}
															// var_dump($cat_ID);
														?>
														<select class="form-control selectF catChange" name="category[]" multiple style="width: 100%" required>
															<?php if($categories){ foreach($categories as $category){ ?>
																<option value="<?=$category['categories_id']?>" <?=(in_array($category['categories_id'], $cat_ID))?'selected':''?>><?=$category['categories_name']?></option>
															<?php } } ?>
														</select>
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">More Information</div>
												<div class="card-body">
													<div class="form-group">
														<label for="featured">Featured</label>
														<select class="form-control form-control-sm" id="featured" name="featured">
															<option value="1" <?=$product['products_featured'] == '1'?'selected':''?>>Yes</option>
															<option value="0" <?=$product['products_featured'] == '0'?'selected':''?>>No</option>
														</select>
														<label class="m-0 text-danger"><?=form_error('featured')?></label>
													</div>
													<div class="form-group">
														<label for="status">Status</label>
														<select class="form-control form-control-sm" id="status" name="status">
															<option value="1" <?=$product['posts_status'] == '1'?'selected':''?>>Active</option>
															<option value="0" <?=$product['posts_status'] == '0'?'selected':''?>>Inactive</option>
														</select>
														<label class="m-0 text-danger"><?=form_error('status')?></label>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">Thumbnail Image</div>
												<div class="card-body">
													<img src="<?=$thumbnail?>" class="img-fluid thumbnail-h-180" id="img_thumbnail">
													<label class="custom-file">
														<input type="file" id="file2" class="custom-file-input" name="userfile" onchange="readURL(this, '#img_thumbnail');">
														<span class="custom-file-control"></span>
													</label>
													<input type="hidden" value="<?=$product['posts_cover']?>" name="old_Picture">
												</div>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">Product Gallery</div>
												<div class="card-body">
													<label class="custom-file">
														<input type="file" id="file2" class="custom-file-input" name="userfiles" onchange="readURLMultiple(this, '#img_gallery')" multiple>
														<span class="custom-file-control count_image"></span>
													</label>
													<div class="row mt-2" id="img_gallery"></div>
												</div>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">Product Attributes</div>
												<div class="card-body">
													<a href="<?=admin_url('products/attributes/'.$product['posts_id'])?>" type="submit" class="btn btn-success btn-block mt-3">Add Attributes</a>
												</div>
											</div>
										</div>
									</div>
									<!-- Row end -->
								</div>
							</div>
						</form>

