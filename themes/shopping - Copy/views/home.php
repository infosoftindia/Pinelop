	
	
	<main>
		<div id="carousel-home">
			<div class="owl-carousel owl-theme">
				<?php if($sliders){ foreach($sliders as $slider){ ?>
					<div class="owl-slide cover" style="background-image: url(<?=base_url(getenv('uploads').$slider['sliders_image'])?>);">
						<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
							<div class="container">
								<div class="row justify-content-center justify-content-md-end">
									<div class="col-lg-6 static">
										<div class="slide-text text-right white">
											<h2 class="owl-slide-animated owl-slide-title"><?=$slider['sliders_title']?></h2>
											<p class="owl-slide-animated owl-slide-subtitle">
												<?=$slider['sliders_description']?>
											</p>
											<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } } ?>
			</div>
			<div id="icon_drag_mobile"></div>
		</div>
		<!--/carousel-->

		<ul id="banners_grid" class="clearfix">
			<li>
				<a href="#" class="img_container">
					<img src="img/banners_cat_placeholder.jpg" data-src="img/banner_1.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<i class="ti-shopping-cart mb-2" style="font-size:55px;"></i>
						<h3>30+ Retailers</h3>
						<!--<div><span class="btn_1">Shop Now</span></div>-->
					</div>
				</a>
			</li>
			<li>
				<a href="#" class="img_container">
					<img src="img/banners_cat_placeholder.jpg" data-src="img/banner_2.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<i class="ti-credit-card mb-2" style="font-size:55px;"></i>
						<h3>Credit Up To 2 Lakh</h3>
						<!--<div><span class="btn_1">Shop Now</span></div>-->
					</div>
				</a>
			</li>
			<li>
				<a href="#" class="img_container">
					<img src="img/banners_cat_placeholder.jpg" data-src="img/banner_3.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<i class="ti-user mb-2" style="font-size:55px;"></i>
						<h3>Products From 10k Sallers</h3>
						<!--<div><span class="btn_1">Shop Now</span></div>-->
					</div>
				</a>
			</li>
		</ul>
		<!--/banners_grid -->
		
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Hot Categories</h2>
				<span>MY MARKET</span>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
				<?php if($parent_cat){
						foreach($parent_cat as $category){
							echo '<div class="item">'.category_grid($category).'</div>';
						}
					}
				?>
			</div>
		</div>
		<!-- /container -->
		

		<div class="featured lazy" data-bg="url(<?=base_url('themes/shopping/assets/')?>img/1.jpg)">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container margin_60">
					<div class="row justify-content-center justify-content-md-start">
						<div class="col-lg-6 wow" data-wow-offset="150">
							<h3>Armor<br>Air Color 720</h3>
							<p>Lightweight cushioning and durable support with a Phylon midsole</p>
							<div class="feat_text_block">
								<div class="price_box">
									<span class="new_price">$90.00</span>
									<span class="old_price">$170.00</span>
								</div>
								<a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /featured -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Latest Products</h2>
				<span>Products</span>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
			</div>
			
			<div class="row small-gutters">
				<?php
					if($products){
						foreach($products as $product){
							echo '<div class="col-6 col-md-4 col-xl-3">'.product_grid($product['posts_id']).'</div>';
						}
					}
				?>				
			</div>
		</div>
		<!-- /container -->
		
		<div class="bg_gray">
			<div class="container margin_30">
				<div id="brands" class="owl-carousel owl-theme">
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_1.png" alt="" class="owl-lazy"></a>
					</div>
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_2.png" alt="" class="owl-lazy"></a>
					</div>
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_3.png" alt="" class="owl-lazy"></a>
					</div>
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_4.png" alt="" class="owl-lazy"></a>
					</div>
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_5.png" alt="" class="owl-lazy"></a>
					</div>
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_6.png" alt="" class="owl-lazy"></a>
					</div>
				</div>
			</div>
		</div>
		<?php if($blogs) { ?>
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Latest News</h2>
				<span>Blog</span>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
			</div>
			<div class="row">
				<?php foreach($blogs as $blog) { ?>
				<div class="col-lg-6">
					<a class="box_news" href="<?=site_url('blog/'.$blog['posts_slug'])?>">
						<figure>
							<img src="<?=base_url(getenv('uploads').$blog['posts_cover'])?>" data-src="<?=base_url(getenv('uploads').$blog['posts_cover'])?>" alt="" width="400" height="266" class="lazy">
							<figcaption><strong><?=date('d',strtotime($blog['posts_created']))?></strong><?=date('M',strtotime($blog['posts_created']))?></figcaption>
						</figure>
						<ul>
							<li>by Admin</li>
							<li><?=date('M d, Y',strtotime($blog['posts_created']))?></li>
						</ul>
						<h4><?=$blog['posts_title']?></h4>
						<p><?=character_limiter($blog['blogs_description'],200)?>...</p>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	</main>