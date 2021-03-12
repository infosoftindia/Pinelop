

<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta charset="UTF-8">
		<title>Invoice</title>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
		<link rel="stylesheet" href="./style.css">
		<style>
			body {
			}
			.container {
				min-height: 29.7cm;
			}
			.invoice {
				background: #fff;
				width: 100%;
				padding: 10px;
			}
			.logo {
				width: 3cm;
				margin-bottom: 20px;
			}
			.document-type {
				text-align: right;
				color: #444;
			}
			.conditions {
				font-size: 0.7em;
				color: #666;
			}
			.bottom-page {
				font-size: 0.7em;
			}
		</style>
	</head>
	<body>
		<!-- partial:index.partial.html -->
		<div class="container-fluid">
			<div class="invoice">
				<div class="row">
					<div class="col-7">
						<img src="<?=base_url('themes/shopping/assets/img/logo/logo.png')?>" class="logo">
					</div>
				</div>
				<br>
				<p>Date: <?=date('M d, Y', strtotime($order['orders_created_on']))?></p>
				<table style="width: 100%">
					<tr>
						<td valign="top">
							<p>
								<strong>Shipping Address</strong><br>
								<?=$order['orders_address_fname'].' '.$order['orders_address_lname']?><br>
								<?=(!empty($order['orders_address_company']))?$order['orders_address_company'].'<br>':''?>
								<?=$order['orders_address_add1']?><br>
								<?=(!empty($order['orders_address_add2']))?$order['orders_address_add2'].'<br>':''?>
								<?=$order['orders_address_city'].((!empty($order['orders_address_pin']))?' - '.$order['orders_address_pin']:'')?><br>
								<?=$order['orders_address_state']?><br>
								<?=$order['orders_address_country']?>
							</p>
						</td>
						<td style="float: right;" valign="top">
							<p>
								<strong>Billing Address</strong><br>
								<?=$order['users_first_name'].' '.$order['users_last_name']?><br>
								<?=(!empty($order['orders_address_company']))?$order['orders_address_company'].'<br>':''?>
								<?=$order['address_line4']?><br>
								<?=(!empty($order['address_line5']))?$order['address_line5'].'<br>':''?>
								<?=$order['address_line3'].((!empty($order['address_line6']))?' - '.$order['address_line6']:'')?><br>
								<?=$order['address_line2']?><br>
								<?=$order['address_line1']?>
							</p>
						</td>
					</tr>
				</table>
				<?php
				// print_r($order);
				?>
				<br>
				<br>
				<br>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Product</th>
							<th width="1">Quantity</th>
							<th class="text-right">Price</th>
							<th class="text-right">Total</th>
						</tr>
					</thead>
					<tbody>
					<?php $total = 0; $count = 1; if($order['products']){ foreach($order['products'] as $product){ ?>
						<tr>
							<td><?=$count++?></td>
							<td><?=$product['posts_title']?></td>
							<td><?=$product['order_products_quantity']?></td>
							<td class="text-right"><?=pPrice($product['order_products_price'])?></td>
							<td class="text-right"><?=pPrice($product['order_products_total'])?></td>
						</tr>
					<?php } } ?>
						<tr>
							<td colspan="3">&nbsp;</td>
							<td class="text-right"><b>Sub Total</b></td>
							<td class="text-right"><?=pPrice($order['orders_total'])?></td>
						</tr>
						<tr>
							<td colspan="3">&nbsp;</td>
							<td class="text-right"><b>Discount</td>
							<td class="text-right"><?=pPrice($order['orders_discount'])?></td>
						</tr>
						<tr>
							<td colspan="3">&nbsp;</td>
							<td class="text-right"><b>Total</b></td>
							<td class="text-right"><?=pPrice($order['orders_final_amount'])?></td>
						</tr>
					</tbody>
				</table>
				<br>
				<table class="table table-sm text-right">
				</table>
			</div>
		</div>
		<!-- partial -->
	</body>
</html>

