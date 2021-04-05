<?php
$price = $post['products_price'];
$salePrice = $post['products_sale_price'];
if ($salePrice != '0' && $salePrice != '' && $salePrice < $price) {
	$sPrice = $salePrice;
} else {
	$sPrice = $price;
}
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
<div class="ajax_quick_view">
	<div class="row">
		<div class="col-lg-6 col-md-6 mb-4 mb-md-0">
			<div class="product-image">
				<div class="product_img_box">
					<img id="product_img" src='<?= base_url(getenv('uploads') . $post['posts_cover']) ?>' data-zoom-image="<?= base_url(getenv('uploads') . $post['posts_cover']) ?>" alt="product_img1" />
				</div>
				<?php  //print_r($post)
				?>
				<div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
					<div class="item">
						<a href="#" class="product_gallery_item active" data-image="<?= base_url(getenv('uploads') . $post['posts_cover']) ?>" data-zoom-image="<?= site_url('themes/shopping/assets/') ?>images/product_zoom_img1.jpg">
							<img src="<?= base_url(getenv('uploads') . $post['posts_cover']) ?>" alt="product_small_img1" />
						</a>
					</div>
					<?php if ($post['galleries']) {
						foreach ($post['galleries'] as $gallery) { ?>
							<div class="item">
								<a href="#" class="product_gallery_item" data-image="<?= base_url(getenv('uploads') . $gallery['products_gallery_image']) ?>" data-zoom-image="<?= base_url(getenv('uploads') . $gallery['products_gallery_image']) ?>">
									<img src="<?= base_url(getenv('uploads') . $gallery['products_gallery_image']) ?>" alt="product_small_img2">
								</a>
							</div>
					<?php }
					} ?>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="pr_detail">
				<form method="post" action="<?= site_url('shopping/add_to_cart/' . $post['posts_id']) ?>" class="add_To_Cart">
					<div class="product_description">
						<h4 class="product_title"><a href="#"><?= $post['posts_title'] ?></a></h4>
						<div class="product_price">
							<span class="price"><?= pPrice($sPrice) ?></span>
							<?= ($sPrice != $post['products_price']) ? '<del>' . pPrice($post['products_price'], 1) . '</del>' : '' ?>
						</div>
						<div class="rating_wrap">
							<div class="rating">
								<div class="product_rate" style="width:<?= $per * 20 ?>%"></div>
							</div>
							<span class="rating_num">(<?= count($post['comments']) ?>)</span>
						</div>
						<div class="pr_desc">
							<p><?= $post['products_short_description'] ?></p>
						</div>
						<div class="product_sort_info">
							<ul>
								<li><i class="linearicons-shield-check"></i> Payment Security</li>
								<li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
								<li><i class="linearicons-bag-dollar"></i> Free fast worldwide delivery</li>
							</ul>
						</div>
						<!--
							<div class="pr_switch_wrap">
								<span class="switch_lable">Color</span>
								<div class="product_color_switch">
									<span class="active" data-color="#87554B"></span>
									<span data-color="#333333"></span>
									<span data-color="#DA323F"></span>
								</div>
							</div>
							<div class="pr_switch_wrap">
								<span class="switch_lable">Size</span>
								<div class="product_size_switch">
									<span>xs</span>
									<span>s</span>
									<span>m</span>
									<span>l</span>
									<span>xl</span>
								</div>
							</div>-->
					</div>
					<hr />
					<div class="cart_extra">
						<div class="cart-product-quantity">
							<div class="quantity">
								<input type="button" value="-" class="minus">
								<input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
								<input type="button" value="+" class="plus">
							</div>
						</div>
						<input type="hidden" name="post" value="<?= $post['posts_id'] ?>">
						<div class="cart_btn">
							<button class="btn btn-fill-out btn-addtocart" type="submit"><i class="icon-basket-loaded"></i> Add to cart</button>
							<a href="javascript:;" data-href="<?= site_url('shopping/add_to_wishlist/' . $post['posts_id']) ?>" title="Add to Wishlist" class="add_To_Wishlist add_wishlist"><i class="lni lni-heart"></i></a>
						</div>
					</div>
				</form>
				<hr />
				<ul class="product-meta">
					<!-- <li>SKU: <a href="#">BE45VGRT</a></li> -->
					<li>Category:
						<?php
						if ($post['categories']) {
							foreach ($post['categories'] as $cat) {
								echo '<a href="' . site_url('category/' . $cat['categories_slug']) . '">' . $cat['categories_name'] . '</a>';
							}
						}
						?>
					</li>
					<?php
					// $tags = explode(',', $post['products_tags']);
					// if (count($tags) > 0) {
					?>
					<!-- <li>Tags:
							<?php
							foreach ($tags as $tag) {
								echo '<a href="' . site_url('tags/' . $tag) . '">' . $tag . '</a>';
							}
							?>
						</li> -->
					<?php //} 
					?>
				</ul>
			</div>
		</div>
	</div>
</div>


<script src="<?= site_url('themes/shopping/assets/') ?>js/scripts.js"></script>
<script src="<?= site_url('themes/shopping/assets/') ?>js/shop.js"></script>
<script>
	$(".add_To_Cart").submit(function(e) {
		e.preventDefault();
		var formData = new FormData(this);
		var quantity = $("#quantity").val();
		$.ajax({
			url: "<?= base_url('shopping/add_to_cart/' . $post['posts_id']) ?>",
			type: "POST",
			data: formData,
			processData: false,
			contentType: false,
			success: function(data) {
				if (data == 1) {
					$.get("<?= base_url('shopping/cart') ?>", function(data) {
						$(".mini_cart_wrapper").html(data);
						$.getScript("<?= base_url('themes/shopping/assets/js/shop.js') ?>");
					});
					$.alert({
						title: "Success",
						closeIcon: true,
						type: "green",
						content: "<?= $post['posts_title'] ?> has been added to cart successfully!",
					});
				} else {
					$.alert({
						title: "Ohh No!",
						closeIcon: true,
						type: "red",
						content: "We found trouble adding your product to cart. Please try again!",
					});
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$.alert({
					title: "Ohh No!",
					closeIcon: true,
					type: "red",
					content: "We found trouble adding your product to cart. Please try again!",
				});
			}
		});
	});
</script>
?>