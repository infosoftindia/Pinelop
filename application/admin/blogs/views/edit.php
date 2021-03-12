
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
						<form method="POST" enctype="multipart/form-data">
							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
									<!-- Row start -->
									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">General Information</div>
												<div class="card-body">
													<div class="form-group mb-3">
														<label for="title">Blog Title </label>
														<input type="text" class="form-control" id="title" placeholder="Blog Title" value="<?=set_value('title') != ''?set_value('name'):$blogs['posts_title']?>" name="title">
														<label class="text-danger"><?=form_error('name')?></label>
													</div>
													<div class="form-group  mb-3">
														<label for="desc">Description</label>
														<textarea class="form-control editor" id="desc" rows="10" placeholder="Product Description" name="description"><?=set_value('description') != ''?set_value('description'):$blogs['blogs_description']?></textarea>
														<label class="text-danger"><?=form_error('description')?></label>
														
													</div>
												<button type="submit" class="btn btn-success ">Save Blog</button>
												</div>
											</div>
										</div>
									</div>
									<!-- Row end -->
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
									<!-- Row start -->
									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">Status</div>
												<div class="card-body">
													<div class="form-group">
														<label for="status">Status</label>
														<select class="form-control form-control-sm" id="status" name="status">
															<option value="1" <?=$blogs['posts_status'] == '1'?'selected':''?>>Active</option>
															<option value="0" <?=$blogs['posts_status'] == '0'?'selected':''?>>Inactive</option>
														</select>
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
													<input type="hidden" value="<?=$blogs['posts_cover']?>" name="old_Picture">
												</div>
											</div>
										</div>
									</div>
									<!-- Row end -->
								</div>
							</div>
						</form>
