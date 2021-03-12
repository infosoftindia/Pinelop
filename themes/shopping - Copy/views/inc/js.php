

		<!-- JS ============================================ -->
		<!-- Plugins JS -->
		<script src="<?=site_url('themes/shopping/assets/')?>js/common_scripts.min.js"></script>
		<script src="<?=site_url('themes/shopping/assets/')?>js/main.js"></script>
		<!-- SPECIFIC SCRIPTS -->
		<script src="<?=site_url('themes/shopping/assets/')?>js/carousel-home.min.js"></script>
		<!-- Main JS -->	
		<script src="<?=site_url('themes/shopping/assets/')?>js/sticky_sidebar.min.js"></script>
		<script src="<?=site_url('themes/shopping/assets/')?>js/specific_listing.js"></script>
		<script  src="<?=site_url('themes/shopping/assets/')?>js/carousel_with_thumbs.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
		<script src="<?=site_url('themes/shopping/assets/')?>js/custom.js"></script>
		
		<script>	    
			$("#apply-coupon").click(function (e) {
			  e.preventDefault();
			  var coupon = $("#coupon-code").val();
			  if (coupon != "" && coupon != "undefined") {
				$.post(site_url + "coupons/apply_coupon", { coupon: coupon }, function (
				  data
				) {
					// alert(data);
				  var obj = jQuery.parseJSON(data);
				  //{"discount":999,"discount_html":999,"coupon":"SALE40","total":"8,991"}
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
			// 	alert(val)
			});
			var perMM = "<?=@$post['products_price_per_mm']?>";
			perMM = Number(perMMPrice);
			
			$.getScript('<?=site_url('themes/shopping/assets/load.js')?>');
			
			$('.add_New_Custom').click(function(){
				var rand =  Math.floor((Math.random() * 100000) + 1);
				console.log(rand);
				$('.add_New_Custom_Here').append('<tr id="thisIs'+rand+'"><td><span>Custom Size <a href="javascript:;" class="badge badge-danger remove_Custom" data-id="#thisIs'+rand+'">Remove</a><div class="input-group mb-3 mt-2" style="width: 165px;"><input type="text" min="50" class="form-control minmax prcChange" id="prcLength'+rand+'" placeholder="Length" name="length[]" style="width: 100px;" data-rand="'+rand+'" data-cl=".erMsg'+rand+'"><div class="input-group-append"><select name="measure[]" class="prcChange" id="prcMeasure'+rand+'" data-rand="'+rand+'"><option value="mm">mm</option><option value="Meter">Meter</option></select></div></div><label class="erMsg'+rand+' text-danger"></label></span> </td><td style="padding-top: 2.5rem!important">£ <span id="prcOutput'+rand+'">0.00</span></td><td style="padding-top: 2.0rem!important"><input type="text" min="0" value="0" data-rand="'+rand+'" style="width: 55px;" class="form-control prcChange numberPrc" name="custom[]" id="prcQty'+rand+'"></td></tr>')
				$('script').each(function() {
					if (this.src === '<?=site_url('themes/shopping/assets/load.js')?>') {
						this.parentNode.removeChild( this );
					}
				});
				$.getScript('<?=site_url('themes/shopping/assets/load.js')?>');
			})
			if(page === 'detail'){
				setInterval(function(){
					$('script').each(function() {
						if (this.src === '<?=site_url('themes/shopping/assets/load.js')?>') {
							this.parentNode.removeChild( this );
						}
					});
					$.getScript('<?=site_url('themes/shopping/assets/load.js')?>');
				}, 2000)
			}
		</script>

		<script>
			function login(url){
			$.confirm({
				title: 'Confirm!',
					content: 'Please Login, for Add to wishlist.',
						buttons: {
							Login: function () {
								location.href = url;
							},
							Ok: function () {
								
							},
						}
					});
				}
			<?=getScript()?>
		</script>