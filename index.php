<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, shrink-to-fit=0">
	<title>Sam Shoes</title>
	<?php
	define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
	define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
	?>
	<link rel="stylesheet" href="<?php echo WEBROOT ?>css/style.css">
	<link rel="stylesheet" href="<?php echo WEBROOT ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo WEBROOT ?>css/bootstrap.grid.css">
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-sm navbar-light">
			<a class="navbar-brand" href="<?php echo WEBROOT ?>Accueil/index"><img src="<?php echo WEBROOT ?>img/logo.jpg" alt="Le logo de Sam Shoes"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto my-auto">
					<li class="nav-item offset-md-1">
						<a class="nav-link" href="<?php echo WEBROOT ?>Article/nouveautes">Nouveautés<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item offset-md-1">
						<a class="nav-link" href="<?php echo WEBROOT ?>Article/promos">Promos</a>
					</li>
					<li class="nav-item dropdown offset-md-1">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Saison
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?php echo WEBROOT ?>Article/ete">Eté</a>
							<a class="dropdown-item" href="<?php echo WEBROOT ?>Article/hiver">Hiver</a>
						</div>
					</li>
					<li class="nav-item offset-md-2">
						<a class="nav-link" href="<?php echo WEBROOT ?>User/index">Compte</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Recherche">
					<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Recherche</button>
				</form>
			</div>
		</nav>

		<button type="button" class="btn btn-secondary col-md-2 offset-md-10" data-toggle="modal" data-target="#exampleModal">
			Mon panier
		</button>

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Contenu du panier</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="panier" action="" method="post">
							<input type="hidden" class="btn btn-primary" name="count">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
						<button type="button" class="btn btn-primary">Confirmer</button>
					</div>
				</div>
			</div>
		</div>

	</header>
		
			<?php
			if (isset($_SESSION['id'])) {
				echo '<div class="btnClientConnect"><a href="' . WEBROOT . 'User/logOut"><button class="btn btn-danger col-sm-2 offset-md-1">Déconexion</button></a></div>';
				echo '<div class="btnEssayageVirtuel"><a href="' . WEBROOT . 'User/upload"><button class="btn btn-success col-sm-2 offset-md-5 ">Essayage</button></a></div>';
			}

			require_once('core/bdd.php');
			require_once('core/controller.php');
			require_once('core/abstractEntity.php');

			if (isset($_GET['p'])) {
				if ($_GET['p'] == "") {
					$_GET['p'] = "Accueil/index";
				}

				$tabControlleur = array("Panier", "Article", "Accueil", "User", "Pages");
				$param = explode("/", $_GET['p']);

				if (in_array($param[0], $tabControlleur)) {
					$controller = $param[0];
					if (isset($param[1])) {
						$action = $param[1];
					} else {
						$action = 'index';
					}
					require_once('controlleur/' . $controller . '.ctrl.php');
					$controller = 'Ctrl' . $controller;
					$controller = new $controller();

					if (method_exists($controller, $action)) {
						unset($param[0]);
						unset($param[1]);
						call_user_func_array(array($controller, $action), $param);
					} else {
						echo "Pages/p404";
					}
				}
			}
			?>

	<footer>
		<nav class="navbar footer">
			<a class="navbar-brand" href="<?php echo WEBROOT ?>Pages/contactForm">Contact</a>
			<a class="navbar-brand" href="<?php echo WEBROOT ?>Pages/infoPaiement">Paiement</a>
			<p>Sam Shoes &copy; 2019</p>
			<a class="navbar-brand" href="<?php echo WEBROOT ?>Pages/infoLivraison">Livraison</a>
			<a class="navbar-brand" href="<?php echo WEBROOT ?>Pages/cgv">CGV</a>
		</nav>
	</footer>

	<script src="<?= WEBROOT ?>js/script.js"></script>
	<script src="<?= WEBROOT ?>js/panier.js"></script>
	<script src="<?= WEBROOT ?>js/ajax.js"></script>

	<script>
		var url = "<?php echo $_SESSION['url'] ?>";
	</script>
	<script>
		window.onload = changeUrl(url);
	</script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>