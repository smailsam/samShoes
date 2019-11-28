<main id="panier">
	<section>
		<h2>Votre panier</h2>
		<?php
		if (isset($user)) {
			echo '<h3>Vos articles sélectionnés, ' . ' ' . $user->getFirstName() . ' ' . $user->getLastName() . '</h3>';
		}
		if (isset($donnes)) {
			foreach ($donnees as $key => $donnee) {
				echo '<section class="container">';
				echo '<article class="well form-inline pull-right col-lg-10">';
				echo '<legend>Contenu du panier</legend>';
				echo '<table id="tableau" class="table">';
				echo '<thead><tr>';
				echo '<th><img src="' . WEBROOT . 'img/' . $article->getImage() . ' id="image"></th>';
				echo '<th>Code</th>';
				echo '<th>Qte</th>';
				echo '<th>' . $article->getPrix() . '</th>';
				echo '<th>Prix de la ligne</th>';
				echo '<th>Supprimer</th></tr></thead>';
				echo '</table><br>';
				echo '<label>Prix du panier total</label> : <label id = "prixTotal"> € </label>';
				echo '<label id = "nbreLignes" hidden>0</label>';
				echo '<button type="button" class="btn btn-danger"' . WEBROOT .'User/by>Commander</button>';
				echo '<button type="button" name="delete" id="deleteArt"' . $article->getId() . '>Supprimer</button>';
				echo '<button type="button" class="selected"' . $article->getId() . '>Supprimer</button>';
				echo '</article></section>';
			}
		} else {
			if (isset($vide)) {
				echo '<section>';
				echo '<h4>' . $vide . '</h4><br>';
				echo '<p>Vous devez d\'abord créer un compte, sélectionner des articles afin de visualiser votre panier et de commander.</p>';
				echo '</section>';
			}
		}

		?>
	</section>
</main>