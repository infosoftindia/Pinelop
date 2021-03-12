	<main>
		<div class="top_banner">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
				<div class="container">
					<div class="breadcrumbs">
						<ul>
							<li><a href="<?=site_url()?>">Home</a></li>
							<li>Category</li>
						</ul>
					</div>
					<h1>Categories</h1>
				</div>
			</div>
			<img src="<?=site_url('themes/shopping/assets/')?>img/1.png" class="img-fluid" alt="">
		</div>
		<div id="stick_here"></div>
		<div class="container margin_30">
			<div class="row small-gutters">
				<?php if($categories){
					foreach($categories as $category){
						echo '<div class="col-6 col-md-4 col-xl-3">'.sub_category_grid($category).'</div>';
					}
				}else{
				echo '<h4 class="text-center p-4">Sorry no sub category found !</h4>';
				
				} ?>				
			</div>
			<!-- /row -->
		</div>
	</main>
