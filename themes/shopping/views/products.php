<main>
	<div class="top_banner">
		<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
			<div class="container">
				<div class="breadcrumbs">
					<ul>
						<li><a href="<?=site_url()?>">Home</a></li>
						<li>Shop</li>
					</ul>
				</div>
				<h1>Shop</h1>
			</div>
		</div>
		<img src="img/bg_cat_shoes.jpg" class="img-fluid" alt="">
	</div>
	<!-- /top_banner -->
	<div id="stick_here"></div>
	<div class="toolbox elemento_stick">
		<div class="container">
			<ul class="clearfix">
				<li>
					<div class="sort_select">
						<select name="sort" id="sort">
							<option value="popularity" selected="selected">Sort by popularity</option>
							<option value="rating">Sort by average rating</option>
							<option value="date">Sort by newness</option>
							<option value="price">Sort by price: low to high</option>
							<option value="price-desc">Sort by price: high to 
						</select>
					</div>
				</li>
				<li>
					<a href="#0" class="open_filters">
					<i class="ti-filter"></i><span>Filters</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /toolbox -->
	<div class="container margin_30">
		<div class="row">
			<aside class="col-lg-3" id="sidebar_fixed">
				<div class="filter_col">
					<div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
					<div class="filter_type version_2">
						<h4><a href="#filter_1" data-toggle="collapse" class="opened">Categories</a></h4>
						<div class="collapse show" id="filter_1">
							<ul>
								<li>
									<label class="container_check">Men <small>12</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Women <small>24</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Running <small>23</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Training <small>11</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
							</ul>
						</div>
						<!-- /filter_type -->
					</div>
					<!-- /filter_type -->
					<div class="filter_type version_2">
						<h4><a href="#filter_2" data-toggle="collapse" class="opened">Color</a></h4>
						<div class="collapse show" id="filter_2">
							<ul>
								<li>
									<label class="container_check">Blue <small>06</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Red <small>12</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Orange <small>17</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Black <small>43</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
							</ul>
						</div>
					</div>
					<!-- /filter_type -->
					<div class="filter_type version_2">
						<h4><a href="#filter_3" data-toggle="collapse" class="closed">Brands</a></h4>
						<div class="collapse" id="filter_3">
							<ul>
								<li>
									<label class="container_check">Adidas <small>11</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Nike <small>08</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Vans <small>05</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">Puma <small>18</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
							</ul>
						</div>
					</div>
					<!-- /filter_type -->
					<div class="filter_type version_2">
						<h4><a href="#filter_4" data-toggle="collapse" class="closed">Price</a></h4>
						<div class="collapse" id="filter_4">
							<ul>
								<li>
									<label class="container_check">$0 — $50<small>11</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">$50 — $100<small>08</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">$100 — $150<small>05</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_check">$150 — $200<small>18</small>
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</li>
							</ul>
						</div>
					</div>
					<!-- /filter_type -->
					<div class="buttons">
						<a href="#0" class="btn_1">Filter</a> <a href="#0" class="btn_1 gray">Reset</a>
					</div>
				</div>
			</aside>
			<!-- /col -->
			
			
			
			
			
			<div class="col-lg-9">
				<div class="row small-gutters">
					<?php
						if($posts){
							foreach($posts as $post){
								echo '<div class="col-6 col-md-4">'.product_grid($post['posts_id']).'</div>';
							}
						}
					?>
				</div>		
			</div>
			<!-- /row -->
			<?php if($this->pagination->create_links()){ ?>
			<div class="pagination__wrapper">
				<ul class="pagination">
					<?=$this->pagination->create_links()?>
				</ul>
			</div>
			<?php } ?>
			<!-- /col -->
		</div>
	</div>
</main>