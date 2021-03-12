	function readURL(input, output) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$(output).attr('src', e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}

	function readURLMultiple(input, output) {
		if (input.files) {
			$(output).html('');
			var count_file = input.files.length;
			$(".count_image").html(count_file+' files selected');
			var filesAmount = input.files.length;
			for (i = 0; i < filesAmount; i++) {
				var reader = new FileReader();
				reader.onload = function(event) {
					$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(output).addClass('col-md-4 col-lg-4 col-12 thumbnail-h-100');
				}
				reader.readAsDataURL(input.files[i]);
			}
		}
	}

	function show_Modal(url, output) {
		$.post(url, function(data){
			$(output).html(data);
		})
	}

	$('.delete').confirm({
		type: 'red',
		title: "Are you sure?",
		content: "Once deleted, you will not be able to undo it!",
		buttons: {
			tryAgain: {
				text: 'Yes',
				btnClass: 'btn-red',
				action: function(){
					location.href = this.$target.attr('href');
				}
			},
			No: function(){}
		}
	});

	$('.order_Status').change(function(){
		var value = $(this).val();
		var url = $(this).data('url');
		$.post(url, { value : value });
	});

	$('[data-href]').click(function(){
		var href = $(this).data('href');
		var title = $(this).data('title');
		$('#admin_model_title').html(title);
		$('#admin_model_body').html('');
		$.get(href, function(data){
			$('#admin_model_body').html(data);
		});
	});


	$('.widget_change_trigger').change(function(){
		var value = $(this).val();
		$.get(base_url+'widgets/get_partial', { partial : value }, function(data){
			$('#widget_container').html(data);
			$.getScript(base_url+'assets/custom.js');
		});
	});
	
	$('#banner_type_change_trigger').change(function(){
		// $.getScript(base_url+'assets/custom.js');
		var value = $(this).val();
		if (value == "p") {
			$('#banner_type_category').hide();
			$('#banner_type_product').show();
		} else if (value == "c") {
			$('#banner_type_category').show();
			$('#banner_type_product').hide();
		} else {
			$('#banner_type_category').hide();
			$('#banner_type_product').hide();
		}
	});

	(function($) {
		$(function() {
			window.fs_test = $('.selectF').fSelect({
				numDisplayed: 3,
				overflowText: '{n} selected',
				noResultsText: 'No results found',
				searchText: 'Search',
				showSearch: true
			});
		});
	})(jQuery);
	
	$('.multiselect').multiSelect({
		selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Search Here'>",
		selectionHeader:  "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Search Here'>",
		afterInit: function(ms){
			var that = this,
			$selectableSearch = that.$selectableUl.prev(),
			$selectionSearch = that.$selectionUl.prev(),
			selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
			selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';
			that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
			.on('keydown', function(e){
				if (e.which === 40){
					that.$selectableUl.focus();
					return false;
				}
			});
			that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
			.on('keydown', function(e){
				if (e.which == 40){
					that.$selectionUl.focus();
					return false;
				}
			});
		},
		afterSelect: function(){
			this.qs1.cache();
			this.qs2.cache();
		},
		afterDeselect: function(){
			this.qs1.cache();
			this.qs2.cache();
		}
	});
	
	function widgets_partials(){
		var $this = $('#widgets_partials');
		$this.attr('disabled', '');
		var partial = $this.val();
		var url = base_url + 'widgets/get_partials/' + partial;
		$.get(url, function(data){
			$('#widgets_partials_body').html(data);
			$this.removeAttr('disabled');
			$.getScript(base_url + 'assets/custom.js');
		})
	}

	$(function() {
		$('#widgets_partials').change(function(){
			widgets_partials();
		});
		$('#widgets_partials_change').click(function(){
			widgets_partials();
		});
		
		$('.ajaxForm').submit(function(e){
			e.preventDefault();
			$('button[type=submit]').attr('disabled', '');
			var url = $(this).attr('action');
			var form_Data = new FormData(this);
			$.ajax({
				type: "POST",
				url: url,
				data: form_Data,
				processData: false,
				contentType: false,
				cache: false,
				timeout: 600000,
				success: function (data) {
					if(data == 1){
						$('button[type=submit]').removeAttr('disabled', '');
						widgets_partials();
						$.alert({
							type: 'green',
							title: 'Success',
							content: 'Data has been saved!',
						});
					}
				}
			});
		});
	});

	var yearlyy = c3.generate({
		bindto: '#yearlyGraph',
		data: {
			columns: yearlyGraph,
			type : 'pie',
			colors: {
				Sales: '#179978',
				Instock: '#ef2f1a'
			},
			onclick: function (d, i) { console.log("onclick", d, i); },
			onmouseover: function (d, i) { console.log("onmouseover", d, i); },
			onmouseout: function (d, i) { console.log("onmouseout", d, i); }
		}
	});
	
	var monthlyy = c3.generate({
		bindto: '#monthlyGraph',
		padding: {
			top: 0,
			left: 30,
		},
		data: {
			x : 'x',
			columns: monthlyGraph,
			type: 'bar'
		},
		axis: {
			x: {
				type: 'category' // this needed to load string x value
			}
		},
	});
	
	var dailyy = c3.generate({
		bindto: '#dailyGraph',
		data: {
			x: 'x',
			columns: dailyGraph
		},
		axis: {
			x: {
				type: 'timeseries',
				tick: {
					format: '%Y-%m-%d'
				}
			}
		}
	});































