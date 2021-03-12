
<style>
	.chart-height{
		height: 600px;
	}
</style>
						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Daily Report</div>
									<div class="card-body">
										<div id="dailyGraph" class="chart-height"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

						<?php
							$year = $this->input->get('year');
							$month = $this->input->get('month');
							$data = [];
							$days = month($year, $month);
							$count = [];
							foreach($days as $day){
								foreach($orders as $p => $monthly_Sale){
									if(str_replace("'", "", $day) == $p){
										$data[str_replace("'", "", $day)] = count($orders[str_replace("'", "", $day)]);
									}
								}
							}
							foreach($days as $dd){
								@$count[] = ($data[str_replace("'", "", $dd)] > 0)?($data[str_replace("'", "", $dd)]):0;
							}
						?>
	<script>
		var dailyGraph = [
			['x', <?=implode(', ', $days)?>],
			['Sales', <?=implode(', ', $count)?>]
		]
	</script>


























