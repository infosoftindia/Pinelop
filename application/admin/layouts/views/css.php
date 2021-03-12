

		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		<!-- Common CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/fonts/icomoon/icomoon.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css" />
		<!-- Other CSS includes plugins - Cleanedup unnecessary CSS -->
		<!-- Chartist css -->
		<link href="<?=base_url()?>assets/vendor/chartist/css/chartist.min.css" rel="stylesheet" />
		<link href="<?=base_url()?>assets/vendor/chartist/css/chartist-custom.css" rel="stylesheet" />
		<link href="<?=base_url()?>assets/fselect/fSelect.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?=base_url()?>assets/vendor/c3/c3.min.css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/multiselect/css/multi-select.css">
		<script>
			var dailyGraph = [];
			var monthlyGraph = [];
			var yearlyGraph = [];
			var base_url = "<?=base_url()?>";
		</script>
		<style>
		.hidethis{
			display: none;
		}
			li.selected a.active{
				color: white !important;
			}
			ul.greenBg li.selected a.active{
				color: #179978 !important;
			}
			.fs-label-wrap .fs-label {
				padding: 10px 22px 10px 8px !important;
			}
			.fs-wrap {
				width: 100% !important;
			}
			.fs-dropdown {
				width: 94%;
			}
			.ms-list{
				border-radius: 0 0 0 0 !important;
				border-top: 0 solid !important;
				height: 300px !important;
			}
			.ms-container {
				width: 100%;
			}
			.ms-container .ms-selectable, .ms-container .ms-selection {
				width: 48.5%;
			}
			.search-input{
				border-radius: 0 0 0 0 !important;
			}
			.bold{
				font-weight: 600;
			}
		</style>

