	<div class="card">
		<div class="card-body">
			<p><b>Name</b>: <?= $user['users_first_name'] . ' ' . $user['users_last_name'] ?></p>
			<p><b>Email</b>: <?= $user['users_email'] ?></p>
			<p><b>Phone</b>: <?= $user['users_mobile'] ?></p>
			<p><b>Status</b>: <?= ($user['users_status'] == '0') ? 'Inactive' : 'Active' ?></p>
			<p><b>Carts</b>:</p>
			<?php if ($user['carts']) {
				$index = 1;
				foreach ($user['carts'] as $cart) { ?>
					<p class="pl-3"><?= $index++ ?>. <?= $cart['posts_title'] ?> (<?= $cart['carts_quantity'] ?>) => <?= date('Y-M-d h:i:s a', strtotime($cart['carts_created'])) ?></p>
			<?php }
			} ?>
			<a href="<?= site_url('account?user=' . $user['users_id']) ?>" class="btn btn-info" target="_blank">View Profile</a>
		</div>
	</div>