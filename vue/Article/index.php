<main id="article">
	<h2>Notre sélection d'articles</h2>

	<section>
		<?php
		// Message de bienvenue nominatif, pour l'utilisateur connecté
		if (isset($user)) {
			echo '<h2>Bienvenue ' . $user->getFirstName() . ' ' . $user->getLastName() . '</h2>';
		}
		if (isset($log)) {
			echo $log;
		}
		// conditions d'affichage selon tarification
		if (isset($tarif)) {
			echo $tarif;
			// condition d'affichage selon le type de saison
		} elseif (isset($collec)) {
			echo $collec;
		}
		// Affichage des articles avec informations, selon leur catégorie
		if (isset($articles)) {
			foreach ($articles as $key => $article) {
				echo '<article>';
				echo '<div class="container col my-5"><div class="row my-3">';
				echo '<div class="card mx-auto" style="width: 20rem;">';
				echo '<h4 class="title text-center">' . $article->getDesignation() . '</h4><br>';
				echo '<img class="card-img-top" name="articleImg" src="' . WEBROOT . 'img/' . $article->getImage() . '" alt="Modèle de chaussures">';
				echo '<p class="card-text">' . $article->getDescription() . '</p>';
				echo '<i card-subtitle mb-2 text-muted >' . $article->getColoris() . '</i>';
				echo '<h4 class="title text-right" id="prix">' . $article->getPrix() . '&euro;' . '</h4>';
				echo '<input type="hidden" name="articleId" value="' . $article->getId() . '">';
				echo '<button class="btn btn-primary">Ajouter au panier</button>';
				echo '</div></div></div>';
				echo '</article>';
			}
		}
		?>
	</section>
</main>