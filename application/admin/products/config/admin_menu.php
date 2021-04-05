<?php
	$menu = '<li>
				<a href="#" class="has-arrow" aria-expanded="false">
					<span class="has-icon">
						<i class="icon-adjust2"></i>
					</span>
					<span class="nav-title">Products</span>
				</a>
				<ul aria-expanded="false" class="greenBg">
					<li>
						<a href="'.admin_url('products/manage').'">Manage Products</a>
					</li>
					<li>
						<a href="'.admin_url('products/create').'">New Products</a>
					</li>
					<li>
						<a href="'.admin_url('products/categories').'">Product Categories</a>
					</li>
					<li>
						<a href="'.admin_url('products/brands').'">Product Brands</a>
					</li>
					
				</ul>
			</li>';
	
	$menus['menu'] = $menu;
	$menus['position'] = 3;
	$menus['role'] = '';
