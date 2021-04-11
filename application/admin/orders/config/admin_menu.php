<?php
$menu = '<li>
				<a href="#" class="has-arrow" aria-expanded="false">
					<span class="has-icon">
						<i class="icon-tabs-outline"></i>
					</span>
					<span class="nav-title">Orders</span>
				</a>
				<ul aria-expanded="false" class="greenBg">
					<li>
						<a href="' . admin_url('orders/pendings') . '">New Orders</a>
					</li>
					<li>
						<a href="' . admin_url('orders/manage') . '">All Orders</a>
					</li>
					<li>
						<a href="' . admin_url('orders/return') . '">Returns </a>
					</li>
				</ul>
			</li>';

$menus['menu'] = $menu;
$menus['position'] = 4;
$menus['role'] = '';
