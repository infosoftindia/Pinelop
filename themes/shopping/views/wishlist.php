

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Wishlist</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?=site_url()?>">Home</a></li>
                    <li class="breadcrumb-item active">Wishlist</li>
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
		<form action="#">
			<?php if($wishlists){ ?>
			<div class="row">
				<div class="col-12">
					<div class="table-responsive wishlist_table">
						<table class="table">
							<thead>
								<tr>
									<th class="product-thumbnail" width="5%">#</th>
									<th class="product-name" width="25%">Product</th>
									<th class="product-price" width="10%">Price</th>
									<th class="product-stock-status" width="15%">Stock Status</th>
									<th class="product-add-to-cart" width="25%">Add To Cart</th>
									<th class="product-remove" width="20%">Remove</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($wishlists as $wishlist){ ?>
								<tr>
									<td class="product-thumbnail"><a href="<?=site_url('product/'.$wishlist['posts_slug'])?>"><img src="<?=base_url(getenv('uploads').$wishlist['posts_cover'])?>" style="height: 80px; object-fit: contain;" alt="product1"></a></td>
									<td class="product-name" data-title="Product"><a href="<?=site_url('product/'.$wishlist['posts_slug'])?>"><?=$wishlist['posts_title']?></a></td>
									<td class="product-price" data-title="Price"><?=pPrice($wishlist['products_price'])?></td>
									<td class="product-stock-status" data-title="Stock Status"><span class="badge badge-pill badge-success">In Stock</span></td>
									<td class="product-add-to-cart"><a href="<?=base_url('shopping/add_to_cart_wishlist/'.$wishlist['wishlists_post'].'/'.$wishlist['wishlists_id'])?>" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> Add to Cart</a></td>
									<td class="product-remove" data-title="Remove"><a href="<?=base_url('shopping/remove_wishlist/'.$wishlist['wishlists_id'])?>"><i class="ti-close"></i></a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php } else {
				echo '<center style="font-size: 20px;" class="m-5 text-danger">Your wishlist is empty!</center>';
			} ?>
		</form>	
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