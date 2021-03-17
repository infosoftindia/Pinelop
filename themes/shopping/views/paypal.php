<form name="frm_customer_detail" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
    <input type='hidden' name='business' value='<?=getenv('PAYPAL_EMAIL')?>'>
    <input type='hidden' name='item_name' value='Pinelop: <?=date(getenv('DateFormat').' '.getenv('TimeFormat'))?>'> 
    <input type='hidden' name='item_number' value="<?=$order?>">
    <input type='hidden' name='amount' value='<?=$price?>'> 
    <input type='hidden' name='currency_code' value='<?=getenv('Base_Curr')?>'> 
    <input type='hidden' name='notify_url' value='<?=$CALLBACK_URL?>'>
    <input type='hidden' name='return' value='<?=$CALLBACK_URL?>'>
    <input type="hidden" name="cmd" value="_xclick"> 
    <input type="hidden" name="order" value="<?=$order?>">
    <div> <input type="submit" hidden class="btn-action" name="continue_payment" value="Continue Payment"> </div>
</form>
<script type="text/javascript">
	document.frm_customer_detail.submit();
</script>