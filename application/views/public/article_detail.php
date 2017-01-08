<?php
include_once('public_header.php') ?>

<div id="container">

	<h1>
	<?= $article->title ?>
	</h1>
	<hr>
	<p>
		<?= $article->body ?>
	</p>
	<?php if(!is_null($article->image_path)): ?>
		<img src="<?= $article->image_path ?>" >
	<?php endif; ?>
</div>



<?php
include_once('public_footer.php') ?>