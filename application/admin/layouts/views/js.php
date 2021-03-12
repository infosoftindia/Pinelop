

		<!-- jQuery first, then Tether, then other JS. -->
		<script src="<?=base_url()?>assets/js/jquery.js"></script>
		<script src="<?=base_url()?>assets/js/tether.min.js"></script>
		<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>assets/vendor/unifyMenu/unifyMenu.js"></script>
		<script src="<?=base_url()?>assets/vendor/onoffcanvas/onoffcanvas.js"></script>
		<script src="<?=base_url()?>assets/js/moment.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
		<script src="<?=base_url()?>assets/js/common.js"></script>
		
		<script src="<?=base_url()?>assets/multiselect/js/jquery.multi-select.js"></script>
		<script src="<?=base_url()?>assets/multiselect/js/jquery.quicksearch.js"></script>
		<script src="<?=base_url()?>assets/fselect/fSelect.js"></script>
		
		
		<!-- Sparkline JS -->
		<script src="<?=base_url()?>assets/vendor/sparkline/sparkline-retina.js"></script>
		<script src="<?=base_url()?>assets/vendor/sparkline/custom-sparkline.js"></script>

		<!-- Slimscroll JS -->
		<script src="<?=base_url()?>assets/vendor/slimscroll/slimscroll.min.js"></script>
		<script src="<?=base_url()?>assets/vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- C3 Graphs -->
		<script src="<?=base_url()?>assets/vendor/d3/d3.min.js"></script>
		<script src="<?=base_url()?>assets/vendor/c3/c3.min.js"></script>

		<!-- Chartist JS
		<script src="<?=base_url()?>assets/vendor/chartist/js/chartist.min.js"></script>
		<script src="<?=base_url()?>assets/vendor/chartist/js/chartist-tooltip.js"></script>
		<script src="<?=base_url()?>assets/vendor/chartist/js/custom/custom-line-chart3.js"></script>
		<script src="<?=base_url()?>assets/vendor/chartist/js/custom/custom-area-chart.js"></script>
		<script src="<?=base_url()?>assets/vendor/chartist/js/custom/donut-chart2.js"></script>
		<script src="<?=base_url()?>assets/vendor/chartist/js/custom/custom-line-chart4.js"></script> -->
		
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
		
		<script src="<?=base_url()?>assets/custom.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#data-table-p').DataTable({
					"ajax": '<?=site_url('products/json')?>'
				});
				$('#data-table').DataTable();
			});
			
			
			function deletes(url){
				$.confirm({
					title: 'Confirm!',
					content: 'Once you delete it, it can\'t be undo...! ',
					buttons: {
						Yes: function () {
							location.href = url;
						},
						No: function () {
							
						},
					}
				});
			}
			
			// $('.catChange').change({
				// var val = $(this).val();
				// $.post('', {cat:val}, function(html){
					// $('.here').append(html);
				// });
			// })
				$(function() {
					$('.catChange').change();
				});
				$('.catChange').change(function(e) {
					$('.here').html('');
					var selected = $(e.target).val();
					$('.hidethis').hide();
					$.each(selected, function( index, value ) {
						$('.cat'+value).show();
					});
					// $.post('<?=site_url('products/getField')?>', {cat:selected}, function(html){
						// $('.here').append(html);
					// });
				}); 
		</script>

