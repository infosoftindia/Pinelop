		
		<?php
			$price = $post['products_price'];
			$salePrice = $post['products_sale_price'];
			if($salePrice != '0' && $salePrice != '' && $salePrice < $price){
			$sPrice = $salePrice;
			}else{
			$sPrice = $price;
			}
			$prcP = $sPrice+((20/100)*$sPrice);
			$perMmPrice = $prcP/1000;
		?>
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
						<h1><?=$post['posts_title']?></h1>
					</div>
				</div>
				<img src="img/bg_cat_shoes.jpg" class="img-fluid" alt="">
			</div>
			<div class="container margin_30">
				<div class="row">
					<div class="col-md-6">
						<div class="all">
							<div class="slider">
								<div class="owl-carousel owl-theme main">
									<div style="background-image: url(<?=base_url(getenv('uploads').$post['posts_cover'])?>);" class="item-box"></div>
									<div style="background-image: url(img/products/shoes/2.jpg);" class="item-box"></div>
									<div style="background-image: url(img/products/shoes/3.jpg);" class="item-box"></div>
									<div style="background-image: url(img/products/shoes/4.jpg);" class="item-box"></div>
									<div style="background-image: url(img/products/shoes/5.jpg);" class="item-box"></div>
									<div style="background-image: url(img/products/shoes/6.jpg);" class="item-box"></div>
								</div>
								<div class="left nonl"><i class="ti-angle-left"></i></div>
								<div class="right"><i class="ti-angle-right"></i></div>
							</div>
							<div class="slider-two">
								<div class="owl-carousel owl-theme thumbs">
									<div style="background-image: url(<?=base_url(getenv('uploads').$post['posts_cover'])?>);" class="item active"></div>
									<div style="background-image: url(img/products/shoes/2.jpg);" class="item"></div>
									<div style="background-image: url(img/products/shoes/3.jpg);" class="item"></div>
									<div style="background-image: url(img/products/shoes/4.jpg);" class="item"></div>
									<div style="background-image: url(img/products/shoes/5.jpg);" class="item"></div>
									<div style="background-image: url(img/products/shoes/6.jpg);" class="item"></div>
								</div>
								<div class="left-t nonl-t"></div>
								<div class="right-t"></div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="breadcrumbs">
							<ul>
								<li><a href="<?=site_url()?>">Home</a></li>
								<li><a href="<?=site_url('shop')?>">Shop</a></li>
								<li><?=$post['posts_title']?></li>
							</ul>
						</div>
						<!-- /page_header -->
						<form action="" class="add_To_Cart">
							<div class="prod_info">
								<h1><?=$post['posts_title']?></h1>
								<span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span>
								<p><small>SKU: <?=$post['products_sku']?></small><br>Sed ex labitur adolescens scriptorem. Te saepe verear tibique sed. Et wisi ridens vix, lorem iudico blandit mel cu. Ex vel sint zril oportere, amet wisi aperiri te cum.</p>
								<div class="prod_options">
									<div class="row">
										<label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Category</strong></label>
										<div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
											<ul>
											<?php if($post['categories']){ foreach($post['categories'] as $category){ ?>
											<li><a href="<?=site_url('category/'.$category['categories_slug'])?>"><?=$category['categories_name']?></a></li>
											<?php } } ?>	
											</ul>
										</div>
									</div>
									<!--<div class="row">
										<label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-toggle="modal" data-target="#size-modal"><i class="ti-help-alt"></i></a></label>
										<div class="col-xl-4 col-lg-5 col-md-6 col-6">
											<div class="custom-select-form">
												<select class="wide">
													<option value="" selected>Small (S)</option>
													<option value="">M</option>
													<option value=" ">L</option>
													<option value=" ">XL</option>
												</select>
											</div>
										</div>
									</div>-->
									<div class="row">
										<label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
										<div class="col-xl-4 col-lg-5 col-md-6 col-6">
											<div class="numbers-row">
												<input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-5 col-md-6">
										<div class="price_main"><span class="new_price"><?=pPrice($sPrice)?></span> 
										
										<?=($sPrice != $post['products_price'])?'<span class="old_price">'.pPrice($post['products_price']).'</span>':''?>
										</div>
									</div>
									<div class="col-lg-4 col-md-6">
										<div class="btn_add_to_cart"><button type="submit" style="padding: 12px 50px;" class="btn_1">Add to Cart</button></div>
									</div>
								</div>
							</div>
						</form>
						<!-- /prod_info -->
						<div class="product_actions">
							<ul>
								<li>
									<a href="javascript:;" onclick="login('<?=site_url('login')?>')"><i class="ti-heart" ></i><span>Add to Wishlist</span></a>
								</li>
								<!--<li>
									<a href="#"><i class="ti-control-shuffle"></i><span>Add to Compare</span></a>
								</li>-->
							</ul>
						</div>
						<!-- /product_actions -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
			
			<div class="tabs_product">
				<div class="container">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Description</a>
						</li>
						<li class="nav-item">
							<a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Reviews</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- /tabs_product -->
			<div class="tab_content_wrapper">
				<div class="container">
					<div class="tab-content" role="tablist">
						<div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
							<div class="card-header" role="tab" id="heading-A">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
										Description
									</a>
								</h5>
							</div>
							<div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
								<div class="card-body">
									<div class="row justify-content-between">
										<div class="col-lg-6">
											<h3>Details</h3>
											<?php
											$desc = $post['products_description'];
											$descriptionArray = explode(PHP_EOL, $desc);
											foreach($descriptionArray as $descArray) {
											echo '<p style="">'.$descArray.'</p>';
											}
											?>
										</div>
										<div class="col-lg-5">
											<h3>Specifications</h3>
											<div class="table-responsive">
												<table class="table table-sm table-striped">
													<tbody>
														<tr>
															<td><strong>Color</strong></td>
															<td>Blue, Purple</td>
														</tr>
														<tr>
															<td><strong>Size</strong></td>
															<td>150x100x100</td>
														</tr>
														<tr>
															<td><strong>Weight</strong></td>
															<td>0.6kg</td>
														</tr>
														<tr>
															<td><strong>Manifacturer</strong></td>
															<td>Manifacturer</td>
														</tr>
													</tbody>
												</table>
											</div>
											<!-- /table-responsive -->
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /TAB A -->
						
						<div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
							<div class="card-header" role="tab" id="heading-B">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
										Reviews
									</a>
								</h5>
							</div>
						
							<div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
								<div class="card-body">
									<div class="row justify-content-between">
										<?php if($post['comments']){ foreach($post['comments'] as $comment){ ?>
											<div class="col-lg-6">
												<div class="review_content">
													<div class="clearfix add_bottom_10">
														<span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5/5</em></span>
														<em><?=date('M d, Y', strtotime($comment['comments_created']))?></em>
													</div>
													<h4><?=$comment['comments_name']?></h4>
													<p><?=$comment['comments_message']?></p>
												</div>
											</div>
										<?php } } ?>
									</div>
									
									<p class="text-right"><a href="leave-review.html" class="btn_1">Leave a review</a></p>
								</div>
								<!-- /card-body -->
							</div>
							
						</div>
						
						<!-- /tab B -->
					</div>
					<!-- /tab-content -->
				</div>
				<!-- /container -->
			</div>
			<!-- /tab_content_wrapper -->

			<div class="container margin_60_35">
				<div class="main_title">
					<h2>Related</h2>
					<span>Products</span>
					<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
				</div>
				<div class="owl-carousel owl-theme products_carousel">
					<div class="item">
						<div class="grid_item">
							<span class="ribbon new">New</span>
							<figure>
								<a href="product-detail-1.html">
									<img class="owl-lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="img/products/shoes/4.jpg" alt="">
								</a>
							</figure>
							<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
							<a href="product-detail-1.html">
								<h3>ACG React Terra</h3>
							</a>
							<div class="price_box">
								<span class="new_price">$110.00</span>
							</div>
							<ul>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
							</ul>
						</div>
						<!-- /grid_item -->
					</div>
					<!-- /item -->
					<div class="item">
						<div class="grid_item">
							<span class="ribbon new">New</span>
							<figure>
								<a href="product-detail-1.html">
									<img class="owl-lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="img/products/shoes/5.jpg" alt="">
								</a>
							</figure>
							<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
							<a href="product-detail-1.html">
								<h3>Air Zoom Alpha</h3>
							</a>
							<div class="price_box">
								<span class="new_price">$140.00</span>
							</div>
							<ul>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
							</ul>
						</div>
						<!-- /grid_item -->
					</div>
					<!-- /item -->
					<div class="item">
						<div class="grid_item">
							<span class="ribbon hot">Hot</span>
							<figure>
								<a href="product-detail-1.html">
									<img class="owl-lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="img/products/shoes/8.jpg" alt="">
								</a>
							</figure>
							<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
							<a href="product-detail-1.html">
								<h3>Air Color 720</h3>
							</a>
							<div class="price_box">
								<span class="new_price">$120.00</span>
							</div>
							<ul>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
							</ul>
						</div>
						<!-- /grid_item -->
					</div>
					<!-- /item -->
					<div class="item">
						<div class="grid_item">
							<span class="ribbon off">-30%</span>
							<figure>
								<a href="product-detail-1.html">
									<img class="owl-lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="img/products/shoes/2.jpg" alt="">
								</a>
							</figure>
							<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
							<a href="product-detail-1.html">
								<h3>Okwahn II</h3>
							</a>
							<div class="price_box">
								<span class="new_price">$90.00</span>
								<span class="old_price">$170.00</span>
							</div>
							<ul>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
							</ul>
						</div>
						<!-- /grid_item -->
					</div>
					<!-- /item -->
					<div class="item">
						<div class="grid_item">
							<span class="ribbon off">-50%</span>
							<figure>
								<a href="product-detail-1.html">
									<img class="owl-lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="img/products/shoes/3.jpg" alt="">
								</a>
							</figure>
							<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
							<a href="product-detail-1.html">
								<h3>Air Wildwood ACG</h3>
							</a>
							<div class="price_box">
								<span class="new_price">$75.00</span>
								<span class="old_price">$155.00</span>
							</div>
							<ul>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
							</ul>
						</div>
						<!-- /grid_item -->
					</div>
					<!-- /item -->
				</div>
				<!-- /products_carousel -->
			</div>
			<!-- /container -->

			<div class="feat">
				<div class="container">
					<ul>
						<li>
							<div class="box">
								<i class="ti-gift"></i>
								<div class="justify-content-center">
									<h3>Free Shipping</h3>
									<p>For all oders over $99</p>
								</div>
							</div>
						</li>
						<li>
							<div class="box">
								<i class="ti-wallet"></i>
								<div class="justify-content-center">
									<h3>Secure Payment</h3>
									<p>100% secure payment</p>
								</div>
							</div>
						</li>
						<li>
							<div class="box">
								<i class="ti-headphone-alt"></i>
								<div class="justify-content-center">
									<h3>24/7 Support</h3>
									<p>Online top support</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<!--/feat-->

		</main>