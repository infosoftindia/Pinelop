<?php
$menu = '<li>
				<a href="#" class="has-arrow" aria-expanded="false">
					<span class="has-icon">
						<i class="icon-tabs-outline"></i>
					</span>
					<span class="nav-title">Settings</span>
				</a>
				<ul aria-expanded="false" class="greenBg">
					<li>
						<a href="' . admin_url('settings/general') . '">General Setting</a>
					</li>
					<li>
						<a href="' . admin_url('settings/email') . '">Mail Settings</a>
					</li>
					<li>
						<a href="' . admin_url('settings/reading') . '">Reading Settings</a>
					</li>
					<!--<li>
						<a href="' . admin_url('settings/captcha') . '">Captcha Settings</a>
					</li>
					<li>
						<a href="' . admin_url('settings/media') . '">Media Settings</a>
					</li>-->
					<li>
						<a href="' . admin_url('settings/site-legal') . '">Site Legals</a>
					</li>
				</ul>
			</li>';

$menus['menu'] = $menu;
$menus['position'] = 800;
$menus['role'] = 121;
