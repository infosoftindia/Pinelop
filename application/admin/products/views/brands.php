<div class="row gutters">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
		<div class="card">
			<div class="card-header">New Brand</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group mb-3">
						<label for="url_link">Brand Name</label>
						<input type="text" class="form-control" id="url_link" placeholder="Brand Name" value="<?= set_value('url_link') ?>" name="url_link">
						<label class="m-0 text-danger"><?= form_error('url_link') ?></label>
					</div>
					<div class="form-group mb-3">
						<label for="image">Brand Image</label>
						<input type="file" class="form-control" id="image" name="userfile">
					</div>
					<button type="submit" class="btn btn-success ">Save Brand</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
		<div class="card">
			<div class="card-header">Manage Brands</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="data-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($brands) {
							$count = 1;
							foreach ($brands as $brand) { ?>
								<tr>
									<td><?= $count++ ?></td>
									<td><?= $brand['brands_url'] ?></td>
									<td>
										<div class="btn-group">
											<a href="javascript:;" class="btn btn-info" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="show_Modal('<?= admin_url('products/edit-brand/' . $brand['brands_id']) ?>', '#modal_Output')"><span class="icon-edit"></span></a>
											<a href="<?= admin_url('products/delete-brand/' . $brand['brands_id']) ?>" class="btn btn-danger delete"><span class="icon-trash"></span></a>
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