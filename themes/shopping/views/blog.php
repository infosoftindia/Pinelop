<main class="">
	<div class="top_banner">
		<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
			<div class="container">
				<div class="breadcrumbs">
					<ul>
						<li><a href="<?=site_url()?>">Home</a></li>
						<li>Blog</li>
					</ul>
				</div>
				<h1><?=$blog['posts_title']?></h1>
			</div>
		</div>
		<img src="img/bg_cat_shoes.jpg" class="img-fluid" alt="">
	</div>
	<div class="container margin_30">
	<div class="row">
		<div class="col-lg-9">
			<div class="singlepost">
				<figure><img alt="" class="img-fluid" src="<?=base_url(getenv('uploads').$blog['posts_cover'])?>"></figure>
				<h1><?=$blog['posts_title']?></h1>
				<div class="postmeta">
					<ul>
						<li><i class="ti-calendar"></i> <?=date('M d, Y',strtotime($blog['posts_created']))?></li>
						<li><a href="#"><i class="ti-user"></i> Admin</a></li>
						<li><a href="#"><i class="ti-comment"></i> (2) Comments</a></li>
					</ul>
				</div>
				<!-- /post meta -->
				<div class="post-content mb-5">
					<div class="dropcaps">
						<?php
							$desc = $blog['blogs_description'];
							$dArray = explode(PHP_EOL, $desc);
							foreach($dArray as $pp) {
								echo '<p>'.$pp.'</p>';
								}
							?>
					</div>
				</div>
				<!-- /single-post -->
				<!--<h5 class="pt-4">Leave a comment</h5>
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="form-group">
							<input type="text" name="name" id="name2" class="form-control" placeholder="Name">
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="form-group">
							<input type="text" name="email" id="email2" class="form-control" placeholder="Email">
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<input type="text" name="email" id="website3" class="form-control" placeholder="Website">
						</div>
					</div>
				</div>
				<div class="form-group">
					<textarea class="form-control" name="comments" id="comments2" rows="6" placeholder="Comment"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" id="submit2" class="btn_1 add_bottom_15">Submit</button>
				</div>
				<hr>
				<div id="comments">
					<h5>Comments</h5>
					<ul>
						<li>
							<div class="avatar">
								<a href="#"><img src="img/avatar1.jpg" alt="">
								</a>
							</div>
							<div class="comment_right clearfix">
								<div class="comment_info">
									By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
								</div>
								<p>
									Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
								</p>
							</div>
						</li>
						<li>
							<div class="avatar">
								<a href="#"><img src="img/avatar3.jpg" alt="">
								</a>
							</div>
							<div class="comment_right clearfix">
								<div class="comment_info">
									By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
								</div>
								<p>
									Cursus tellus quis magna porta adipiscin
								</p>
							</div>
						</li>
					</ul>
				</div>-->
			</div>
		</div>
		
		<aside class="col-lg-3">
			<div class="widget">
				<div class="widget-title">
					<h4>Latest Post</h4>
				</div>
				<ul class="comments-list">
					<?php foreach($related as $relateds) { ?>
					<li>
						<div class="alignleft">
							<a href="<?=site_url('blog/'.$blog['posts_slug'])?>"><img src="<?=base_url(getenv('uploads').$relateds['posts_cover'])?>" alt=""></a>
						</div>
						<small><?=date('M d, Y',strtotime($relateds['posts_created']))?></small>
						<h3><a href="<?=site_url('blog/'.$blog['posts_slug'])?>" title=""><?=$relateds['posts_title']?></a></h3>
					</li>
					<?php } ?>
				</ul>
				
			</div>
		</aside>
	</div>
</main>