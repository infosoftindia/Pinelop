<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
	<div class="container">
		<!-- STRART CONTAINER -->
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="page-title">
					<h1>Shop</h1>
				</div>
			</div>
			<div class="col-md-6">
				<ol class="breadcrumb justify-content-md-end">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Shop</li>
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
				<div class="col-lg-9">
					<div class="row align-items-center mb-4 pb-1">
						<div class="col-12">
							<div class="product_header">
								<div class="product_header_left">
									<div class="custom_select">
										<select class="form-control form-control-sm formSubmit" data-form="#sortingform" name="sort">
											<option value="order" <?= $this->input->get('sort') == 'order' ? 'selected' : '' ?>>Default sorting</option>
											<option value="date" <?= $this->input->get('sort') == 'date' ? 'selected' : '' ?>>Sort by newness</option>
											<option value="price" <?= $this->input->get('sort') == 'price' ? 'selected' : '' ?>>Sort by price: low to high</option>
											<option value="price-desc" <?= $this->input->get('sort') == 'price-desc' ? 'selected' : '' ?>>Sort by price: high to low</option>
										</select>
									</div>
								</div>
								<div class="product_header_right">
									<div class="products_view">
										<a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
										<a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row shop_container">
						<?php
						if ($posts) {
							foreach ($posts as $post) {
								echo '<div class="col-6 col-md-4">' . product_grid($post) . '</div>';
							}
						}
						?>
					</div>
					<?php if ($this->pagination->create_links()) { ?>
						<div class="row">
							<div class="col-12">
								<?= $this->pagination->create_links() ?>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
					<form method="get" action="" id="sortingform">
						<div class="sidebar">
							<div class="widget">
								<h5 class="widget_title">Filter</h5>
								<div class="filter_price">
									<?php
									$min = ($this->input->get('min') > -1) ? $this->input->get('min') : 50;
									$max = ($this->input->get('max') > -1) ? $this->input->get('max') : 12000;
									?>
									<div id="price_filter" data-min="0" data-max="<?= pPrice(25000, 1) ?>" data-min-value="<?= pPrice($min, 1) ?>" data-max-value="<?= pPrice($max, 1) ?>" data-price-sign="<?= $this->session->userdata('set_currency') ?> "></div>
									<div class="price_range">
										<span>Price: <span id="flt_price"></span></span>
										<input type="hidden" id="price_first" name="min" value="<?= $min ?>">
										<input type="hidden" id="price_second" name="max" value="<?= $max ?>">
									</div>
								</div>
							</div>

							<?php if ($colours) { ?>
								<div class="widget">
									<h5 class="widget_title">Color</h5>
									<div class="product_color_switch">
										<?php
										foreach ($colours as $color) {
											echo '<span data-color="' . $color . '" onclick="saveValue(' . "'" . $color . "'" . ', \'#color\')" class="' . (($this->input->get('color') == $color) ? 'active' : '') . '"></span>';
										}
										?>
									</div>
									<input type="hidden" name="color" value="<?= $this->input->get('color') ?>" id="color">
									<input type="hidden" name="sort" value="<?= $this->input->get('sort') ?>" id="sorting_val">
								</div>
							<?php } ?>

							<?php if ($brands) {
								$brnds = $this->input->get('brands') ?? []; ?>
								<div class="widget">
									<h5 class="widget_title">Brand</h5>
									<ul class="list_brand">
										<?php foreach ($brands as $brand) { ?>
											<li>
												<div class="custome-checkbox">
													<input class="form-check-input" type="checkbox" name="brands[]" id="brand<?= $brand['brands_id'] ?>" value="<?= $brand['brands_id'] ?>" <?= in_array($brand['brands_id'], $brnds) ? 'checked' : '' ?>>
													<label class="form-check-label" for="brand<?= $brand['brands_id'] ?>"><span><?= $brand['brands_url'] ?></span></label>
												</div>
											</li>
										<?php } ?>
									</ul>
								</div>
							<?php } ?>
							<div class="widget">
								<button type="submit" class="btn btn-fill-out btn-sm text-uppercase">Apply Filter</button>
							</div>


							<?php if ($categories) { ?>
								<div class="widget">
									<h5 class="widget_title">Categories</h5>
									<ul class="widget_categories">
										<?php foreach ($categories as $category) { ?>
											<li><a href="<?= site_url('category/' . $category['categories_slug']) ?>"><span class="categories_name active"><?= $category['categories_name'] ?></span>
													<!--<span class="categories_num">()</span></a></li>-->
												<?php } ?>
									</ul>
								</div>
							<?php } ?>



							<div class="widget pt-4">
								<div class="shop_banner">
									<div class="banner_img overlay_bg_20">
										<img src="<?= site_url('themes/shopping/assets/') ?>images/sidebar_banner_img.jpg" alt="sidebar_banner_img">
									</div>
									<div class="shop_bn_content2 text_white">
										<h5 class="text-uppercase shop_subtitle">New Collection</h5>
										<h3 class="text-uppercase shop_title">Sale 30% Off</h3>
										<a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
									</div>
								</div>
							</div>
						</div>
					</form>
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