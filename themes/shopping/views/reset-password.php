<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
	<div class="container">
		<!-- STRART CONTAINER -->
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="page-title">
					<h1>Reset Password</h1>
				</div>
			</div>
			<div class="col-md-6">
				<ol class="breadcrumb justify-content-md-end">
					<li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
					<li class="breadcrumb-item active">Reset Password</li>
				</ol>
			</div>
		</div>
	</div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

	<!-- START LOGIN SECTION -->
	<div class="login_register_wrap section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6 col-md-10">
					<div class="login_wrap">
						<div class="padding_eight_all bg-white">
							<div class="heading_s1">
								<h3>Reset Password</h3>
							</div>
							<?= alert('danger', 'error') ?>
							<?php if (isset($message)) { ?><div class="alert alert-danger"><?= @$message ?></div><?php } else { ?>
								<form action="<?= site_url('admin/reset_password?token=' . $token) ?>" method="POST">
									<div class="form-group">
										<input type="password" required="" class="form-control" name="password" placeholder="New Password" <?= @$form_error ?>>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-fill-out btn-block" name="login">Change Password</button>
									</div>
								</form>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END LOGIN SECTION -->

</div>
<!-- END MAIN CONTENT -->