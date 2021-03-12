<?php
	$menu = '<li>
				<a href="#" class="has-arrow" aria-expanded="false">
					<span class="has-icon">
						<i class="icon-tabs-outline"></i>
					</span>
					<span class="nav-title">Campaign</span>
				</a>
				<ul aria-expanded="false" class="greenBg">
					<li>
						<a href="'.site_url('campaign/pending').'">Pending Campaign</a>
					</li>
					<li>
						<a href="'.site_url('campaign/completed').'">Completed Campaign</a>
					</li>
				</ul>
			</li>';

		$menus['menu'] = $menu;
		$menus['position'] = 12;
		$menus['role'] = 5;

?>