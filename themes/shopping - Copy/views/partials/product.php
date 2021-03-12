
				<?php
					$price = $product['products_price'];
					$salePrice = $product['products_sale_price'];
					if($salePrice != '0' && $salePrice != '' && $salePrice < $price){
						$sPrice = $salePrice;
					}else{
						$sPrice = $price;
					}
				?>
				
				<div class="grid_item">
					<span class="ribbon off"><?=getCategoryName($product['products_category']);?></span>
					<figure>
						<a href="<?=site_url('product/'.$product['posts_slug'])?>">
						<img class="img-fluid lazy" src="<?=base_url(getenv('uploads').$product['posts_cover'])?>" style="height: 250px; object-fit: cover;" alt="">
						</a>
					</figure>
					<a href="<?=site_url('product/'.$product['posts_slug'])?>">
						<h3><?=$product['posts_title']?></h3>
					</a>
					<div class="price_box">
						<span class="new_price"><?=pPrice($sPrice)?></span>
						<?=($sPrice != $product['products_price'])?'<span class="old_price">'.pPrice($product['products_price'], 1).'</span>':''?>
					</div>
					<ul>
						<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
						<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
						<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
					</ul>
				</div>
				
				