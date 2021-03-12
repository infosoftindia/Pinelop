
								<?php
									$price = $product['products_price'];
									$salePrice = $product['products_sale_price'];
									if($salePrice != '0' && $salePrice != '' && $salePrice < $price){
										$sPrice = $salePrice;
									}else{
										$sPrice = $price;
									}
								?>
								<div class="col-lg-3">
									<div class="product_items">
										<article class="single_product" style="padding: 0 18px;">
											<figure>
												<div class="product_thumb">
													<a class="primary_img" href="<?=site_url('product/'.$product['posts_slug'])?>"><img src="<?=base_url(getenv('uploads').$product['posts_cover'])?>" alt=""></a>
												</div>
												<div class="product_content">
													<div class="product_name">
														<h4><a href="<?=site_url('product/'.$product['posts_slug'])?>"><?=$product['posts_title']?></a></h4>
													</div>
													<!--<div class="product_rating">
														<ul>
															<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
															<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
															<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
															<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
															<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
														</ul>
													</div>-->
													<div class="price_box"> 
														<?=($sPrice != $product['products_price'])?'<span class="old_price">'.pPrice($product['products_price']).'</span>':''?>
														<span class="current_price"><?=pPrice($sPrice)?></span>
													</div>
												</div>
											</figure>
										</article>
									</div>
								</div>
