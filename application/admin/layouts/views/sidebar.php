

				<!-- BEGIN .app-side -->
				<aside class="app-side" id="app-side">
					<!-- BEGIN .side-content -->
					<div class="side-content ">
						<!-- BEGIN .user-profile -->
						<div class="user-profile">
							<a href="" class="logo">
								<img src="<?=base_url('assets/')?>img\unify.png" alt="Unify Admin Dashboard" />
							</a>
						</div>
						<!-- END .user-profile -->
						<!-- BEGIN .side-nav -->
						<nav class="side-nav">
							<!-- BEGIN: side-nav-content -->
							<ul class="unifyMenu" id="unifyMenu">
							<?php
								foreach($menus as $menu){
									if($menu['role'] != ''){
										if($this->session->userdata('user_role') == $menu['role']){
											echo $menu['menu'];
										}
									}else{
										echo $menu['menu'];
									}
								}
							?>
							</ul>
							<!-- END: side-nav-content -->
						</nav>
						<!-- END: .side-nav -->
					</div>
					<!-- END: .side-content -->
				</aside>
				<!-- END: .app-side -->
