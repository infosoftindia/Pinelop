<?php
	$menu = '<li>
				<a href="#" class="has-arrow" aria-expanded="false">
					<span class="has-icon">
						<i class="icon-users"></i>
					</span>
					<span class="nav-title">Users</span>
				</a>
				<ul aria-expanded="false" class="greenBg">
					<li>
						<a href="'.admin_url('users/create').'">New User</a>
					</li>
					<li>
						<a href="'.admin_url('users/manage').'">All User</a>
					</li>
				</ul>
			</li>';
	
	$menus['menu'] = $menu;
	$menus['position'] = 1;
	$menus['role'] = 121;
?>