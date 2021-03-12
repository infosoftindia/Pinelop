
										<?php
											$totalCart = 0;
											if($carts){
												foreach($carts as $cart){
													$price = $cart['products_price_per_mm'];
													$totalCart+=$price*$cart['carts_quantity']*$cart['carts_length'];
												}
											}
										?>
										<a href="<?=site_url('cart')?>">
											<span class="cart_icon">
												<i class="ion-android-cart"></i>
											</span>
											<span class="cart_title">
												<span class="cart_quantity"><?=count($carts)?> items </span>
												<span class="cart_price"><?=pPrice($totalCart)?></span>
											</span>
										</a>
										<?php if($carts){ ?>
										<!--mini cart-->
										<div class="mini_cart">
											<div class="mini_cart_inner">
												<?php foreach($carts as $cart){ ?>
												<div class="cart_item">
													<div class="cart_img">
														<a href="<?=site_url('product/'.$cart['posts_slug'])?>"><img src="<?=base_url(getenv('uploads').$cart['posts_cover'])?>" alt="<?=$cart['posts_title']?>"></a>
													</div>
													<?php
														$price = $cart['products_price'];
														$salePrice = $cart['products_sale_price'];
														if($salePrice != '0' && $salePrice != '' && $salePrice < $price){
															$sPrice = $salePrice;
														}else{
															$sPrice = $price;
														}
													?>
													<div class="cart_info">
														<a href="<?=site_url('product/'.$cart['posts_slug'])?>"><?=$cart['posts_title']?></a>
														<p>Qty: <?=$cart['carts_quantity']?> x <span> <?=pPrice($sPrice)?> </span></p>
													</div>
													<!--<div class="cart_remove">
														<a data-href="<?=base_url('shopping/remove_cart/'.$cart['carts_id'])?>" class="remove_Cart"><i class="ion-android-close"></i></a>
													</div>-->
												</div>
												<?php } ?>
												<!--<div class="mini_cart_table">
													<div class="cart_total mt-10">
														<span>Total:</span>
														<span class="price"><?=pPrice($totalCart)?></span>
													</div>
												</div>-->
											</div>
											<div class="mini_cart_footer">
												<div class="cart_button">
													<a href="<?=site_url('cart')?>">View cart</a>
												</div>
												<!--<div class="cart_button">
													<a href="<?=site_url('checkout')?>">Checkout</a>
												</div>-->
											</div>
										</div>
										<?php } ?>

