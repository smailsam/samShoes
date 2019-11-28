<main id="user">
	<section>
		<h3 class="title text-center my-4">Espace de connexion ou inscription</h3>
		<?php
		if (isset($user)) {
			echo '<h2>Bienvenue ' . $user->getFirstName() . ' ' . $user->getLastName() . '</h2>';
		} else {
			if (isset($log)) {
				echo $log;
			}
		}
		?>

		<div class="container" id="idInfo">
			<div class="row">
				<div class="jumbotron row-md-5 my-1 mx-auto">
					<fieldset class="title text-center">Connexion</fieldset>
					<form id="userLog" action="<?php echo WEBROOT ?>User/login" method="POST">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Email</label>
								<input type="email" class="form-control" id="adEmail" name="email" placeholder="Email">
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4">Mot de passe</label>
								<input type="password" class="form-control" id="pwd" name="mdp" placeholder="Votre mot de passe">
							</div>
							<button type="submit" class="btn btn-primary">Valider</button>
						</div>
				</div>
			</div>
				<div class="jumbotron row-md-6 my-1 mx-auto">
					<h4 class="title text-center">Inscription</h4>
					<form id="userSign" action="<?php echo WEBROOT ?>User/signIn" method="POST">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4" class="col-sm-3 col-form-label">Nom</label>
								<input type="text" class="form-control" id="firstname" name="nom" placeholder="Nom">
							</div>
							<div class="form-group col-md-6">
								<label for="inputEmail4 " class="col-sm-3 col-form-label">Prénom</label>
								<input type="text" class="form-control" id="lastname" name="prenom" placeholder="Prénom">
							</div>
							<div class="form-group col-md-6">
								<label for="inputEmail4">Email</label>
								<input type="email" class="form-control" id="adEmail" name="email" placeholder="Email">
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4">Mot de passe</label>
								<input type="password" class="form-control" id="pwd" name="mdp" placeholder="Votre mot de passe">
							</div>
							<div class="form-check">
								<p class="lead"><small class="form-text text-muted">Accépter les conditions générales d'utilisation.</small></p>
								<input type="checkbox" class="form-check-input" id="exampleCheck1">
								<label class="form-check-label" for="exampleCheck1">Valider</label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">S'inscrire</button>
				</div>
			</div>
		</div>
	</section>
</main>