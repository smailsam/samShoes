<main id="profil">
	<section>
		<h2 class="title text-center my-2">Page profil: consulter, compléter ou modifier</h2>
		<?php
		if (isset($user)) {
			echo '<div class="container my-3"><div class="jumbotron">';
			echo '<div class="form-row">';
			echo '<div class="col"><legend>Nom :  ' . $user->getFirstName() . '</legend></div>';
			echo '<div class="col"><legend>Prénom : ' . $user->getLastName() . '</legend></div>';
			echo '<div class="col"><legend>Téléphone : ' . $user->getTelephone() . '</legend></div>';
			echo '<legend>Adresse postale : ' . $user->getAddress() . '</legend></div>';
			echo '<div class="col"><legend>Date de naissance : ' . $user->getBirthday() . '</legend></div></div></div>';
		}

		if (isset($log)) {
			echo $log;
		}
		?>
	</section>

	<section>
		<h4>Finir l'inscription ou mettre à jour</h4>
		<div class="container my-2">
			<div class="jumbotron">
				<div class="title text-center">
				</div>
				<form id="userUpdate" action="<?php echo WEBROOT ?>User/update" method="POST">
					<div id="idInfo">
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Mot de passe</label>
							<input type="password" name="mdp" class="form-control" id="exampleInputPassword1" placeholder="Votre mot de passe">
						</div>
						<div class="form-group">
							<label for="exampleInputNumber">Téléphone</label>
							<input type="varchar" name="telephone" class="form-control" id="exampleInputNumber" placeholder="Votre numéro de téléphone ">
						</div>
						<div class="form-group">
							<label for="exampleInputAddress">Adresse</label>
							<input type="varchar" name="adresse" class="form-control" id="exampleInputAddress" placeholder="Votre adresse postale">
						</div>
						<div class="form-group">
							<label for="exampleInputDate">Date de naissance</label>
							<input type="date" name="anniversaire" class="form-control" id="exampleInputDate" placeholder="Votre date de naissance ">
						</div>
						<hr class="my-4">
						</hr>
						<button type="submit" class="btn btn-primary">Valider</button>
				</form>
			</div>
		</div>
	</section>
</main>