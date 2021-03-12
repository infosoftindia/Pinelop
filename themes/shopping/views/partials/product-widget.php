
								<?php
									$price = $product['products_price'];
									$salePrice = $product['products_sale_price'];
									if($salePrice != '0' && $salePrice != '' && $salePrice < $price){
										$sPrice = $salePrice;
									}else{
										$sPrice = $price;
									}
								?>
								<div class="product_box text-center">
									<div class="product_img">
										<a href="<?=site_url('product/'.$product['posts_slug'])?>">
											<img src="<?=base_url(getenv('uploads').$product['posts_cover'])?>" alt="<?=$product['posts_title']?>" style="height: 280px; object-fit: cover;">
										</a>
										<div class="product_action_box">
											<ul class="list_none pr_action_btn">
												<li><a href="<?=site_url('quick-view/'.$product['posts_slug'])?>" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
												<li>
												<a href="javascript:;" data-href="<?=site_url('shopping/add_to_wishlist/'.$product['posts_id'])?>" title="Add to Wishlist" class="add_To_Wishlist"><i class="lni lni-heart"></i></a>
												</li>
											</ul>
										</div>
									</div>
									<div class="product_info">
										<h6 class="product_title"><a href="<?=site_url('product/'.$product['posts_slug'])?>"><?=$product['posts_title']?></a></h6>
										<div class="product_price">
											<span class="price"><?=pPrice($sPrice)?></span>
											<?=($sPrice != $product['products_price'])?'<del>'.pPrice($product['products_price'], 1).'</del>':''?>
										</div>
										<div class="rating_wrap">
											<div class="rating">
												<div class="product_rate" style="width:80%"></div>
											</div>
											<span class="rating_num">(21)</span>
										</div>
										<div class="pr_desc">
											<p><?=$product['products_short_description']?></p>
										</div>
									</div>
								</div>
