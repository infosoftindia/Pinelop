			
		<!-- START SECTION BREADCRUMB -->
		<div class="breadcrumb_section bg_gray page-title-mini">
			<div class="container"><!-- STRART CONTAINER -->
				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="page-title">
							<h1>Categories</h1>
						</div>
					</div>
					<div class="col-md-6">
						<ol class="breadcrumb justify-content-md-end">
							<li class="breadcrumb-item"><a href="<?=site_url()?>">Home</a></li>
							<li class="breadcrumb-item active">Categories</li>
						</ol>
					</div>
				</div>
			</div><!-- END CONTAINER-->
		</div>
		<!-- END SECTION BREADCRUMB -->

		<!-- START MAIN CONTENT -->
		<div class="main_content">

		<!-- START SECTION SHOP -->
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row align-items-center mb-4 pb-1">
							<div class="col-12">
								<div class="product_header">
									<div class="product_header_left">
										<div class="custom_select">
											<select class="form-control form-control-sm">
												<option value="order">Default sorting</option>
												<option value="popularity">Sort by popularity</option>
												<option value="date">Sort by newness</option>
												<option value="price">Sort by price: low to high</option>
												<option value="price-desc">Sort by price: high to low</option>
											</select>
										</div>
									</div>
									<div class="product_header_right">
										<div class="products_view">
											<a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
											<a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
										</div>
										<div class="custom_select">
											<select class="form-control form-control-sm">
												<option value="">Showing</option>
												<option value="9">9</option>
												<option value="12">12</option>
												<option value="18">18</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div> 
						<div class="row shop_container">
							<?php if($categories){
									foreach($categories as $category){
										echo '<div class="col-md-3 col-6">'.category_grid($category).'</div>';
									}
								}
							?>		
						</div>
						<div class="row">
							<div class="col-12">
								<ul class="pagination mt-3 justify-content-center pagination_style1">
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END SECTION SHOP -->

		<!-- START SECTION SUBSCRIBE NEWSLETTER -->
		<div class="section bg_default small_pt small_pb">
			<div class="container">	
				<div class="row align-items-center">	
					<div class="col-md-6">
						<div class="heading_s1 mb-md-0 heading_light">
							<h3>Subscribe Our Newsletter</h3>
						</div>
					</div>
					<div class="col-md-6">
						<div class="newsletter_form">
							<form>
								<input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
								<button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- START SECTION SUBSCRIBE NEWSLETTER -->

		</div>
		<!-- END MAIN CONTENT -->