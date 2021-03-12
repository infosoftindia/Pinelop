		<main class="">
			<div class="top_banner">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
					<div class="container">
						<div class="breadcrumbs">
							<ul>
								<li><a href="<?=site_url()?>">Home</a></li>
								<li>Contact Us</li>
							</ul>
						</div>
						<h1>Contact Us</h1>
					</div>
				</div>
				<img src="img/bg_cat_shoes.jpg" class="img-fluid" alt="">
			</div>

			<div class="container margin_60">
				<div class="main_title">
					<h2>Contact Us</h2>
					<p>Euismod phasellus ac lectus fusce parturient cubilia a nisi blandit sem cras nec tempor adipiscing rcu ullamcorper ligula.</p>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-support"></i>
							<h2>Help Center</h2>
							<a href="tel:<?=getenv('mobile')?>"><?=getenv('mobile')?></a>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-email"></i>
							<h2>Email</h2>
							<a href="mailto:<?=getenv('email')?>"><?=getenv('email')?></a>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-map"></i>
							<h2>Address</h2>
							<a href="#"><?=getenv('address')?></a>
						</div>
					</div>
				</div>
				<!-- /row -->				
			</div>
			<!-- /container -->
		<div class="bg_white">
			<div class="container margin_60_35">
				<h4 class="pb-3">Drop Us a Line</h4>
				<form id="contact-form" method="POST" action="<?=base_url('shopping/contact')?>">
					<div class="row">
						<div class="col-lg-4 col-md-6 add_bottom_25">
							<div class="form-group">
								<input class="form-control" type="text" name="name" placeholder="Name *" required>
							</div>
							<div class="form-group">
								<input class="form-control" type="email" name="email" placeholder="Email *" required>
							</div>
							<div class="form-group">
								<input class="form-control" type="text" name="phone" placeholder="phone *" required>
							</div>
							<div class="form-group">
								<textarea class="form-control" style="height: 150px;" name="message" placeholder="Message *"></textarea>
							</div>
							<div class="form-group">
								<input class="btn_1 full-width" type="submit" value="Submit">
							</div>
						</div>
						<div class="col-lg-8 col-md-6 add_bottom_25">
						<iframe class="map_contact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39714.47749917409!2d-0.13662037019554393!3d51.52871971170425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondra%2C+Regno+Unito!5e0!3m2!1sit!2ses!4v1557824540343!5m2!1sit!2ses" style="border: 0" allowfullscreen></iframe>
						</div>
					</div>
				</form>	
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_white -->
		</main>