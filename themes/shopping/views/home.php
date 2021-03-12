<!-- START SECTION BANNER -->
<div class="banner_section slide_wrap shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
        <div class="carousel-inner">
            <?php $index = 1; if($sliders){ foreach($sliders as $slider){ ?>
			<div class="carousel-item <?=($index++ == 1)?'active':''?> background_bg" data-img-src="<?=base_url(getenv('uploads').$slider['sliders_image'])?>">
                <div class="banner_slide_content banner_content_inner">
                	<div class="container">
                    	<div class="row">
                            <div class="col-lg-6 col-md-8 col-sm-9 col-10">
                                <div class="banner_content2">
                                    <!--<h6 class="mb-2 mb-sm-3 staggered-animation text-uppercase" data-animation="fadeInDown" data-animation-delay="0.2s">New Tranding</h6>-->
                                    <h2 class="staggered-animation" data-animation="fadeInDown" data-animation-delay="0.3s"><?=$slider['sliders_title']?></h2>
                                    <p class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.4s"><?=$slider['sliders_description']?></p>
                                    <a class="btn btn-line-fill btn-radius staggered-animation text-uppercase" href="<?=site_url('shop')?>" data-animation="fadeInUp" data-animation-delay="0.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php } } ?>
        </div>
        <ol class="carousel-indicators indicators_style2">
		<?php $index = 0; if($sliders){ foreach($sliders as $slider){ ?>
            <li data-target="#carouselExampleControls" data-slide-to="<?=$index++?>" class="<?=($index == 1)?'active':''?>"></li>
			<?php } } ?>
        </ol>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- END MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHIPPING INFO -->
<div class="section small_pb">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 col-sm-6">	
                <div class="icon_box icon_box_style3">
                    <div class="icon">
                        <i class="flaticon-shipped"></i>
                    </div>
                    <div class="icon_box_content">
                        <h6>Fast Delivery</h6>
                        <p>Worldwide</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">	
                <div class="icon_box icon_box_style3">
                    <div class="icon">
                        <i class="flaticon-money-back"></i>
                    </div>
                    <div class="icon_box_content">
                        <h6>Money Returns</h6>
                        <p>10 Days money return</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">	
                <div class="icon_box icon_box_style3">
                    <div class="icon">
                        <i class="flaticon-support"></i>
                    </div>
                    <div class="icon_box_content">
                        <h6>27/4 Online Support</h6>
                        <p>Customer Support</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">	
                <div class="icon_box icon_box_style3">
                    <div class="icon">
                        <i class="flaticon-lock"></i>
                    </div>
                    <div class="icon_box_content">
                        <h6>Payment Security</h6>
                        <p>Safe Payment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SHIPPING INFO -->



<!-- START SECTION SHOP -->
<!--<div class="section small_pt small_pb">
	<div class="container">
    	<div class="row justify-content-center">
			<div class="col-md-6">
                <div class="heading_s3 text-center">
                    <h2>Hot Categories</h2>
                </div>
                <div class="small_divider clearfix"></div>
            </div>
		</div>
        <div class="row">
            <div class="col-md-12">
            	<div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
					 <?php //if($parent_cat){
						// foreach($parent_cat as $category){
							// echo '<div class="item">'.category_grid($category).'</div>';
						// }
					//} ?>
                </div>
            </div>
		</div>
    </div>
</div>
-->


<!-- START SECTION CATEGORIES -->
<div class="section small_pt pb_20">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
                <div class="heading_s3 text-center">
                    <h2>Categories</h2>
                </div>
                <div class="small_divider clearfix"></div>
            </div>
		</div>
        <div class="row">
        	<div class="col-md-12">
            	<div class="product_slider carousel_slider owl-carousel owl-theme nav_style4" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
					<?php if($parent_cat){
						foreach($parent_cat as $category){
							echo '<div class="item">'.category_grid($category).'</div>';
						}
					}?>
                    
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- END SECTION CATEGORIES -->

<!-- START SECTION BANNER --> 
<?php if($bestOffers) { ?>
<div class="section pb_20 small_pt">
	<div class="container px-2">
    	<div class="row no-gutters">
			<?php foreach($bestOffers as $bestOffer) { ?>
        	<div class="col-md-4">
            	<div class="sale_banner">
                	<a class="hover_effect1" href="<?=base_url('best-offers/'.$bestOffer['products_best_offers_id'])?>">
                		<img src="<?=base_url(getenv('uploads').$bestOffer['products_best_offers_image'])?>" alt="<?=$bestOffer['products_best_offers_title']?>">
						<h6 class="product_title text-center pt-3"><a href="<?=base_url('best-offers/'.$bestOffer['products_best_offers_id'])?>"><?=$bestOffer['products_best_offers_title']?></a></h6>
                    </a>
                </div>
            </div>
			<?php } ?>
        </div>
    </div>
</div>
<?php } ?>
<!-- END SECTION BANNER --> 

<!-- START SECTION SHOP -->
<div class="section small_pt pb_20">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
                <div class="heading_s3 text-center">
                    <h2>Daily Deals</h2>
                </div>
                <div class="small_divider clearfix"></div>
            </div>
		</div>
        <div class="row">
        	<div class="col-md-12">
            	<div class="product_slider carousel_slider owl-carousel owl-theme nav_style4" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
				<?php
					if($dailyDeals){
						foreach($dailyDeals as $product){
							echo '<div class="item">'.product_widget($product['posts_id']).'</div>';
						}
					}
				?>
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- END SECTION SHOP -->


<!-- START SECTION BANNER --> 
<?php if($featuredCategories) { ?>
<div class="section pb_20 small_pt">
	<div class="container">
    	<div class="row">
			<?php foreach($featuredCategories as $featuredCat) { ?>
        	<div class="col-md-6">
            	<div class="single_banner">
                	<img src="<?=base_url(getenv('uploads').($featuredCat['categories_icon']))?>" alt="furniture_banner1" style="height: 300px; object-fit: cover;">
                    <div class="fb_info">
                        <h5 class="single_bn_title1">Featured</h5>
                        <h3 class="single_bn_title"><?=$category['categories_name']?></h3>
                        <a href="<?=site_url('category/'.$featuredCat['categories_slug'])?>" class="single_bn_link">Shop Now</a>
                    </div>
                </div>
            </div>
			<?php } ?>
        </div>
    </div>
</div>
<?php } ?>
<!-- END SECTION BANNER -->


<!-- START SECTION SHOP -->
<div class="section small_pt pb_20">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
                <div class="heading_s3 text-center">
                    <h2>Exclusive Products</h2>
                </div>
                <div class="small_divider clearfix"></div>
            </div>
		</div>
        <div class="row shop_container">
				<?php
					if($products){
						foreach($products as $product){
							echo '<div class="col-lg-3 col-md-4 col-6">'.product_grid($product['posts_id']).'</div>';
						}
					}
				?>
		
		
		
            <div class="col-lg-3 col-md-4 col-6">
                <div class="product_box text-center">
                    <div class="product_img">
                        <a href="shop-product-detail.html">
                            <img src="<?=site_url('themes/shopping/assets/')?>images/furniture_img6.jpg" alt="furniture_img6">
                        </a>
                        <div class="product_action_box">
                            <ul class="list_none pr_action_btn">
                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                <li><a href="#"><i class="icon-heart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_info">
                        <h6 class="product_title"><a href="shop-product-detail.html">randomised humour words</a></h6>
                        <div class="product_price">
                            <span class="price">$55.00</span>
                            <del>$95.00</del>
                        </div>
                        <div class="rating_wrap">
                            <div class="rating">
                                <div class="product_rate" style="width:68%"></div>
                            </div>
                            <span class="rating_num">(15)</span>
                        </div>
                        <div class="pr_desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                        </div>
                        <div class="add-to-cart">
                        	<a href="#" class="btn btn-fill-out btn-radius"><i class="icon-basket-loaded"></i> Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="product_box text-center">
                    <div class="product_img">
                        <a href="shop-product-detail.html">
                            <img src="<?=site_url('themes/shopping/assets/')?>images/furniture_img7.jpg" alt="furniture_img7">
                        </a>
                        <div class="product_action_box">
                            <ul class="list_none pr_action_btn">
                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                <li><a href="#"><i class="icon-heart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_info">
                        <h6 class="product_title"><a href="shop-product-detail.html">expedita distinctio rerum</a></h6>
                        <div class="product_price">
                            <span class="price">$68.00</span>
                            <del>$99.00</del>
                        </div>
                        <div class="rating_wrap">
                            <div class="rating">
                                <div class="product_rate" style="width:87%"></div>
                            </div>
                            <span class="rating_num">(25)</span>
                        </div>
                        <div class="pr_desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                        </div>
                        <div class="add-to-cart">
                        	<a href="#" class="btn btn-fill-out btn-radius"><i class="icon-basket-loaded"></i> Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="product_box text-center">
                    <div class="product_img">
                        <a href="shop-product-detail.html">
                            <img src="<?=site_url('themes/shopping/assets/')?>images/furniture_img8.jpg" alt="furniture_img8">
                        </a>
                        <div class="product_action_box">
                            <ul class="list_none pr_action_btn">
                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                <li><a href="#"><i class="icon-heart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_info">
                        <h6 class="product_title"><a href="shop-product-detail.html">Itaque earum rerum</a></h6>
                        <div class="product_price">
                            <span class="price">$69.00</span>
                            <del>$89.00</del>
                            <div class="on_sale">
                                <span>20% Off</span>
                            </div>
                        </div>
                        <div class="rating_wrap">
                            <div class="rating">
                                <div class="product_rate" style="width:70%"></div>
                            </div>
                            <span class="rating_num">(22)</span>
                        </div>
                        <div class="pr_desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                        </div>
                        <div class="add-to-cart">
                        	<a href="#" class="btn btn-fill-out btn-radius"><i class="icon-basket-loaded"></i> Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION CLIENT LOGO -->
<?php if($brands) { ?>
<div class="section small_pt">
	<div class="container">
        <div class="row">
        	<div class="col-12">
            	<div class="client_logo carousel_slider owl-carousel owl-theme" data-dots="false" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}}'>
                	<?php foreach($brands as $brand) { ?>
					<div class="item">
                    	<div class="cl_logo">
                        	<a href="<?=$brand['brands_url']?>" target="_new"><img src="<?=base_url(getenv('uploads').($brand['brands_image']))?>" alt="cl_logo"></a>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CLIENT LOGO -->
<?php } ?>
</div>