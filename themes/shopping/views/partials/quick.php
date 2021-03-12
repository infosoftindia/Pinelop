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
				<article class="single_product">
					<figure>
					   <div class="product_name">
						   <h4><a href="<?=site_url('product/'.$product['posts_slug'])?>"><?=$product['posts_title']?></a></h4>
					   </div>
					   <div class="product_rating">
						   <ul>
							   <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
							   <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
							   <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
							   <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
							   <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						   </ul>
					   </div>

						<div class="product_thumb">
							<a class="primary_img" href="<?=site_url('product/'.$product['posts_slug'])?>"><img src="<?=base_url(getenv('uploads').$product['posts_cover'])?>" style="height:250px; object-fit:cover;" alt=""></a>
							<div class="label_product">
								<span class="label_sale">Sale!</span>
							</div>
							<div class="quick_button">
								<a href="<?=site_url('product/'.$product['posts_slug'])?>">View Product</a>
							</div>
						</div>
						<div class="product_footer">
							<div class="price_box"> 
								<span class="old_price">$80.00</span> 
								<span class="current_price">$70.00</span>
							</div>
							<div class="action_links">
								 <ul>
									<li class="add_to_cart"><a href="" title="Add to cart">Add to cart</a></li>

									<li class="wishlist"><a href=""  title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
								</ul>
							</div>
						</div>
					</figure>
				</article>   
			</div>
