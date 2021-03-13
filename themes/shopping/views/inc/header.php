<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

    <!-- SITE TITLE -->
    <title><?= $title ?> | Shopping Cart</title>
    <?= $css ?>

</head>

<body>

    <!--
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>-->
    <!-- END LOADER -->

    <!-- START HEADER -->
    <header class="header_wrap fixed-top header_with_topbar">
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                            <div class="mr-4">
                                <select name="currency_list" class="currency_list" style="border: 0px">
                                    <?php if ($currencies) {
                                        foreach ($currencies as $currency) { ?>
                                            <option value='<?= $currency['settings_key'] ?>' <?= $this->session->userdata('set_currency') == $currency['settings_key'] ? 'selected' : '' ?>><?= $currency['settings_key'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                            <ul class="contact_detail text-center text-lg-left mr-3">
                                <li><i class="ti-email"></i><span><a href="mailto:<?= getenv('email') ?>"><?= getenv('email') ?></a></span></li>
                            </ul>
                            <?php if (getenv('mobile') != null && is_numeric(str_replace(['(', ')', '+', '-', ' '], '', getenv('mobile')))) { ?>
                                <ul class="contact_detail text-center text-lg-left">
                                    <li><i class="ti-mobile"></i><span><a href="tel:<?= getenv('mobile') ?>"><?= getenv('mobile') ?></a></span></li>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center text-md-right">
                            <ul class="header_list">
                                <!--<li><a href="compare.html"><i class="ti-control-shuffle"></i><span>Compare</span></a></li>-->
                                <li><a href="<?= site_url('wishlist') ?>"><i class="ti-heart"></i><span>Wishlist</span></a></li>
                                <?php if (!$this->session->userdata('user_id')) { ?>
                                    <li><a href="<?= site_url('login') ?>"><i class="ti-user"></i><span>Login</span></a></li>
                                    <li><a href="<?= site_url('register') ?>"><i class="ti-user"></i><span>Register</span></a></li>
                                <?php } else { ?>
                                    <li><a href="<?= site_url('shopping/logout') ?>"><i class="ti-lock"></i><span>Logout</span></a></li>
                                    <li><a href="<?= site_url('account') ?>"><i class="ti-id-badge"></i><span>My Account</span></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom_header dark_skin main_menu_uppercase">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="<?= site_url() ?>">
                        <img class="logo_light" src="<?= site_url('themes/shopping/assets/') ?>images/logo_light.png" alt="logo">
                        <img class="logo_dark" src="<?= site_url('themes/shopping/assets/') ?>images/logo_dark.png" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
                        <span class="ion-android-menu"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="dropdown">
                                <a class="nav-link <?= (current_url() == site_url()) ? 'active' : '' ?>" href="<?= site_url() ?>">Home</a>
                            </li>
                            <li class="dropdown">
                                <a class="nav-link <?= (current_url() == site_url('about')) ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle nav-link <?= (current_url() == site_url('categories')) ? 'active' : '' ?>" href="#" data-toggle="dropdown">Categories</a>
                                <div class="dropdown-menu" style="width: 520px;">
                                    <ul class="mega-menu d-lg-flex">
                                        <li class="mega-menu-col col-lg-12">
                                            <ul class="d-lg-flex">
                                                <?php if ($categories) {  ?>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <?php for ($cat = 0; $cat < 5; $cat++) { ?>
                                                                <li><a class="dropdown-item nav-link nav_item" href="<?= site_url('category/' . $categories[$cat]['categories_slug']) ?>"><?= $categories[$cat]['categories_name'] ?></a></li>
                                                            <?php } ?>
                                                            <li><a class="dropdown-item nav-link nav_item text-primary" href="<?= site_url('categories') ?>">View all Categories</a></li>
                                                        </ul>
                                                    </li>
                                                <?php } ?>

                                                <li class="mega-menu-col col-lg-6">
                                                    <ul>
                                                        <?php for ($cat = 5; $cat < count($categories); $cat++) { ?>
                                                            <li><a class="dropdown-item nav-link nav_item" href="<?= site_url('category/' . $categories[$cat]['categories_slug']) ?>"><?= $categories[$cat]['categories_name'] ?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="nav-link <?= (current_url() == site_url('shop')) ? 'active' : '' ?>" href="<?= site_url('shop') ?>">Shop</a>
                            </li>

                            <li class="dropdown">
                                <a class="nav-link <?= (current_url() == site_url('daily-deals')) ? 'active' : '' ?>" href="<?= site_url('daily-deals') ?>">Daily Deals</a>
                            </li>

                            <li class="dropdown">
                                <a class="nav-link <?= (current_url() == site_url('best-offers')) ? 'active' : '' ?>" href="<?= site_url('best-offers') ?>">Best Offers</a>
                            </li>


                            <!--<li class="dropdown dropdown-mega-menu">
                            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Products</a>
                            <div class="dropdown-menu">
                                <ul class="mega-menu d-lg-flex">
									<li class="mega-menu-col col-lg-3">
										<ul> 
											<li class="dropdown-header">Woman's</li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-list-left-sidebar.html">Vestibulum sed</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-left-sidebar.html">Donec porttitor</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-right-sidebar.html">Donec vitae facilisis</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-list.html">Curabitur tempus</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-load-more.html">Vivamus in tortor</a></li>
										</ul>
									</li>
									<li class="mega-menu-col col-lg-3">
										<ul>
											<li class="dropdown-header">Men's</li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-cart.html">Donec vitae ante ante</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="checkout.html">Etiam ac rutrum</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="wishlist.html">Quisque condimentum</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="compare.html">Curabitur laoreet</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="order-completed.html">Vivamus in tortor</a></li>
										</ul>
									</li>
									<li class="mega-menu-col col-lg-3">
										<ul>
											<li class="dropdown-header">Kid's</li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.html">Donec vitae facilisis</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-left-sidebar.html">Quisque condimentum</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-right-sidebar.html">Etiam ac rutrum</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec vitae ante ante</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec porttitor</a></li>
										</ul>
									</li>
									<li class="mega-menu-col col-lg-3">
										<ul>
											<li class="dropdown-header">Accessories</li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.html">Donec vitae facilisis</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-left-sidebar.html">Quisque condimentum</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-right-sidebar.html">Etiam ac rutrum</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec vitae ante ante</a></li>
											<li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec porttitor</a></li>
										</ul>
									</li>
								</ul>
                            </div>
                        </li>-->

                            <li><a class="nav-link nav_item <?= (current_url() == site_url('contact-us')) ? 'active' : '' ?>" href="<?= site_url('contact-us') ?>">Contact Us</a></li>
                        </ul>
                    </div>

                    <ul class="navbar-nav attr-nav align-items-center">
                        <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                            <div class="search_wrap">
                                <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                                <form>
                                    <input type="text" placeholder="Search" class="form-control" id="search_input">
                                    <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                                </form>
                            </div>
                            <div class="search_overlay"></div>
                            <div class="search_overlay"></div>
                        </li>
                        <li class="dropdown cart_dropdown mini_cart_wrapper"><?= $cart ?></li>
                    </ul>

                </nav>
            </div>
        </div>
    </header>
    <!-- END HEADER -->