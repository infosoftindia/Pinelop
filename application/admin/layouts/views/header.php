<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="Unify Admin Panel" />
		<meta name="keywords" content="Admin, Dashboard, Bootstrap4, Sass, CSS3, HTML5, Responsive Dashboard, Responsive Admin Template, Admin Template, Best Admin Template, Bootstrap Template, Themeforest" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="./assets/img/favicon.ico" />
		<title><?=$title . ' | ' . getenv('title')?></title>
		<?=$css?>

		<script>var base_url = '<?=base_url()?>';</script>
	</head>
	<body>
		<!-- Loading starts --
		<div class="loading-wrapper">
			<div class="loading">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<!-- Loading ends -->
<!-- BEGIN .app-wrap -->
		<div class="app-wrap">
			<!-- BEGIN .app-heading -->
			<header class="app-header">
				<div class="container-fluid">
					<div class="row gutters">
						<div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-8">
							<a class="mini-nav-btn" href="javascript:;" id="app-side-mini-toggler">
								<i class="icon-arrow_back"></i>
							</a>
							<a href="#app-side" data-toggle="onoffcanvas" class="onoffcanvas-toggler" aria-expanded="true">
								<i class="icon-chevron-thin-left"></i>
							</a>
							<div class="custom-search hidden-sm hidden-xs">
								<i class="icon-magnifying-glass"></i>
								<input type="text" class="search-query" placeholder="Search ...">
							</div>
						</div>
						<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-4">
							<ul class="header-actions">
								<li>
									<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
										<img class="avatar" src="<?='http://www.gravatar.com/avatar/' . md5(strtolower(trim($this->session->userdata('user_email')))) . '?s=70';?>" alt="User Thumb" />
										<span class="user-name"><?=$this->session->userdata('user_name')?></span>
										<i class="icon-chevron-small-down"></i>
									</a>
									<div class="dropdown-menu lg dropdown-menu-right" aria-labelledby="userSettings">
										<ul class="user-settings-list">
											<li>
												<a href="<?=site_url('admin/profile')?>">
													<div class="icon">
														<i class="icon-account_circle"></i>
													</div>
													<p>Profile</p>
												</a>
											</li>
											<li>
												<a href="profile.html">
													<div class="icon red">
														<i class="icon-cog3"></i>
													</div>
													<p>Settings</p>
												</a>
											</li>
											<li>
												<a href="<?=site_url('admin/activity')?>">
													<div class="icon yellow">
														<i class="icon-schedule"></i>
													</div>
													<p>Activity</p>
												</a>
											</li>
										</ul>
										<div class="logout-btn">
											<a href="<?=site_url('admin/logout')?>" class="btn btn-primary">Logout</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</header>
			<!-- END: .app-heading -->