$('.number-plus').click(function(){
	$('.prcChange').change();
});

$('.prcChange').change(function(){
	var r = $(this).data('rand');
	var prcLength = Number($('#prcLength'+r).val());
	var prcQty = Number($('#prcQty'+r).val());
	var prcMeasure = $('#prcMeasure'+r).val();
	
	if(prcMeasure != 'mm'){
		prcLength = prcLength*1000;
	}
	console.log(prcLength);
	console.log(prcQty);
	console.log(prcMeasure);
	var price = (perMM*prcLength*1);
	console.log(price);
// 	$('.minmax').each(function(){
// 	    $(this).change();
// 	});
	$('#prcOutput'+r).html(price.toFixed(2));
});

$('.number-minus ').click(function(){
	$('.prcChange').change();
});


$('.remove_Custom').click(function(){
	var id = $(this).data('id');
	$(id).remove()
})

$(".numberPrc").number({
	'containerClass' : 'number-style',
	'minus' : 'number-minus',
	'plus' : 'number-plus',
	'containerTag' : 'div',
	'btnTag' : 'span'
});
$('.numberPrc').removeClass('numberPrc');

$('.minmax').change(function(){
    var val = $(this).val();
    var r = $(this).data('cl');
    if(val > 0){
        if(val < 50){
            $(r).html('Min 50 mm is required')
        }
        else if(val > 6000){
            $(r).html('Max 6000 mm is required')
        }else{
            $(r).html("");
        }
    }
});