
<main>
	<div class="top_banner">
		<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
			<div class="container">
				<div class="breadcrumbs">
					<ul>
						<li><a href="<?=site_url()?>">Home</a></li>
						<li>Blogs</li>
					</ul>
				</div>
				<h1>Blogs</h1>
			</div>
		</div>
		<img src="img/bg_cat_shoes.jpg" class="img-fluid" alt="">
	</div>
	<div class="container margin_30">
		<div class="row">
			<div class="col-lg-12">
				<div class="widget search_blog d-block d-sm-block d-md-block d-lg-none">
					<div class="form-group">
						<input type="text" name="search" id="search" class="form-control" placeholder="Search..">
						<button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
					</div>
				</div>
				<div class="row">
					<?php foreach($blogs as $blog) { ?>
					<div class="col-md-4">
						<article class="blog">
							<figure>
								<a href="<?=site_url('blog/'.$blog['posts_slug'])?>"><img src="<?=base_url(getenv('uploads').$blog['posts_cover'])?>" alt="">
									<div class="preview"><span>Read more</span></div>
								</a>
							</figure>
							<div class="post_info">
								<small><?=date('M d, Y',strtotime($blog['posts_created']))?></small>
								<h2><a href="<?=site_url('blog/'.$blog['posts_slug'])?>"><?=$blog['posts_title']?></a></h2>
								<p><?=character_limiter($blog['blogs_description'],120)?></p>
							</div>
						</article>
						<!-- /article -->
					</div>
					<?php } ?>
					
				</div>

			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</main>