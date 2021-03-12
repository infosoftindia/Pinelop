	<div class="card">
		<div class="card-body">
			<p><b>Name</b>: <?=$vendor['users_first_name'].' '.$vendor['users_last_name']?></p>
			<p><b>Email</b>: <?=$vendor['users_email']?></p>
			<p><b>Phone</b>: <?=$vendor['users_mobile']?></p>
			<p><b>Status</b>: <?=($vendor['users_status'] == '0') ? 'Inactive':'Active' ?></p>
			<?php if($vendor['users_address']) { ?>
			<p><b>Address</b>: <?=$vendor['users_address']?></p>
			<?php } ?>
		</div>
	</div>