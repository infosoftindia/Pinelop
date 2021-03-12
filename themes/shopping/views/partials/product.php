
				<?php
					$price = $product['products_price'];
					$salePrice = $product['products_sale_price'];
					if($salePrice != '0' && $salePrice != '' && $salePrice < $price){
						$sPrice = $salePrice;
					}else{
						$sPrice = $price;
					}
				?>
				
				<div class="product">
					<div class="product_img">
						<a href="<?=site_url('product/'.$product['posts_slug'])?>">
							<img src="<?=base_url(getenv('uploads').$product['posts_cover'])?>" alt="<?=$product['posts_title']?>" style="height: 280px; object-fit: cover;">
						</a>
						<div class="product_action_box">
							<ul class="list_none pr_action_btn">
								<li><a href="<?=site_url('quick-view/'.$product['posts_slug'])?>" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
								<li><a href="<?=site_url('wishlist')?>"><i class="icon-heart"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="product_info">
						<h6 class="product_title"><a href="<?=site_url('product/'.$product['posts_slug'])?>"><?=$product['posts_title']?></a></h6>
						<div class="product_price">
							<span class="price"><?=pPrice($sPrice)?></span>
							<?=($sPrice != $product['products_price'])?'<del>'.pPrice($product['products_price'], 1).'</del>':''?>
							<div class="on_sale">
								<span>25% Off</span>
							</div>
						</div>
						<div class="rating_wrap">
							<div class="rating">
								<div class="product_rate" style="width:68%"></div>
							</div>
							<span class="rating_num">(15)</span>
						</div>
						<div class="pr_desc">
							<p><?=$product['products_short_description']?></p>
						</div>
						<div class="list_product_action_box">
							<ul class="list_none pr_action_btn">
								<li class="add-to-cart"><a href="<?=site_url('product/'.$product['posts_slug'])?>"><i class="icon-basket-loaded"></i> View Detail</a></li>
								<li><a href="<?=site_url('quick-view/'.$product['posts_slug'])?>" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
								<li><a href="#"><i class="icon-heart"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				
				
				
				<!--<div class="product_box text-center">
                    <div class="product_img">
                        <a href="<?=site_url('product/'.$product['posts_slug'])?>">
                            <img src="" alt="<?=$product['posts_title']?>" style="height: 280px; object-fit: cover;">
                        </a>
                        <div class="product_action_box">
                            <ul class="list_none pr_action_btn">
                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                <li><a href="<?=site_url('quick-view')?>" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                <li><a href="#"><i class="icon-heart"></i></a></li>
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
                        <div class="add-to-cart">
                        	<a href="#" class="btn btn-fill-out btn-radius"><i class="icon-basket-loaded"></i> Add To Cart</a>
                        </div>
                    </div>
                </div>-->
				
				
				
				
				
				
				