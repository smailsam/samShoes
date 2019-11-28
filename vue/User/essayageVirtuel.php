<main id="upload">
	<section>
	<h2>Tester l'essayage virtuel</h2>
		<?php
		if (isset($user)) {
			echo '<h2>Bienvenue ' . $user->getFirstName() . ' ' . $user->getLastName() . '</h2>';
			echo '<img src="' . WEBROOT . 'img/' . $user->getImage() . '">';
		}
		if (isset($log)) {
			echo $log;
		}
		?>
		<article>
			<ul>
				<li>Téléchargez votre photo</li>
				<li>Faîtes défiler les articles</li>
				<li>Ajoutez au panier</li>
			</ul>
		</article>
		<form action="<?php echo WEBROOT ?>User/upload" method="POST" enctype="multipart/form-data" id="monForm">
			<div class="form-group">
				<label for="exampleFormControlFile1">Télélcharger une photo</label>
				<input type="file" class="form-control-file" id="maPhoto">
			</div>
		</form>
	</section>
</main>