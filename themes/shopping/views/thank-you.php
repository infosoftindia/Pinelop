<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Order Completed</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
					<li class="breadcrumb-item"><a href="<?=site_url()?>">home</a></li>
					<li class="breadcrumb-item"><a href="<?=site_url('checkout')?>">Checkout</a></li>
					<li class="breadcrumb-item"><a href="<?=site_url('select-payment')?>">Select Payment</a></li>
					<li class="breadcrumb-item"><a href="<?=site_url('place-order')?>">Place Order</a></li>
					<li class="breadcrumb-item active">Make Payment</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center order_complete">
                	<i class="fas fa-check-circle"></i>
                    <div class="heading_s1">
                  	<h3>Order Confirmed</h3>
					<h5 class="mt-2">Thank you for your purchase!</h5>
                    </div>
                  	<p>Your order has now been received, and you will shortly receive a confirmation email<br>containing details of your order. If you have any questions, please<br>contact us and we will be happy to assist you.</p>
                    <a href="<?=site_url()?>" class="btn btn-fill-out">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
	<div class="container">	
    	<div class="row align-items-center">	
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>Subscribe Our Newsletter</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form>
                        <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>