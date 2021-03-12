		
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="card-header">Manage Pages</div>
					<div class="card-body">
						<table class="table table-striped table-bordered" id="data-table">
							<thead>
								<tr>
									<th width="5%">#</th>
									<th width="45%">Title</th>
									<th width="30%">Description</th>
									<th width="20%">Date</th>
								</tr>
							</thead>
							<tbody>
								<?php if($blogs){ $count = 1; foreach($blogs as $blog){ ?>
								<tr class="table-row">
									<td><?=$count++?></td>
									<td>
										<?=$blog['posts_title']?>
										<p><small class="table-small">
										<a href="<?=admin_url('blogs/edit/'.$blog['blogs_post'])?>" class="mr-1 text-success">Edit</a>
										<a href="javascript:;" onclick="deletes('<?=admin_url('blogs/delete/'.$blog['blogs_post'])?>')" class="mr-1 text-danger" >Delete</a>
										<a href="<?=admin_url('blog/'.$blog['blogs_post'])?>" class="mr-1 text-info">View</a>
									</td>
									<td><?=character_limiter($blog['blogs_description'],10)?></td>
									<td>
										<div><?=($blog['posts_status'] == 1)?'Published':'<span class="text-danger"> Inactive </span>'?></div>
										<div><small><?=date(getenv('DateFormat'), strtotime($blog['posts_created']))?></small></div>
									</td>
								</tr>
								<?php } } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

