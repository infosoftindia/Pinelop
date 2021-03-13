		<!-- START FOOTER -->
		<footer class="footer_dark">
			<div class="footer_top">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="widget">
								<div class="footer_logo">
									<a href="#"><img src="<?= site_url('themes/shopping/assets/') ?>images/logo_light.png" alt="logo"></a>
								</div>
								<p>If you are going to use of Lorem Ipsum need to be sure there isn't hidden of text</p>
							</div>
							<div class="widget">
								<ul class="social_icons social_white">
									<li><a href="#"><i class="ion-social-facebook"></i></a></li>
									<li><a href="#"><i class="ion-social-twitter"></i></a></li>
									<li><a href="#"><i class="ion-social-googleplus"></i></a></li>
									<li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
									<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-6">
							<div class="widget">
								<h6 class="widget_title">Useful Links</h6>
								<ul class="widget_links">
									<li><a href="<?= site_url() ?>">Home</a></li>
									<li><a href="<?= site_url('about') ?>">About Us</a></li>
									<li><a href="<?= site_url('categories') ?>">Categories</a></li>
									<li><a href="<?= site_url('shop') ?>">Shop</a></li>
									<li><a href="<?= site_url('contact-us') ?>">Contact</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-6">
							<div class="widget">
								<h6 class="widget_title">Other Links</h6>
								<ul class="widget_links">
									<li><a href="<?= site_url('terms-and-conditions') ?>">Terms & Condition</a></li>
									<li><a href="<?= site_url('privacy-policy') ?>">Privacy Policy</a></li>
									<li><a href="<?= site_url('faq') ?>">FAQ</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="widget">
								<h6 class="widget_title">My Account</h6>
								<ul class="widget_links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">Discount</a></li>
									<li><a href="#">Returns</a></li>
									<li><a href="#">Orders History</a></li>
									<li><a href="#">Order Tracking</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="widget">
								<h6 class="widget_title">Contact Info</h6>
								<ul class="contact_info contact_info_light">
									<li>
										<i class="ti-location-pin"></i>
										<p><?= getenv('address') ?></p>
									</li>
									<li>
										<i class="ti-email"></i>
										<a href="mailto:<?= getenv('email') ?>"><?= getenv('email') ?></a>
									</li>
									<li>
										<i class="ti-mobile"></i>
										<p><a href="tel:<?= getenv('mobile') ?>"><?= getenv('mobile') ?></a></p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom_footer border-top-tran">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<p class="mb-md-0 text-center text-md-left">© 2021 All Rights Reserved by <a href="https://www.ipatco.com/" target="_new">iPatco</a></p>
						</div>
						<div class="col-md-6">
							<ul class="footer_payment text-center text-lg-right">
								<li><a href="#"><img src="<?= site_url('themes/shopping/assets/') ?>images/visa.png" alt="visa"></a></li>
								<li><a href="#"><img src="<?= site_url('themes/shopping/assets/') ?>images/discover.png" alt="discover"></a></li>
								<li><a href="#"><img src="<?= site_url('themes/shopping/assets/') ?>images/master_card.png" alt="master_card"></a></li>
								<li><a href="#"><img src="<?= site_url('themes/shopping/assets/') ?>images/paypal.png" alt="paypal"></a></li>
								<li><a href="#"><img src="<?= site_url('themes/shopping/assets/') ?>images/amarican_express.png" alt="amarican_express"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- END FOOTER -->

		<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

		<?= $js ?>

		</body>

		</html>