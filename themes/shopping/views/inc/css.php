<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('themes/shopping/assets/') ?>images/favicon.png">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>css/animate.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>bootstrap/css/bootstrap.min.css">
<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>css/all.min.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>css/ionicons.min.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>css/themify-icons.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>css/linearicons.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>css/flaticon.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>css/simple-line-icons.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>owlcarousel/css/owl.theme.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>owlcarousel/css/owl.theme.default.min.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>css/magnific-popup.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>css/jquery-ui.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>css/slick.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>css/slick-theme.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>css/style.css">
<link rel="stylesheet" href="<?= base_url('themes/shopping/assets/') ?>css/responsive.css">
<link href="//cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
<link href="<?= base_url('themes/shopping/assets/') ?>toast/toast.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

<script>
	var base_url = '<?= base_url() ?>';
	var site_url = '<?= site_url() ?>';
	var page = '';
</script>
<style>
	.product_size_switch span {
		padding: 0 7px !important;
		min-width: 32px !important;
		width: auto;
	}

	.float {
		position: fixed;
		width: 50px;
		height: 50px;
		bottom: 70px;
		right: 20px;
		background-color: #25d366;
		color: #FFF;
		border-radius: 50px;
		text-align: center;
		font-size: 30px;
		/* box-shadow: 2px 2px 3px #999; */
		z-index: 100;
	}

	.my-float {
		margin-top: 11px;
	}

	@media only screen and (min-width: 300px) {

		.banner_section:not(.full_screen),
		.banner_section:not(.full_screen) .carousel-item,
		.banner_section:not(.full_screen) .banner_content_wrap,
		.banner_section:not(.full_screen) .banner_content_wrap .carousel-item {
			height: 100px !important;
		}

		.btn1 {
			padding: 5px 15px !important;
			font-size: 10px !important;
		}

		.banner_content2 h2 {
			font-size: 12px;
		}
	}

	@media only screen and (min-width: 400px) {

		.banner_section:not(.full_screen),
		.banner_section:not(.full_screen) .carousel-item,
		.banner_section:not(.full_screen) .banner_content_wrap,
		.banner_section:not(.full_screen) .banner_content_wrap .carousel-item {
			height: 135px !important;
		}

		.btn1 {
			padding: 5px 15px !important;
			font-size: 10px !important;
		}

		.banner_content2 h2 {
			font-size: 12px;
		}
	}

	@media only screen and (min-width: 500px) {

		.banner_section:not(.full_screen),
		.banner_section:not(.full_screen) .carousel-item,
		.banner_section:not(.full_screen) .banner_content_wrap,
		.banner_section:not(.full_screen) .banner_content_wrap .carousel-item {
			height: 170px !important;
		}

		.btn1 {
			padding: 5px 15px !important;
			font-size: 10px !important;
		}

		.banner_content2 h2 {
			font-size: 12px;
		}
	}

	@media only screen and (min-width: 600px) {

		.banner_section:not(.full_screen),
		.banner_section:not(.full_screen) .carousel-item,
		.banner_section:not(.full_screen) .banner_content_wrap,
		.banner_section:not(.full_screen) .banner_content_wrap .carousel-item {
			height: 200px !important;
		}

		.btn1 {
			padding: 5px 15px !important;
			font-size: 10px !important;
		}

		.banner_content2 h2 {
			font-size: 12px;
		}
	}

	@media only screen and (min-width: 700px) {

		.banner_section:not(.full_screen),
		.banner_section:not(.full_screen) .carousel-item,
		.banner_section:not(.full_screen) .banner_content_wrap,
		.banner_section:not(.full_screen) .banner_content_wrap .carousel-item {
			height: 240px !important;
		}

		.btn1 {
			padding: 5px 15px !important;
			font-size: 10px !important;
		}

		.banner_content2 h2 {
			font-size: 12px;
		}
	}

	@media only screen and (min-width: 800px) {

		.banner_section:not(.full_screen),
		.banner_section:not(.full_screen) .carousel-item,
		.banner_section:not(.full_screen) .banner_content_wrap,
		.banner_section:not(.full_screen) .banner_content_wrap .carousel-item {
			height: 270px !important;
		}

		.btn1 {
			padding: 5px 15px !important;
			font-size: 10px !important;
		}

		.banner_content2 h2 {
			font-size: 40px;
		}
	}

	@media only screen and (min-width: 900px) {

		.banner_section:not(.full_screen),
		.banner_section:not(.full_screen) .carousel-item,
		.banner_section:not(.full_screen) .banner_content_wrap,
		.banner_section:not(.full_screen) .banner_content_wrap .carousel-item {
			height: 300px !important;
		}

		.btn1 {
			padding: 12px 35px !important;
			font-size: 1rem !important;
		}

		.banner_content2 h2 {
			font-size: 50px;
		}
	}

	@media only screen and (min-width: 1000px) {

		.banner_section:not(.full_screen),
		.banner_section:not(.full_screen) .carousel-item,
		.banner_section:not(.full_screen) .banner_content_wrap,
		.banner_section:not(.full_screen) .banner_content_wrap .carousel-item {
			height: 400px !important;
		}

		.btn1 {
			padding: 12px 35px !important;
			font-size: 1rem !important;
		}

		.banner_content2 h2 {
			font-size: 55px;
		}
	}

	@media only screen and (min-width: 1100px) {

		.banner_section:not(.full_screen),
		.banner_section:not(.full_screen) .carousel-item,
		.banner_section:not(.full_screen) .banner_content_wrap,
		.banner_section:not(.full_screen) .banner_content_wrap .carousel-item {
			height: 500px !important;
		}

		.btn1 {
			padding: 12px 35px !important;
			font-size: 1rem !important;
		}

		.banner_content2 h2 {
			font-size: 60px;
		}
	}

	@media only screen and (min-width: 1200px) {

		.banner_section:not(.full_screen),
		.banner_section:not(.full_screen) .carousel-item,
		.banner_section:not(.full_screen) .banner_content_wrap,
		.banner_section:not(.full_screen) .banner_content_wrap .carousel-item {
			height: 650px !important;
		}

		.btn1 {
			padding: 12px 35px !important;
			font-size: 1rem !important;
		}

		.banner_content2 h2 {
			font-size: 70px;
		}
	}
</style>