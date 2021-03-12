
						<div class="row gutters">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
								<div class="card">
									<div class="card-header">New Category</div>
									<div class="card-body">
										<form method="POST" enctype="multipart/form-data">
											<div class="form-group mb-3">
												<label for="name">Attribute Variant Name</label>
												<input type="text" class="form-control" id="name" placeholder="Variant Name" value="<?=set_value('name')?>" name="name">
												<label class="m-0 text-danger"><?=form_error('name')?></label>
											</div>
											<div class="form-group mb-3">
												<label for="image">Image</label>
												<input type="file" class="form-control" id="image" name="userfile" required>
											</div>
											<div class="form-group mb-3">
												<label for="status">Status</label>
												<select class="form-control" id="status" name="status">
													<option value="1" <?=set_value('status') == '1'?'selected':''?>>Active</option>
													<option value="0" <?=set_value('status') == '0'?'selected':''?>>Inactive</option>
												</select>
											</div>
											
											<button type="submit" class="btn btn-success ">Save Category</button>
										</form>
									</div>
								</div>
							</div>
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
								<div class="card">
									<div class="card-header">Manage Categories</div>
									<div class="card-body">
										<table class="table table-striped table-bordered" id="data-table">
											<thead>
												<tr>
													<th>#</th>
													<th>Category Name</th>
													<th>Category parent</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													if($categories){
														$count = 1;
														foreach($categories as $category) { ?>
												<tr>
													<td><?=$count++?></td>
													<td><?=$category['categories_name']?></td>
													<td><?=getCategoryName($category['categories_parent']);?></td>
													<td><?=($category['categories_status'] == 1)?'Active':'Inactive'?></td>
													<td>
														<div class="btn-group">
															<a href="javascript:;" class="btn btn-info" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="show_Modal('<?=admin_url('products/edit-category/'.$category['categories_id'])?>', '#modal_Output')"><span class="icon-edit"></span></a>
															<a href="<?=admin_url('products/delete-category/'.$category['categories_id'])?>" class="btn btn-danger delete"><span class="icon-trash"></span></a>
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