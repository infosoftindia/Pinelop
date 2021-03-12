
											<?php if($menus){ foreach($menus as $menu){ ?>
												<?php if($menu['menus_hide'] == 0){ ?>
													<?php if(empty($menu['menus_title_1']) && empty($menu['menus_title_2']) && empty($menu['menus_title_3']) && empty($menu['menus_title_4'])){ ?>
														<li><a href="<?=$menu['menus_url']?>"> <?=$menu['menus_title']?></a></li>
													<?php }else{ ?>
														<li class="menu_item_children">
															<a href="<?=$menu['menus_url']?>"> <?=$menu['menus_title']?>  <i class="fa fa-angle-right"></i></a>
															<?php
																if(!empty($menu['menus_title_2'])){
																	if(!empty($menu['menus_title_3'])){
																		if(!empty($menu['menus_title_4'])){
																			$cnt = 4;
																		}else{
																			$cnt = 3;
																		}
																	}else{
																		$cnt = 2;
																	}
																}else{
																	$cnt = 1;
																}
															?>
															<ul class="categories_mega_menu column_<?=$cnt?>">
																<?php for($i=1; $i<=$cnt; $i++){ ?>
																<li class="menu_item_children">
																	<a href="#"><?=$menu['menus_title_'.$i]?></a>
																	<ul class="categorie_sub_menu">
																		<?php
																			$items = explode(PHP_EOL, $menu['menus_navigation_'.$i]);
																			foreach($items as $item){
																				$url = explode('|', $item);
																				echo '<li><a href="'.$url[1].'">'.$url[0].'</a></li>';
																			}
																		?>
																	</ul>
																</li>
																<?php } ?>
															</ul>
														</li>
													<?php } ?>
												<?php } ?>
											<?php } } ?>
											<li id="cat_toggle" class="has-sub">
												<a href="#"> More Categories</a>
												<ul class="categorie_sub">
													<?php if($menus){ foreach($menus as $menu){ ?>
														<?php if($menu['menus_hide'] == 1 ){ ?>
															<?php if(empty($menu['menus_title_1']) && empty($menu['menus_title_2']) && empty($menu['menus_title_3']) && empty($menu['menus_title_4'])){ ?>
																<li><a href="<?=$menu['menus_url']?>"> <?=$menu['menus_title']?></a></li>
															<?php }else{ ?>
																<li class="menu_item_children">
																	<a href="<?=$menu['menus_url']?>"> <?=$menu['menus_title']?>  <i class="fa fa-angle-right"></i></a>
																	<?php
																		if(!empty($menu['menus_title_2'])){
																			if(!empty($menu['menus_title_3'])){
																				if(!empty($menu['menus_title_4'])){
																					$cnt = 4;
																				}else{
																					$cnt = 3;
																				}
																			}else{
																				$cnt = 2;
																			}
																		}else{
																			$cnt = 1;
																		}
																	?>
																	<ul class="categories_mega_menu column_<?=$cnt?>">
																		<?php for($i=1; $i<=$cnt; $i++){ ?>
																		<li class="menu_item_children">
																			<a href="#"><?=$menu['menus_title_'.$i]?></a>
																			<ul class="categorie_sub_menu">
																				<?php
																					$items = explode(PHP_EOL, $menu['menus_navigation_'.$i]);
																					foreach($items as $item){
																						$url = explode('|', $item);
																						echo '<li><a href="'.$url[1].'">'.$url[0].'</a></li>';
																					}
																				?>
																			</ul>
																		</li>
																		<?php } ?>
																	</ul>
																</li>
															<?php } ?>
														<?php } ?>
													<?php } } ?>
												</ul>
											</li>
