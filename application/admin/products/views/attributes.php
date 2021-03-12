		<style>
			.fs-75{
			font-size: 10px !important;
			}
		</style>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="card-header">Manage Attribute</div>
					<div class="card-body">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<?php if($attributes) { $index = 0; foreach($attributes as $attribute) {  ?>
							<li class="nav-item">
								<a class="nav-link <?=$index++ == 0?'active':''?>" data-toggle="tab" href="#tabb<?=$attribute['product_attributes_id']?>"><?=$attribute['product_attributes_name']?></a>
							</li>
							<?php } } ?>
							<li class="nav-item">
								<a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#myModalNew"><i class="icon-plus"></i></a>
							</li>
						</ul>
						<div class="tab-content">
							<?php if($attributes) { $index1 = 0; foreach($attributes as $attribute) {  ?>
							<div id="tabb<?=$attribute['product_attributes_id']?>" class="container tab-pane <?=$index1++ == 0?'active':'fade'?>">
								<ul class="nav nav-tabs">
									<?php if($attribute['variables']) { $vari = 0; foreach($attribute['variables'] as $variable) {  ?>
									<li class="nav-item">
										<a class="nav-link <?=$vari++ == 0?'active':''?>" data-toggle="tab" href="#child<?=$variable['product_variables_id']?>"><?=$variable['product_variables_value']?></a>
									</li>
									<?php } } ?>
								</ul>
								<!-- Tab panes -->
								<div class="tab-content">
									<?php if($attribute['variables']) { $vari = 0; foreach($attribute['variables'] as $variable) {  ?>
									<div class="tab-pane container <?=$vari++ == 0?'active':'fade'?>" id="child<?=$variable['product_variables_id']?>">
										<form method="POST" action="<?=admin_url('products/attribute/add-variant/'.$variable['product_variables_id'])?>" enctype="multipart/form-data">
											<div class="form-group mb-3">
												<label for="price">Price</label>
												<input type="text" class="form-control" value="<?=$variable['product_variables_price']?>" id="price" placeholder="Price" value="<?=set_value('price')?>" name="price">
												<label class="m-0 text-danger"><?=form_error('name')?></label>
											</div>
											<div class="form-group mb-3">
												<label for="image">Image</label>
												<input type="file" class="form-control" id="image" name="userfile">
												<input type="hidden" class="form-control" id="image"value="<?=$variable['product_variables_image']?>" name="old_Picture">
												<img src="<?=base_url(getenv('uploads').($variable['product_variables_image']))?>" style="height:200px; object-fir:cover;" class="img-fluid pt-2"><br><br>
												<?php if($variable['product_variables_image'] != 'default.png') { ?>
												<a href="<?=admin_url('products/attributes/delete-variant-image/'.$variable['product_variables_id'])?>" class="btn btn-danger"> Delete Image</i></a>
												<?php } ?>
											</div>
											<button type="submit" class="btn btn-success ">Save</button>
										</form>
									</div>
									<?php } } ?>
								</div>
							</div>
							<?php } } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModalNew">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">New Attribute</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body" id="modal_Output">
						<form method="POST" enctype="multipart/form-data">
							<div class="form-group mb-3">
								<label for="name">Attribute Name</label>
								<input type="text" class="form-control" id="name" placeholder="Attribute Name" value="<?=set_value('name')?>" name="name">
								<label class="m-0 text-danger"><?=form_error('name')?></label>
							</div>
							
							<div class="form-group mb-3">
								<label for="type">Attribute Type</label>
								<select class="form-control" name="type">
									<option>Radio</option>
									<!--<option>Checkbox</option>-->
									<option>Color</option>
								</select>
								<label class="m-0 text-danger"><?=form_error('type')?></label>
							</div>
							<div class="form-group mb-3">
								<label for="vname">Variant &nbsp; <i class="icon-plus fs-75"></i></label>
								<input type="text" class="form-control" id="vname" placeholder="Variant Name" value="<?=set_value('vname')?>" name="vname">
								<label class="m-0 text-danger"><?=form_error('vname')?></label>
							</div>
							
							<button type="submit" class="btn btn-success ">Save Attribute</button>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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