<?php 	if (Flasher::hasMessage()) : ?>
	<div class="col-xs-12" id="flash-messages">
		<?php 	foreach(Flasher::TYPES as $type) : ?>
			<?php	if (Flasher::has($type)) : ?>
						<div class="col-xs-12 col-md-8 col-md-offset-2">
							<div class="col-xs-12 alert alert-<?= $type; ?>" role="alert">
								<?= Flasher::get($type); ?>
							</div>
						</div>
			<?php 	endif ?>
		<?php	endforeach ?>
	</div>
<?php 	endif ?>
