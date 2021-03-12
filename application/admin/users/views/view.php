	<div class="card">
		<div class="card-body">
			<p><b>Name</b>: <?=$user['users_first_name'].' '.$user['users_last_name']?></p>
			<p><b>Email</b>: <?=$user['users_email']?></p>
			<p><b>Phone</b>: <?=$user['users_mobile']?></p>
			<p><b>Status</b>: <?=($user['users_status'] == '0') ? 'Inactive':'Active' ?></p>
		</div>
	</div>