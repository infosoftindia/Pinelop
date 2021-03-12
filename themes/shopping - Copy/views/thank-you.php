
<style>
	.error_form h1 {
		font-size: 50px;
		margin: 0;
		line-height: normal;
	}
	.jumbotron{
		border-radius: 10px;
	}
	.error_form p {
		margin-bottom: 0;
	}
	.error_form p.mob {
		display: none;
	}
	@media only screen and (max-width: 767px) {
		.error_form p.pc {
			display: none;
		}
		.error_form p.mob {
			display: block !important;
			font-size: 12px;
		}
		.error_form h1 {
			font-size: 30px;
			margin: 0;
			line-height: normal;
		}
		.error_form h2 {
			font-size: 15px;
			margin-bottom: 5px;
		}
	}
</style>
	<!--error section area start-->
	<div class="error_section">
		<div class="container">   
			<div class="row">
				<div class="col-12">
					<div class="error_form">
						<div class="jumbotron">
							<h1>Order Confirmed</h1>
							<h2 class="mt-4">Thank you for your purchase!</h2>
							<p class="pc">Your order has now been received, and you will shortly receive a confirmation email<br>containing details of your order. If you have any questions, please<br>contact us and we will be happy to assist you.</p>
							<p class="mob">Your order has now been received, and you will shortly receive a confirmation email containing details of your order. If you have any questions, please contact us and we will be happy to assist you.</p>
							<a class="mt-4" href="<?=base_url()?>">Continue Shopping</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--error section area end--> 
