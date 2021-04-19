<?php
	$menu = '<li>
				<a href="#" class="has-arrow" aria-expanded="false">
					<span class="has-icon">
						<i class="icon-tabs-outline"></i>
					</span>
					<span class="nav-title">Transaction</span>
				</a>
				<ul aria-expanded="false" class="greenBg">
					<li>
						<a href="'.admin_url('payment/history').'">Transaction History</a>
					</li>
				</ul>
			</li>';
	
	$menus['menu'] = $menu;
	$menus['position'] = 7;
	$menus['role'] = 121;
?>