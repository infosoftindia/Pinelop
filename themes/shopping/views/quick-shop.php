
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="<?=site_url()?>">home</a></li>
						<li><?=$title?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->
<!--shop  area start-->
<div class="shop_area shop_reverse mt-45 mb-50">
	<div class="container">		
		<div class="col-lg-12 col-md-12" id="result_Here">
		<?php if($total_rows > 0){ ?>
			<div class="row shop_wrapper">
				<?php
					if($categories){
						foreach($categories as $category){
							echo '<div class="col-lg-2 col-md-2 col-12 ">'.category_grid($category).'</div>';
						}
					}
				?>
				
			</div>
		
		<?php } else {
			echo alert('info','', 'No Products founds here');
		} ?>
		</div>
	</div>
</div>
<!--shop  area end-->

