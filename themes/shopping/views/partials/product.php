
				<?php
					$price = $product['search_amount'];
					$salePrice = $product['search_sale'];
					if($salePrice != '0' && $salePrice != '' && $salePrice < $price){
						$sPrice = $salePrice;
					}else{
						$sPrice = $price;
					}
				?>
				
				<div class="product">
					<div class="product_img">
						<a href="<?=site_url('product/'.$product['search_slug'])?>">
							<img src="<?=base_url(getenv('uploads').$product['search_image'])?>" alt="<?=$product['search_title']?>" style="height: 280px; object-fit: cover;">
						</a>
						<div class="product_action_box">
							<ul class="list_none pr_action_btn">
								<li><a href="<?=site_url('quick-view/'.$product['search_slug'])?>" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
								<li><a href="<?=site_url('wishlist')?>"><i class="icon-heart"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="product_info">
						<h6 class="product_title"><a href="<?=site_url('product/'.$product['search_slug'])?>"><?=$product['search_title']?></a></h6>
						<div class="product_price">
							<span class="price"><?=pPrice($sPrice)?></span>
							<?=($sPrice != $product['search_amount'] && $product['search_amount'] > 0)?'<del>'.pPrice($product['search_amount'], 1).'</del>':''?>
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
							<p><?=$product['search_desc']?></p>
						</div>
						<div class="list_product_action_box">
							<ul class="list_none pr_action_btn">
								<li class="add-to-cart"><a href="<?=site_url('product/'.$product['search_slug'])?>"><i class="icon-basket-loaded"></i> View Detail</a></li>
								<li><a href="<?=site_url('quick-view/'.$product['search_slug'])?>" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
								<li><a href="#"><i class="icon-heart"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				