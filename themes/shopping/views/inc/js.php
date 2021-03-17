

		<script src="<?=site_url('themes/shopping/assets/')?>js/jquery-1.12.4.min.js"></script> 
		<script src="<?=site_url('themes/shopping/assets/')?>js/jquery-ui.js"></script>
		<script src="<?=site_url('themes/shopping/assets/')?>js/popper.min.js"></script>
		<script src="<?=site_url('themes/shopping/assets/')?>bootstrap/js/bootstrap.min.js"></script> 
		<script src="<?=site_url('themes/shopping/assets/')?>owlcarousel/js/owl.carousel.min.js"></script> 
		<script src="<?=site_url('themes/shopping/assets/')?>js/magnific-popup.min.js"></script> 
		<script src="<?=site_url('themes/shopping/assets/')?>js/waypoints.min.js"></script> 
		<script src="<?=site_url('themes/shopping/assets/')?>js/parallax.js"></script> 
		<script src="<?=site_url('themes/shopping/assets/')?>js/jquery.countdown.min.js"></script> 
		<script src="<?=site_url('themes/shopping/assets/')?>js/imagesloaded.pkgd.min.js"></script>
		<script src="<?=site_url('themes/shopping/assets/')?>js/isotope.min.js"></script>
		<script src="<?=site_url('themes/shopping/assets/')?>js/jquery.dd.min.js"></script>
		<script src="<?=site_url('themes/shopping/assets/')?>js/slick.min.js"></script>
		<script src="<?=site_url('themes/shopping/assets/')?>js/jquery.elevatezoom.js"></script>
		<script src="<?=site_url('themes/shopping/assets/')?>js/scripts.js"></script>
		<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
		<script src="<?=site_url('themes/shopping/assets/')?>toast/toast.min.js"></script>
		<script src="<?=base_url('themes/shopping/assets/')?>js/shop.js"></script>
		<script>
			$('.page-item').each(function(){
				$(this).children('a').addClass('page-link');
			})
			<?php if($this->input->get('page') != ''){ ?>
				$('#<?=$this->input->get('page')?>-tab').click();
			<?php } ?>
			$('.currency_list').change(function(){
				var curr = $(this).val();
				$.post('<?=site_url('shopping/set_curr')?>', { curr : curr }, function(){
					location.reload();
				});
			})
			
			function addValue(val, output, image){
				$(output).val(val);
				// alert(image)
				if(image != '' && image != 'default.png'){
					$('#product_img').attr('src', '<?=base_url('uploads/')?>'+image);
					$('#product_img').attr('data-zoom-image', '<?=base_url('uploads/')?>'+image);
					$('.zoomWindow').css('background-image', 'url(<?=base_url('uploads/')?>'+image+')');
				}
			}
	
	
			
			
			
			
			<?php if($this->session->flashdata('success')) { ?>
				$.toast({
					title: 'Success',
					subtitle: '0 mins ago',
					content: '<?=$this->session->flashdata('success')?>',
					type: 'success',
					delay: 5000
				});
			<?php } ?>	
		    <?php if($this->session->flashdata('error')) { ?>
				$.toast({
					title: 'Error',
					subtitle: '0 mins ago',
					content: '<?=$this->session->flashdata('error')?>',
					type: 'error',
					delay: 5000
				});
			<?php } ?>	
			
				$('#warning').on('click',function(){
				  $.toast({
					title: 'Warning',
					subtitle: '11 mins ago',
					content: 'Hello, world! This is a WARNING toast message.',
					type: 'warning',
					delay: 5000
				  });
				})
				
			function show_Modal(url, output) {
				$.post(url, function(data){
					$(output).html(data);
					$.getScript(base_url + 'assets/custom.js');
				})
			}
		</script>
		
		<script>
			function login(url, msg){
			$.confirm({
				title: 'Confirm!',
				type: 'red',
					content: msg,
						buttons: {
							Login: function () {
								location.href = url;
							},
							Ok: function () {
								
							},
						}
					});
				}
				
			
		</script>
		<!--<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
		<script src="<?=site_url('themes/shopping/assets/')?>js/custom.js"></script>-->
		
		<script>	
			// $(document).ready( function () {
				// $('.datatable').DataTable();
			// } );

			$("#apply-coupon").click(function (e) {
			  e.preventDefault();
			  var coupon = $("#coupon-code").val();
			  if (coupon != "" && coupon != "undefined") {
				$.post(site_url + "coupons/apply_coupon", { coupon: coupon }, function (
				  data
				) {
					// alert(data);
				  var obj = jQuery.parseJSON(data);
				  // {"discount":999,"discount_html":999,"coupon":"SALE40","total":"8,991"}
				  if (obj.status == 1) {
					$("#cart_discount_amount").show();
					$("#discount_amount").html(obj.discount_amount);
					$("#total_amount").html(obj.total_amount);
					$("#coupon_message").html('');
				  } else {
					$("#coupon_message").html(obj.message);
					$(".newDiv").html(old);
				  }
				});
			  }
			});
			$("#apply-coupon").click();
			$('.btn-decrement').click(function(){
				var val = $('.input').val()
			});
			
			// var perMM = "<?=@$post['products_price_per_mm']?>";
			// perMM = Number(perMMPrice);
			
			// $.getScript('<?=site_url('themes/shopping/assets/load.js')?>');
			
			// $('.add_New_Custom').click(function(){
				// var rand =  Math.floor((Math.random() * 100000) + 1);
				// console.log(rand);
				// $('.add_New_Custom_Here').append('<tr id="thisIs'+rand+'"><td><span>Custom Size <a href="javascript:;" class="badge badge-danger remove_Custom" data-id="#thisIs'+rand+'">Remove</a><div class="input-group mb-3 mt-2" style="width: 165px;"><input type="text" min="50" class="form-control minmax prcChange" id="prcLength'+rand+'" placeholder="Length" name="length[]" style="width: 100px;" data-rand="'+rand+'" data-cl=".erMsg'+rand+'"><div class="input-group-append"><select name="measure[]" class="prcChange" id="prcMeasure'+rand+'" data-rand="'+rand+'"><option value="mm">mm</option><option value="Meter">Meter</option></select></div></div><label class="erMsg'+rand+' text-danger"></label></span> </td><td style="padding-top: 2.5rem!important">£ <span id="prcOutput'+rand+'">0.00</span></td><td style="padding-top: 2.0rem!important"><input type="text" min="0" value="0" data-rand="'+rand+'" style="width: 55px;" class="form-control prcChange numberPrc" name="custom[]" id="prcQty'+rand+'"></td></tr>')
				// $('script').each(function() {
					// if (this.src === '<?=site_url('themes/shopping/assets/load.js')?>') {
						// this.parentNode.removeChild( this );
					// }
				// });
				// $.getScript('<?=site_url('themes/shopping/assets/load.js')?>');
			// })
			// if(page === 'detail'){
				// setInterval(function(){
					// $('script').each(function() {
						// if (this.src === '<?=site_url('themes/shopping/assets/load.js')?>') {
							// this.parentNode.removeChild( this );
						// }
					// });
					// $.getScript('<?=site_url('themes/shopping/assets/load.js')?>');
				// }, 2000)
			// }
		<?=getScript()?>
		</script>
