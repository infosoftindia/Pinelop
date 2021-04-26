<a class="nav-link cart_trigger" href="<?= site_url('cart') ?>" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count"><?= count($carts) ?></span></a>
<?php if ($carts) { ?>
	<div class="cart_box dropdown-menu dropdown-menu-right">
		<ul class="cart_list">
			<?php foreach ($carts as $cart) { ?>
				<?php
				$totalCart = 0;
				$price = $cart['products_price'];
				$salePrice = $cart['products_sale_price'];
				if ($salePrice != '0' && $salePrice != '' && $salePrice < $price) {
					$sPrice = $salePrice;
				} else {
					$sPrice = $price;
				}
				if ($cart['variable']['cart_variables_price'] > 0) {
					$sPrice = $cart['variable']['cart_variables_price'];
				}
				$totalCart += $sPrice * $cart['carts_quantity'];
				?>
				<li>
					<a data-href="<?= base_url('shopping/remove_cart/' . $cart['carts_id']) ?>" class="item_remove remove_Cart"><i class="ion-close"></i></a>
					<a href="<?= site_url('product/' . $cart['posts_slug']) ?>">
						<img src="<?= base_url(getenv('uploads') . $cart['carts_image']) ?>" alt="cart_thumb1">
						<?= $cart['posts_title'] ?><br>
						<?php if ($cart['variable']) {
							foreach ($cart['variable'] as $variable) { ?>
								<small class="ml-3"><?= '<i>' . $variable['product_attributes_name'] . '</i>: ' . $variable['cart_variables_value']  ?></small><br>
						<?php }
						} ?>
					</a>
					<span class="cart_quantity"> <?= $cart['carts_quantity'] ?> x <span class="cart_amount"> </span><?= pPrice($sPrice) ?></span>
				</li>
			<?php } ?>
		</ul>
		<div class="cart_footer">
			<!-- <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> </span><?= pPrice($totalCart) ?></p> -->
			<p class="cart_buttons"><a href="<?= site_url('cart') ?>" class="btn btn-fill-line btn-radius view-cart">View Cart</a>
				<a href="<?= site_url('checkout') ?>" class="btn btn-fill-out btn-radius checkout">Checkout</a>
			</p>
		</div>
	</div>
<?php } ?>