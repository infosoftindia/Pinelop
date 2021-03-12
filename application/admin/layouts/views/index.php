
			<?=$header?>
			<!-- BEGIN .app-container -->
			<div class="app-container">
				<?=$sidebar?>
				<!-- BEGIN .app-main -->
				<div class="app-main">
					<?=$pagetitle?>
					<!-- BEGIN .main-content -->
					<div class="main-content">
						<?=alert('info', 'msg')?>
						<?=alert('danger', 'error')?>
						<?=alert('success', 'success')?>
						<?=alert('warning', 'warning')?>
						<?=$page?>
					</div>
				</div>
				<!-- END: .app-main -->
			</div>
			<!-- END: .app-container -->
		<?=$footer?>