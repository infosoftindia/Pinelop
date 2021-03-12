
					<div class="grid_item p-2">
						<span class="ribbon off">-30%</span>
						<figure>
							<a href="<?=base_url('products/'.$categories_id)?>">
								<img class="owl-lazy" src="<?=base_url(getenv('uploads').$categories_icon)?>" data-src="<?=base_url(getenv('uploads').$categories_icon)?>" alt="" style="height: 200px;object-fit: cover;">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i></div>
						<a href="<?=base_url('category/'.$categories_slug)?>">
							<h3><?=$categories_name?></h3>
						</a>
					</div>
					