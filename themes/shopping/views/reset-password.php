
<style>
.modal-dialog.modal-dialog-centered {
    min-width: auto;
}

.modal-content button.close {
    position: absolute;
    right: 3%;
    width: auto;
    height: auto;
    line-height: 33px;
    display: block;
    border: 0px;
    top: auto;
    border-radius: 0%;
    cursor: pointer;
    font-size: 20px;
    z-index: 9;
}
</style>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area mt-45">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="<?=site_url()?>">home</a></li>
						<li>My account</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->
<!-- customer login start -->
<div class="customer_login mt-45">
	<div class="container">
		<div class="row">
			<!--login area start-->
			<div class="col-lg-3 col-md-3"></div>
			<div class="col-lg-6 col-md-6">
				<div class="account_form login">
					<?=alert('danger', 'error')?>
					<h2>Reset Password</h2>
					<?php if(isset($message)){ ?><div class="alert alert-danger"><?=@$message?></div><?php }else{ ?>
					<form action="<?=site_url('admin/reset_password?token='.$token)?>" method="POST">
						<p>
							<label>New Password <span>*</span></label>
							<input type="password" name="password" <?=@$form_error?>>
						</p>
						<div class="login_submit">
							<button type="submit">Reset Password</button>
						</div>
					</form>
					<?php } ?>
				</div>
			</div>
			<!--login area start-->
		</div>
	</div>
</div>
<!-- customer login end -->

