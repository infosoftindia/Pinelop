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
					<img src="<?= site_url('themes/shopping') ?>/assets/load.gif" class="lazy" id="product_img" data-src='<?= base_url(getenv('uploads') . $post['posts_cover']) ?>' data-zoom-image="<?= base_url(getenv('uploads') . $post['posts_cover']) ?>" alt="product_img1" />
				</div>
				<?php  //print_r($post)
				?>
				<div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
					<div class="item">
						<!-- <a href="#" class="product_gallery_item active" data-image="<?= base_url(getenv('uploads') . $post['posts_cover']) ?>" data-zoom-image="<?= site_url('themes/shopping/assets/') ?>images/product_zoom_img1.jpg">
							<img src="<?= base_url(getenv('uploads') . $post['posts_cover']) ?>" alt="product_small_img1" />
						</a> -->
						<a href="#" class="product_gallery_item" data-image="<?= base_url(getenv('uploads') . $post['posts_cover']) ?>" data-zoom-image="<?= base_url(getenv('uploads') . $post['posts_cover']) ?>">
							<img src="<?= site_url('themes/shopping') ?>/assets/load.gif" class="lazy" data-src="<?= base_url(getenv('uploads') . $post['posts_cover']) ?>" alt="product_small_img2">
						</a>
					</div>
					<?php if ($post['galleries']) {
						foreach ($post['galleries'] as $gallery) { ?>
							<div class="item">
								<a href="#" class="product_gallery_item" data-image="<?= base_url(getenv('uploads') . $gallery['products_gallery_image']) ?>" data-zoom-image="<?= base_url(getenv('uploads') . $gallery['products_gallery_image']) ?>">
									<img src="<?= site_url('themes/shopping') ?>/assets/load.gif" class="lazy" data-src="<?= base_url(getenv('uploads') . $gallery['products_gallery_image']) ?>" alt="product_small_img2">
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
										<span class="switch_lable"><?= $attribute['product_attributes_name'] ?></span>
										<div class="product_color_switch">
											<?php if ($attribute['variables']) {
												foreach ($attribute['variables'] as $variable) {
													$ppp = (($variable['product_variables_price'] > 0) ? $variable['product_variables_price'] : $sPrice); ?>
													<span data-color="<?= $variable['product_variables_value'] ?>" onclick="addValue('<?= $variable['product_variables_value'] ?>', '#<?= str_replace(' ', '---', $attribute['product_attributes_name']) ?>', '<?= ($variable['product_variables_image'] != '' && $variable['product_variables_image'] != 'default.png') ? $variable['product_variables_image'] : $post['posts_cover'] ?>', '<?= $ppp ?>', '<?= pPrice($ppp) ?>')"></span>
											<?php }
											} ?>
										</div>
									</div>
								<?php } elseif (strtolower($attribute['product_attributes_type']) == 'radio') { ?>

									<div class="pr_switch_wrap">
										<span class="switch_lable"><?= $attribute['product_attributes_name'] ?></span>
										<div class="product_size_switch">
											<?php if ($attribute['variables']) {
												foreach ($attribute['variables'] as $variable) {
													$ppp = (($variable['product_variables_price'] > 0) ? $variable['product_variables_price'] : $sPrice); ?>
													<span style="height: 50px; min-width: 50px;" onclick="addValue('<?= $variable['product_variables_value'] ?>', '#<?= str_replace(' ', '---', $attribute['product_attributes_name']) ?>', '<?= ($variable['product_variables_image'] != '' && $variable['product_variables_image'] != 'default.png') ? $variable['product_variables_image'] : $post['posts_cover'] ?>', '<?= $ppp ?>', '<?= pPrice($ppp) ?>')"><?= ($variable['product_variables_image'] != '' && $variable['product_variables_image'] != 'default.png') ? '<src="' . site_url('themes/shopping') . '/assets/load.gif" class="lazy" data-src="' . base_url(getenv('uploads') . $variable['product_variables_image']) . '" style="width: 50px; max-height: 46px">' : '<label style="margin-top: 9px;">' . $variable['product_variables_value'] . '</label style="margin-top: 9px;">' ?></span>
											<?php }
											} ?>
										</div>
									</div>
								<?php } ?>
						<?php }
						} ?>
					</div>
					<hr />
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
								<input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
								<input type="button" value="+" class="plus">
							</div>
						</div>
						<input type="hidden" name="post" value="<?= $post['posts_id'] ?>">
						<div class="cart_btn">
							<button class="btn btn-fill-out btn-addtocart" type="submit"><i class="icon-basket-loaded"></i> Add to cart</button>
							<a href="javascript:;" data-href="<?= site_url('shopping/add_to_wishlist/' . $post['posts_id']) ?>" title="Add to Wishlist" class="add_To_Wishlist add_wishlist"><i class="<?= ($post['wishlist'] < 1) ? 'icon-heart' : 'lni lni-heart-filled text-danger' ?>"></i></a>
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
<script src="<?= base_url('themes/shopping/assets/') ?>lazy.js"></script>
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
				} else if (data == 2) {
					$.alert({
						title: "Warning",
						closeIcon: true,
						type: "orange",
						content: "Please choose the variant before adding to cart",
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

	function saveValue(val, output) {
		$(output).val(val);
	}

	function addValue(val, output, image, price, pPrice) {
		$(output).val(val);
		// alert(image)
		if (image != '' && image != 'default.png') {
			$('#product_img').attr('src', '<?= base_url('uploads/') ?>' + image);
			$('#product_img').attr('data-zoom-image', '<?= base_url('uploads/') ?>' + image);
			$('#dImage').val(image);
			$('#dPrice').val(price);
			$('.pPrice').html(pPrice);
			$('.zoomWindow').css('background-image', 'url(<?= base_url('uploads/') ?>' + image + ')');
		}
	}
</script>
?>