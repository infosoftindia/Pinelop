		<?php
		$per = 0;
		if ($post['comments']) {
			$totalRate = 0;
			foreach ($post['comments'] as $rate) {
				$totalRate += $rate['comments_rate'];
			}
			$rt = count($post['comments']);
			$per = $totalRate / $rt;
		}
		?>

		<style>
			span.active>label {
				color: white;
			}
		</style>
		<!-- START SECTION BREADCRUMB -->
		<div class="breadcrumb_section bg_gray page-title-mini">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="page-title">
							<h1><?= $post['posts_title'] ?></h1>
						</div>
					</div>
					<div class="col-md-6">
						<ol class="breadcrumb justify-content-md-end">
							<li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="<?= site_url('shop') ?>">Shop</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!-- END SECTION BREADCRUMB -->

		<!-- START MAIN CONTENT -->
		<div class="main_content">
			<!-- START SECTION SHOP -->
			<div class="section">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 mb-4 mb-md-0">
							<div class="product-image vertical_gallery">
								<div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
									<div class="item">
										<a href="#" class="product_gallery_item active" data-image="<?= base_url(getenv('uploads') . $post['posts_cover']) ?>" data-zoom-image="<?= base_url(getenv('uploads') . $post['posts_cover']) ?>">
											<img src="<?= site_url('themes/shopping') ?>/assets/load.gif" data-src="<?= base_url(getenv('uploads') . $post['posts_cover']) ?>" alt="product_small_img1" class="lazy">
										</a>
									</div>
									<?php if ($post['galleries']) {
										foreach ($post['galleries'] as $gallery) { ?>
											<div class="item">
												<a href="#" class="product_gallery_item" data-image="<?= base_url(getenv('uploads') . $gallery['products_gallery_image']) ?>" data-zoom-image="<?= base_url(getenv('uploads') . $gallery['products_gallery_image']) ?>">
													<img src="<?= site_url('themes/shopping') ?>/assets/load.gif" data-src="<?= base_url(getenv('uploads') . $gallery['products_gallery_image']) ?>" alt="product_small_img2" class="lazy">
												</a>
											</div>
									<?php }
									} ?>
								</div>
								<div class="product_img_box">
									<img src="<?= site_url('themes/shopping') ?>/assets/load.gif" id="product_img" data-src='<?= base_url(getenv('uploads') . $post['posts_cover']) ?>' data-zoom-image="<?= base_url(getenv('uploads') . $post['posts_cover']) ?>" class="lazy" alt="<?= $post['posts_title'] ?>">
									<a href="#" class="product_img_zoom" title="Zoom">
										<span class="linearicons-zoom-in"></span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="pr_detail">
								<div class="product_description">
									<h4 class="product_title"><a href="#"><?= $post['posts_title'] ?></a></h4>
									<div class="product_price">
										<span class="price pPrice"><?= $pprice ?></span>
										<?= ($sPrice != $post['products_price']) ? '<del>' . pPrice($post['products_price']) . '</del>' : '' ?>
										<!-- <div class="on_sale">
											<span>35% Off</span>
										</div> -->
									</div>
									<div class="rating_wrap" style="<?= (count($post['comments']) == 0) ? 'display: none' : '' ?>">
										<div class="rating">
											<div class="product_rate" style="width:<?= $per * 20 ?>%"></div>
										</div>
										<span class="rating_num">(<?= count($post['comments']) ?>)</span>
									</div>
									<div class="pr_desc w-100">
										<p><?= $post['products_short_description'] ?></p>
									</div>
									<div class="product_sort_info">
										<ul>
											<li><i class="linearicons-shield-check"></i> Payment Security</li>
											<li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
											<li><i class="linearicons-bag-dollar"></i> Free fast worldwide delivery</li>
										</ul>
									</div>

									<?php if ($post['attributes']) {
										foreach ($post['attributes'] as $attribute) { ?>
											<?php if (strtolower($attribute['product_attributes_type']) == 'color') { ?>
												<div class="pr_switch_wrap">
													<span class="switch_lable"><?= $attribute['product_attributes_name'] ?>: <label id="<?= str_replace(' ', '--', 'p' . $attribute['product_attributes_name']) ?>"></label></span><br>
													<div class="product_color_switch" style="margin-top: 10px;">
														<?php if ($attribute['variables']) {
															foreach ($attribute['variables'] as $variable) {
																$ppp = (($variable['product_variables_price'] > 0) ? $variable['product_variables_price'] : $sPrice); ?>
																<span data-color="<?= $variable['product_variables_value'] ?>" onclick="addValue('<?= $variable['product_variables_value'] ?>', '#<?= str_replace(' ', '---', $attribute['product_attributes_name']) ?>', '<?= ($variable['product_variables_image'] != '' && $variable['product_variables_image'] != 'default.png') ? $variable['product_variables_image'] : $post['posts_cover'] ?>', '<?= $ppp ?>', '<?= pPrice($ppp) ?>', '#<?= str_replace(' ', '--', 'p' . $attribute['product_attributes_name']) ?>')"></span>
														<?php }
														} ?>
													</div>
												</div>
											<?php } elseif (strtolower($attribute['product_attributes_type']) == 'radio') { ?>

												<div class="pr_switch_wrap">
													<span class="switch_lable"><?= $attribute['product_attributes_name'] ?>: <label id="<?= str_replace(' ', '--', 'p' . $attribute['product_attributes_name']) ?>"></label></span><br>
													<div class="product_size_switch" style="margin-top: 10px;">
														<?php if ($attribute['variables']) {
															foreach ($attribute['variables'] as $variable) {
																$ppp = (($variable['product_variables_price'] > 0) ? $variable['product_variables_price'] : $sPrice); ?>
																<span style="height: 50px; min-width: 50px;" onclick="addValue('<?= $variable['product_variables_value'] ?>', '#<?= str_replace(' ', '---', $attribute['product_attributes_name']) ?>', '<?= ($variable['product_variables_image'] != '' && $variable['product_variables_image'] != 'default.png') ? $variable['product_variables_image'] : $post['posts_cover'] ?>', '<?= $ppp ?>', '<?= pPrice($ppp) ?>', '#<?= str_replace(' ', '--', 'p' . $attribute['product_attributes_name']) ?>')"><?= ($variable['product_variables_image'] != '' && $variable['product_variables_image'] != 'default.png') ? '<img class="lazy" data-src="' . base_url(getenv('uploads') . $variable['product_variables_image']) . '" style="width: 50px; max-height: 46px">' : '<label style="margin-top: 9px;">' . $variable['product_variables_value'] . '</label style="margin-top: 9px;">' ?></span>
														<?php }
														} ?>
													</div>
												</div>
											<?php } ?>
									<?php }
									} ?>

								</div>
								<hr>
								<form method="post" action="<?= site_url('shopping/add_to_cart/' . $post['posts_id']) ?>" class="add_To_Cart">
									<?php if ($post['attributes']) {
										foreach ($post['attributes'] as $attribute) { ?>
											<input type="hidden" name="<?= str_replace(' ', '---', $attribute['product_attributes_name']) ?>" id="<?= str_replace(' ', '---', $attribute['product_attributes_name']) ?>" value="">
									<?php }
									} ?>
									<input type="hidden" name="price" id="dPrice" value="">
									<input type="hidden" name="image" id="dImage" value="<?= $post['posts_cover'] ?>">
									<div class="cart_extra">
										<div class="cart-product-quantity">
											<div class="quantity">
												<input type="button" value="-" class="minus">
												<input type="text" name="quantity" value="1" min="1" title="Qty" class="qty" size="4" autocomplete="off">
												<input type="button" value="+" class="plus">
											</div>
										</div>
										<input type="hidden" name="post" value="<?= $post['posts_id'] ?>">
										<div class="cart_btn">
											<?php if ($this->session->userdata('user_id') > 0) { ?>
												<button class="btn btn-fill-out btn-addtocart" type="submit"><i class="icon-basket-loaded"></i> Add to cart</button>

												<a href="javascript:;" data-href="<?= site_url('shopping/add_to_wishlist/' . $post['posts_id']) ?>" title="Add to Wishlist" class="add_To_Wishlist add_wishlist"><i class="<?= ($post['wishlist'] < 1) ? 'icon-heart' : 'lni lni-heart-filled text-danger' ?>"></i></a>

											<?php } else { ?>

												<a href="javascript:;" onclick="login('<?= site_url('login') ?>','Please Login, For Add to Cart')" class="btn btn-fill-out btn-addtocart"><i class="icon-basket-loaded"></i> Add to cart</a>

												<a class="add_wishlist" href="javascript:;" onclick="login('<?= site_url('login') ?>', 'Please Login, For Add to Wishlist')"><i class="icon-heart"></i></a>
											<?php } ?>
										</div>
									</div>
								</form>
								<hr>
								<ul class="product-meta">
									<!-- <li>SKU: <a href="#"><?= $post['products_sku'] ?></a></li> -->
									<?php if ($post['categories']) {
										foreach ($post['categories'] as $category) { ?>
											<li>Category: <a href="<?= site_url('category/' . $category['categories_slug']) ?>"><?= $category['categories_name'] ?></a></li>
									<?php }
									} ?>
									<!-- <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li> -->
								</ul>

								<!-- <div class="product_share">
									<span>Share:</span>
									<ul class="social_icons">
										<li><a href="#"><i class="ion-social-facebook"></i></a></li>
										<li><a href="#"><i class="ion-social-twitter"></i></a></li>
										<li><a href="#"><i class="ion-social-googleplus"></i></a></li>
										<li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
										<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
									</ul>
								</div> -->
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="large_divider clearfix"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="tab-style3">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
									</li>
									<!-- <li class="nav-item">
										<a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
									</li> -->
									<li class="nav-item" style="<?= (count($post['comments']) == 0) ? 'display: none' : '' ?>">
										<a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews (<?= count($post['comments']) ?>)</a>
									</li>
								</ul>
								<div class="tab-content shop_info_tab">
									<div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
										<?php
										$desc = $post['products_description'];
										$descriptionArray = explode(PHP_EOL, $desc);
										foreach ($descriptionArray as $descArray) {
											echo '<p style="">' . $descArray . '</p>';
										}
										if ($post['specifications']) {
										?>
											<div class="row">
												<div class="col-md-6">
													<table class="table table-line">
														<tbody>
															<?php foreach ($post['specifications'] as $specification) { ?>
																<tr>
																	<td><?= $specification['product_specification_title'] ?></td>
																	<td><?= $specification['product_specification_description'] ?></td>
																</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
											</div>
										<?php } ?>
									</div>
									<div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
										<div class="comments pt-4">
											<h5 class="product_tab_title">(<?= count($post['comments']) ?>) Review For <span><?= $post['posts_title'] ?></span></h5>
											<ul class="list_none comment_list mt-4">
												<?php if ($post['comments']) {
													foreach ($post['comments'] as $comment) { ?>
														<li>
															<div class="comment_img">
																<img src="<?= site_url('themes/shopping') ?>/assets/load.gif" data-src="<?= site_url('themes/shopping') ?>/assets/images/user1.jpg" alt="user1" class="lazy">
															</div>
															<div class="comment_block">
																<div class="rating_wrap">
																	<div class="rating">
																		<div class="product_rate" style="width:<?= 20 * $comment['comments_rate'] ?>%"></div>
																	</div>
																</div>
																<p class="customer_meta">
																	<span class="review_author"><?= $comment['comments_name'] ?></span>
																	<span class="comment-date"><?= date('M d, Y', strtotime($comment['comments_created'])) ?></span>
																</p>
																<div class="description">
																	<p><?= $comment['comments_message'] ?></p>
																</div>
															</div>
														</li>
												<?php }
												} ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="small_divider"></div>
							<div class="divider"></div>
							<div class="medium_divider"></div>
						</div>
					</div>

					<?php if ($post['similars']) { ?>
						<div class="row">
							<div class="col-12">
								<div class="heading_s1">
									<h3>Related Products</h3>
								</div>
								<div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
									<?php
									if ($post['similars']) {
										foreach ($post['similars'] as $similar) {
											echo '<div class="item">' . product_widget($similar) . '</div>';
										}
									}
									?>
								</div>
							</div>
						</div>
					<?php } ?>
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


		<?php
		$script = '
			$(".star_rating span").click(function(){
				var star = $(this).data("value")
				$("#star_ratingg").val(star)
			});
			$(".add_To_Cart").submit(function(e) {
				e.preventDefault();
				var formData = new FormData(this);
				var quantity = $("#quantity").val();
				$.ajax({
					url : "' . base_url('shopping/add_to_cart/' . $post['posts_id']) . '",
					type: "POST",
					data : formData,
					processData: false,
					contentType: false,
					success:function(data){
						if(data == 1){
							$.get("' . base_url('shopping/cart') . '", function(data){
								$(".mini_cart_wrapper").html(data);
								$.getScript("' . base_url('themes/shopping/assets/js/shop.js') . '");
							});
							$.alert({
								title: "Success",
								closeIcon: true,
								type: "green",
								content: "' . $post['posts_title'] . ' has been added to cart successfully!",
							});
						}else if(data == 2){
							$.alert({
								title: "Warning",
								closeIcon: true,
								type: "orange",
								content: "Please choose the varient before adding to cart",
							});
						}else{
							$.alert({
								title: "Ohh No!",
								closeIcon: true,
								type: "red",
								content: "We found trouble adding your product to cart. Please try again!",
							});
						}
					},
					error: function(jqXHR, textStatus, errorThrown){
						$.alert({
							title: "Ohh No!",
							closeIcon: true,
							type: "red",
							content: "We found trouble adding your product to cart. Please try again!",
						});
					}
				});
			});
			';
		putScript($script);
		?>