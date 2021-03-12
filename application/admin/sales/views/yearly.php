
<style>
	.chart-height{
		height: 600px;
	}
</style>
						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Monthly Report</div>
									<div class="card-body">
										<div id="monthlyGraph" class="chart-height"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Yearly Report</div>
									<div class="card-body">
										<div id="yearlyGraph" class="chart-height"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->
						<?php
							$year = $this->input->get('year');
							$data = [];
							$count = [];
							for($i=1; $i<=12; $i++){
								foreach($orders as $p => $monthly_Sale){
									if($i == $p){
										$data[$i] = count($orders[str_pad($i, 2, '0', STR_PAD_LEFT)]);
									}
								}
							}
							for($i=1; $i<=12; $i++){
								@$count[] = ($data[$i] > 0)?($data[$i]):0;
							}
						?>
	<script>
		var monthlyGraph = [
            ['x', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            ['Sales', <?=implode(', ', $count)?>]
		]

		var yearlyGraph = [
			['Sales', <?=$years_Array['sales']?>],
			['Instock', <?=$years_Array['stock']?>]
		]
	</script>


























