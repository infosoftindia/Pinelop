
		$.ajaxSetup({
			complete: function() {
				// $.getScript(base_url+'themes/shopping/assets/js/shop.js');
			}
		});

		$(".remove_Cart").click(function(e){
			e.preventDefault();
			var url = $(this).data("href");
			$.get(url, function(){
				$.get(base_url+"shopping/cart", function(data){
					$(".mini_cart_wrapper").html(data);
					$.getScript(base_url+'themes/shopping/assets/js/shop.js');
				});
			});
		});

		$(".add_To_Wishlist").click(function(e){
			e.preventDefault();
			var $this = $(this);
			var url = $(this).data("href");
			$.get(url, function(data){
				if(data == 1){
					$this.css('color', 'red');
					$this.html('<i class="lni lni-heart-filled"></i>')
				}else{
					$this.css('color', 'none');
					$this.html('<i class="lni lni-heart"></i>')
				}
			});
		});

		$("._add_To_Wishlist").click(function(e){
			e.preventDefault();
			var $this = $(this);
			var url = $(this).data("href");
			$.get(url, function(data){
				if(data == 1){
					$this.html('- Remove from Wishlist');
				}else{
					$this.html('<i class="icon-heart"></i>');
				}
			});
		});
		
		$('#newPassword, #confirmPassword').change(function(){
			var newPassword = $('#newPassword').val();
			var confirmPassword = $('#confirmPassword').val();
			if(newPassword.length <= 6 || newPassword != confirmPassword){
				$('#btn-disable').attr('type', 'button');
				$('#confirmPassword').css('border-color', 'red');
				$('#helpText').html('New or Confirm Password is Invalid');
			}else{
				$('#confirmPassword').css('border-color', '#ddd');
				$('#helpText').html();
				$('#btn-disable').attr('type', 'submit');
			}
		});