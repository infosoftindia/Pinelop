<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title><?=$title?> | Bulk Order B2B Shopping</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    <!-- GOOGLE WEB FONT -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
	<?=$css?>

</head>

<body>	
	<div id="page">		
		<header class="version_1">
			<div class="layer"></div>
			<div class="main_header">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
							<div id="logo">
								<a href="<?=site_url()?>"><img src="<?=base_url('themes/shopping/assets/')?>img/logo.svg" alt="" width="100" height="35"></a>
							</div>
						</div>
						<nav class="col-xl-6 col-lg-7">
							<a class="open_close" href="javascript:void(0);">
								<div class="hamburger hamburger--spin">
									<div class="hamburger-box">
										<div class="hamburger-inner"></div>
									</div>
								</div>
							</a>
							<div class="main-menu">
								<div id="header_menu">
									<a href="<?=site_url()?>"><img src="<?=base_url('themes/shopping/assets/')?>img/logo_black.svg" alt="" width="100" height="35"></a>
									<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
								</div>
								<ul>
									<li><a href="<?=site_url()?>">Home</a></li>
									<li><a href="<?=site_url('about')?>">About Us</a></li>
									<li><a href="<?=site_url('categories')?>">Categories</a></li>
									<li><a href="<?=site_url('shop')?>">Shop</a></li>
									<li><a href="<?=site_url('blogs')?>">Blogs</a></li>
									<li><a href="<?=site_url('contact-us')?>">Contact Us</a></li>
								</ul>
							</div>
						</nav>
						<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
							<a class="phone_top" href="tel://<?=getenv('mobile')?>"><strong><span>Need Help?</span><?=getenv('mobile')?></strong></a>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
			<!-- /main_header -->

			<div class="main_nav Sticky">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 col-md-3">
							<nav class="categories">
								<ul class="clearfix">
									<li><span>
											<a href="#">
												<span class="hamburger hamburger--spin">
													<span class="hamburger-box">
														<span class="hamburger-inner"></span>
													</span>
												</span>
												Categories
											</a>
										</span>
										<div id="menu">
											<ul>
												<?php if($parent_cat) { foreach($parent_cat as $category) { $subcats = categoriesByType($category['categories_id']); ?>
													<li>
														<span><a href="<?=site_url('products/'.$category['categories_id'])?>"><?=$category['categories_name']?></a></span>
														<?php if($subcats) { ?>
															<ul>
																<?php  foreach ($subcats as $subcat) { ?>
																	<li><a href=""><?=$subcat['categories_name']?></a></li>
																<?php } ?>
															</ul>
														<?php } ?>
													</li>
												<?php } } ?>
												<li><span><a href="#">Customize</a></span>
													<ul>
														<li><a href="listing-row-1-sidebar-left.html">For Men</a></li>
														<li><a href="listing-row-2-sidebar-right.html">For Women</a></li>
														<li><a href="listing-row-4-sidebar-extended.html">For Boys</a></li>
														<li><a href="listing-grid-1-full.html">For Girls</a></li>
													</ul>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</nav>
						</div>
						<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
							<div class="custom-search-input">
								<input type="text" placeholder="Search over 10.000 products">
								<button type="submit"><i class="header-icon_search_custom"></i></button>
							</div>
						</div>
						<div class="col-xl-3 col-lg-2 col-md-3">
							<ul class="top_tools">
								<li>
									<div class="dropdown dropdown-cart">
										<a href="<?=site_url('cart')?>" class="cart_bt"><strong>2</strong></a>
										<div class="dropdown-menu">
											<ul>
												<li>
													<a href="product-detail-1.html">
														<figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
														<strong><span>1x Armor Air x Fear</span>$90.00</strong>
													</a>
													<a href="#0" class="action"><i class="ti-trash"></i></a>
												</li>
												<li>
													<a href="product-detail-1.html">
														<figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
														<strong><span>1x Armor Okwahn II</span>$110.00</strong>
													</a>
													<a href="0" class="action"><i class="ti-trash"></i></a>
												</li>
											</ul>
											<div class="total_drop">
												<div class="clearfix"><strong>Total</strong><span>$200.00</span></div>
												<a href="<?=site_url('cart')?>" class="btn_1 outline">View Cart</a><a href="checkout.html" class="btn_1">Checkout</a>
											</div>
										</div>
									</div>
									<!-- /dropdown-cart-->
								</li>
								<li>
									<a href="<?=site_url('wishlist')?>" class="wishlist"><span>Wishlist</span></a>
								</li>
								<li>
									<div class="dropdown dropdown-access">
										<a href="account.html" class="access_link"><span>Account</span></a>
										<div class="dropdown-menu">
											<a href="<?=site_url('login')?>" class="btn_1">Sign In or Sign Up</a>
											<ul>
												<li>
													<a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
												</li>
												<li>
													<a href="account.html"><i class="ti-package"></i>My Orders</a>
												</li>
												<li>
													<a href="account.html"><i class="ti-user"></i>My Profile</a>
												</li>
												<li>
													<a href="help.html"><i class="ti-help-alt"></i>Help and Faq</a>
												</li>
											</ul>
										</div>
									</div>
									<!-- /dropdown-access-->
								</li>
								<li>
									<a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
								</li>
								<li>
									<a href="#menu" class="btn_cat_mob">
										<div class="hamburger hamburger--spin" id="hamburger">
											<div class="hamburger-box">
												<div class="hamburger-inner"></div>
											</div>
										</div>
										Categories
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /row -->
				</div>
				<div class="search_mob_wp">
					<input type="text" class="form-control" placeholder="Search over 10.000 products">
					<input type="submit" class="btn_1 full-width" value="Search">
				</div>
				<!-- /search_mobile -->
			</div>
			<!-- /main_nav -->
		</header>
		<!-- /header -->