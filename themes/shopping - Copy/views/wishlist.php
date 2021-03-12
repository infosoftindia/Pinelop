

<!--breadcrumbs area start-->
<div class="breadcrumbs_area mt-45">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="<?=site_url()?>">home</a></li>
						<li>Wishlist</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->
<!--wishlist area start -->
<div class="wishlist_area mt-45">
	<div class="container">
		<form action="#">
			<div class="row">
				<div class="col-md-12">
					<?=alert('info', 'msg')?>
					<?=alert('danger', 'error')?>
					<?=alert('success', 'success')?>
					<?=alert('warning', 'warning')?>
				</div>
			</div>
			<?php if($wishlists){ ?>
			<div class="row">
				<div class="col-12">
					<div class="table_desc wishlist">
						<div class="cart_page table-responsive">
							<table>
								<thead>
									<tr>
										<th class="product_remove">Delete</th>
										<th class="product_thumb">Image</th>
										<th class="product_name">Product</th>
										<th class="product-price">Price</th>
										<th class="product_quantity">Stock Status</th>
										<th class="product_total">Add To Cart</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($wishlists as $wishlist){ ?>
									<tr>
										<td class="product_remove"><a href="<?=base_url('shopping/remove_wishlist/'.$wishlist['wishlists_id'])?>">&times;</a></td>
										<td class="product_thumb"><a href="<?=site_url('product/'.$wishlist['posts_slug'])?>"><img src="<?=base_url(getenv('uploads').$wishlist['posts_cover'])?>" alt=""></a></td>
										<td class="product_name"><a href="<?=site_url('product/'.$wishlist['posts_slug'])?>"><?=$wishlist['posts_title']?></a></td>
										<td class="product-price"><?=pPrice($wishlist['products_price'])?></td>
										<td class="product_quantity">In Stock</td>
										<td class="product_total"><a href="<?=base_url('shopping/add_to_cart_wishlist/'.$wishlist['wishlists_post'].'/'.$wishlist['wishlists_id'])?>">Add To Cart</a></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php } else {
				echo '<center style="font-size: 20px;" class="m-5 text-danger">Your wishlist is empty!</center>';
			} ?>
		</form>
	</div>
</div>
<!--wishlist area end -->

