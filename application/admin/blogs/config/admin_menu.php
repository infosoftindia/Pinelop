<?php
	$menu = '<li>
				<a href="#" class="has-arrow" aria-expanded="false">
					<span class="has-icon">
						<i class="icon-adjust2"></i>
					</span>
					<span class="nav-title">Blogs</span>
				</a>
				<ul aria-expanded="false" class="greenBg">
					<li>
						<a href="'.admin_url('blogs/manage').'">Manage Blogs</a>
					</li>
					<li>
						<a href="'.admin_url('blogs/create').'">New Blogs</a>
					</li>
				</ul>
			</li>';
	
	$menus['menu'] = $menu;
	$menus['position'] = 2;
	$menus['role'] = '121';
?>