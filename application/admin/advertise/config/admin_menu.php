<?php
	$menu = '<li>
				<a href="#" class="has-arrow" aria-expanded="false">
					<span class="has-icon">
						<i class="icon-tabs-outline"></i>
					</span>
					<span class="nav-title">Advertise</span>
				</a>
				<ul aria-expanded="false" class="greenBg">
					<li>
						<a href="'.site_url('advertise/create').'">Start Ads Campaign</a>
					</li>
					<li>
						<a href="'.site_url('advertise/completed').'">Completed Campaign</a>
					</li>
				</ul>
			</li>';
	
	$menus['menu'] = $menu;
	$menus['position'] = 8;
	$menus['role'] = 2;
?>