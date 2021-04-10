			<!-- START SECTION BREADCRUMB -->
			<div class="breadcrumb_section bg_gray page-title-mini">
				<div class="container">
					<!-- STRART CONTAINER -->
					<div class="row align-items-center">
						<div class="col-md-6">
							<div class="page-title">
								<h1>Best Offers</h1>
							</div>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb justify-content-md-end">
								<li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
								<li class="breadcrumb-item active">Best Offers</li>
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

								<div class="row shop_container">
									<?php if ($offers) {
										foreach ($offers as $offer) { ?>
											<div class="col-lg-4">
												<div class="product_box text-center">
													<div class="product_img">
														<a href="<?= base_url('best-offers/' . $offer['products_best_offers_id']) ?>">
															<img src="<?= base_url(getenv('uploads') . $offer['products_best_offers_image']) ?>" style="height: 200px; width: 100%; object-fit: cover;" alt="<?= $offer['products_best_offers_title'] ?>">
														</a>
													</div>
													<div class="product_info">
														<h6 class="product_title"><a href="<?= base_url('best-offers/' . $offer['products_best_offers_id']) ?>"><?= $offer['products_best_offers_title'] ?></a></h6>
													</div>
												</div>
											</div>
									<?php }
									}
									?>
								</div>
								<!-- <div class="row">
							<div class="col-12">
								<ul class="pagination mt-3 justify-content-center pagination_style1">
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a></li>
								</ul>
							</div>
						</div> -->
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