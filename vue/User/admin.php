<main id="admin">
	<section>
		<h3>Accès administrateur</h3>
		<?php
		if (isset($user)) {
			echo '<h2>Bienvenue ' . $user->getFirstName() . ' ' . $user->getLastName() . '</h2>';
		}
		?>
		<article>
			<h4>Votre page de gestion de contenu</h4>
			<form action="<?php echo WEBROOT ?>User/admin" method="POST">
				<th type="select">
					<tr></tr>
				</th>
			</form>
		</article>
	</section>
</main>