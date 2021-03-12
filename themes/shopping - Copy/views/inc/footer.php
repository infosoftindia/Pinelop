

		<!--footer area start-->
		<footer class="revealed">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_1">Quick Links</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_1">
						<ul>
							<li><a href="<?=site_url()?>">Home</a></li>
							<li><a href="<?=site_url()?>">About us</a></li>
							<li><a href="<?=site_url()?>">Categories</a></li>
							<li><a href="<?=site_url()?>">Shop</a></li>
							<li><a href="<?=site_url()?>">Contacts Us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_2">Help</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						<ul>
							<li><a href="<?=site_url()?>">FAQ</a></li>
							<li><a href="<?=site_url()?>">Terms of use</a></li>
							<li><a href="<?=site_url()?>">Help & Support</a></li>
							<li><a href="<?=site_url()?>">Privacy Policies</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_3">Contacts</h3>
					<div class="collapse dont-collapse-sm contacts" id="collapse_3">
						<ul>
							<li><i class="ti-home"></i><?=getenv('address')?></li>
							<li><i class="ti-headphone-alt"></i><a href="tel:<?=getenv('mobile')?>"><?=getenv('mobile')?></a></li>
							<li><i class="ti-email"></i><a href="#0"><a href="mailto:<?=getenv('email')?>"> <?=getenv('email')?></a></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_4">Keep in touch</h3>
					<div class="collapse dont-collapse-sm" id="collapse_4">
						<form id="mc-form" class="mc-form footer-newsletter" action="<?=site_url('shopping/subscribe_newsletter')?>" method="POST">
							<div id="newsletter">
								<div class="form-group">
									<input type="email" name="email" id="email_newsletter" autocomplete="off" class="form-control" placeholder="Your email" required>
									<button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
								</div>
								<?php if($this->session->flashdata('error')) { ?>
									<label class="text-danger"><?=$this->session->flashdata('error')?></label>
								<?php } ?>
								<?php if($this->session->flashdata('info')) { ?>
									<label class="text-success"><?=$this->session->flashdata('info')?></label>
								<?php } ?>
							</div>
						</form>
						<div class="follow_us">
							<h5>Follow Us</h5>
							<ul>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=base_url('themes/shopping/assets/')?>img/twitter_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=base_url('themes/shopping/assets/')?>img/facebook_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=base_url('themes/shopping/assets/')?>img/instagram_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=base_url('themes/shopping/assets/')?>img/youtube_icon.svg" alt="" class="lazy"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /row-->
			<hr>
			<div class="row add_bottom_25">
				<div class="col-lg-6">
					<ul class="footer-selector clearfix">
						<li>
							<div class="styled-select lang-selector">
								<select>
									<option value="English" selected>English</option>
									<option value="French">French</option>
									<option value="Spanish">Spanish</option>
									<option value="Russian">Russian</option>
								</select>
							</div>
						</li>
						<li>
							<div class="styled-select currency-selector">
								<select>
									<option value="US Dollars" selected>US Dollars</option>
									<option value="Euro">Euro</option>
								</select>
							</div>
						</li>
						<li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=base_url('themes/shopping/assets/')?>img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
						<li><span>© <?=date('Y')?> Shop. All Right Reserved By <a href="https://www.ipatco.com/" target="new"><b>iPatco</b>.</a></span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->	
	<?=$js?>
	
</body>
</html>