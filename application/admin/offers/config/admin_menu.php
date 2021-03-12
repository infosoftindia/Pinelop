<?php
	$menu = '<li>
				<a href="#" class="has-arrow" aria-expanded="false">
					<span class="has-icon">
						<i class="icon-adjust2"></i>
					</span>
					<span class="nav-title">Offers</span>
				</a>
				<ul aria-expanded="false" class="greenBg">
					<li>
						<a href="'.admin_url('offers/daily-deals').'">Daily Deals</a>
					</li>
					<!--<li>
						<a href="'.admin_url('offers/trending_categories').'">Trending Categories</a>
					</li>-->
					<li>
						<a href="'.admin_url('offers/best-offers').'">Best Offers</a>
					</li>
				</ul>
			</li>';
	
	$menus['menu'] = $menu;
	$menus['position'] = 6;
	$menus['role'] = 121;
?>