<?php
	$menu = '<li>
				<a href="#" class="has-arrow" aria-expanded="false">
					<span class="has-icon">
						<i class="icon-adjust2"></i>
					</span>
					<span class="nav-title">Vendors</span>
				</a>
				<ul aria-expanded="false" class="greenBg">
					<li>
						<a href="'.site_url('vendors/create').'">New Products</a>
					</li>
					<li>
						<a href="'.site_url('vendors/manage').'">Manage Products</a>
					</li>
				</ul>
			</li>';
	
	$menus['menu'] = $menu;
	$menus['position'] = 2;
	$menus['role'] = ' ';
?>