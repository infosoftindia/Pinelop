
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header"><?=$title?></div>
									<div class="card-body">
										<table class="table table-striped table-bordered" id="data-table">
											<thead>
												<tr>
													<th>#</th>
													<th>Orders</th>
													<th>Order Date</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													if($orders){
														$count = 1;
														foreach($orders as $order) { ?>
												<tr>
													<td><?=$count++?></td>
													<td><?='#'.$order['orders_id'].' '.$order['users_first_name'].' '.$order['users_last_name']?></td>
													<td><?=date('M d, Y', strtotime($order['orders_created_on']))?></td>
													<td><?=($order['orders_status'] == 1)?'Completed':(($order['orders_status'] == 2)?'Processing':(($order['orders_status'] == 3)?'Dispatched':(($order['orders_status'] == 4)?'Out for Delivery':($order['orders_status'] == 99)?'Cancelled':'Pending')))?></td>
													<td>
														<div class="btn-group">
															<a href="<?=admin_url('orders/view/'.$order['orders_id'])?>" class="btn btn-<?=($order['orders_status'] == 99)?'danger':'success'?> btn-sm"><span class="icon-eye"></span> View Order</a>
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

