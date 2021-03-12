
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Contact Datas</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-4">
												<form action="<?=site_url('sales/monthly')?>">
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<select class="form-control w-100" name="month">
																<?php for($i=1; $i<=12; $i++){ ?>
																	<option value="<?=$i?>"><?=date('M', strtotime('2020/'.$i.'/1'));?></option>
																<?php } ?>
															</select>
														</div>
														<select class="form-control" name="year">
															<?php for($i=2020; $i<=date('Y'); $i++){ ?>
																<option value="<?=$i?>"><?=$i?></option>
															<?php } ?>
														</select>
														<div class="input-group-append">
															<button type="submit" class="btn btn-info">Show Daily Report</button>
														</div>
													</div>
												</form>
											</div>
											<div class="col-md-4">
												<form action="<?=site_url('sales/yearly')?>">
													<div class="input-group mb-3">
														<select class="form-control" name="year">
															<?php for($i=2020; $i<=date('Y'); $i++){ ?>
																<option value="<?=$i?>"><?=$i?></option>
															<?php } ?>
														</select>
														<div class="input-group-append">
															<button type="submit" class="btn btn-info">Show Yearly Report</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

