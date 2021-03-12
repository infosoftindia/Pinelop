
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="card-header">Manage Sliders <button data-title="New Slider" data-href="<?=site_url('sliders/add')?>" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#admin_model"><i class="icon-plus"></i></button></div>
					<div class="card-body">
						<table class="table table-striped table-bordered" id="data-table">
							<thead>
								<tr>
									<th width=10>#</th>
									<th width=10>Image</th>
									<th>Title</th>
									<th width=10>Sort</th>
									<th width=10>Status</th>
									<th width=10>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if($sliders){ $count = 1; foreach($sliders as $slider){ ?>
								<tr>
									<td><?=$count++?></td>
									<td><img src="<?=base_url(getenv('uploads').$slider['sliders_image'])?>" style="width: 100px; height: 60px; object-fit: cover"></td>
									<td><?=$slider['sliders_title']?></td>
									<td><?=$slider['sliders_sort']?></td>
									<td><?=($slider['sliders_status'] == 1)?'Active':'Deactive'?></td>
									<td>
										<div class="btn-group">
											<button data-title="Edit Slider" data-href="<?=admin_url('sliders/edit/'.$slider['sliders_id'])?>" class="btn btn-sm btn-<?=($slider['sliders_status'] == 1)?'success':'warning'?>" data-toggle="modal" data-target="#admin_model"><i class="icon-pencil3"></i></button>
											<a href="<?=site_url('sliders/delete/'.$slider['sliders_id'])?>" class="btn btn-sm btn-danger"><i class="icon-trash2"></i></a>
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

