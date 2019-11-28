<?php
// Déclaration de l'objet "controleur" qui hérite du "super contrôleur" Controller
class CtrlUser extends Controller
{
	// méthode de l'action index
	public function index()
	{
		// Chargement de la DaoUser
		$this->loadDao('User');

		// Si la variable de session id éxiste (utilisateur connecté)
		if (isset($_SESSION['id'])) {
			// affectation à la variable "user" du résultat du "read" de la DaoUser en fonction de la session id
			$d['user'] = $this->DaoUser->read($_SESSION['id']);
			// Envoie des données
			$this->set($d);
			$this->render('User', 'profil');
			//	header('Location: '.WEBROOT.'User/profil');
		} else {
			// redirection vers User/index 
			$this->render('User', 'index');
		}
	}

	public function signIn()
	{
		// Chargement de la DaoUser
		$this->loadDao('User');
		// Si l'action reçois des données et que l'email fournit n'est pas dans la bdd 
		// (via l'utilisation de readByEmail de la DaoUser)
		if (!empty($this->input) && $this->DaoUser->readByEmail($this->input['email']) == null) {
			// Creation d'un salt de cryptage
			$salt = "2nE@5e!8";
			// Cryptage du mot de passe
			$password = sha1($this->input['mdp'] . $salt);

			// Creation d'un objet User avec les données reçues du formulaire
			$user = new User($this->input['nom'], $this->input['prenom'], $this->input['email'], $password);

			// Ajout de l'objet $newUser à la bdd via le create de la DaoUser
			$newUser = $this->DaoUser->create($user);

			// Si l'id de $newUser n'est pas vide
			if ($newUser->getId() != "") {
				// Initialisation des variables de session
				// (connexion de l'utilisateur)
				$_SESSION['id'] = $newUser->getId();
				$_SESSION['nom'] = $newUser->getFirstName();
				$_SESSION['prenom'] = $newUser->getLastName();

				$d['log'] = "Inscription réussie";
				$this->set($d);
				$this->render('User', 'profil');
				//	header('Location: '.WEBROOT.'User/index');
			} else {
				$d['log'] = "Echec de l'inscription dans la BDD";
				$this->set($d);
				$this->render('User', 'index');
			}
		} else {
			$d['log'] = "Email déjà inscrit ou formulaire d'inscription vide";
			$this->set($d);
			$this->render('User', 'index');
		}
	}

	public function update()
	{
		$this->loadDao('User');

		$user = $this->DaoUser->read($_SESSION['id']);

		if (!empty($this->input['email'])) {
			$user->setEmail($this->input['email']);
		}

		if (!empty($this->input['mdp'])) {
			$user->setPassword($this->input['mdp']);
		}

		if (!empty($this->input['adresse'])) {
			$user->setAddress($this->input['adresse']);
		}

		if (!empty($this->input['telephone'])) {
			$user->setTelephone($this->input['telephone']);
		}

		if (!empty($this->input['anniversaire'])) {
			$user->setBirthday($this->input['anniversaire']);
		}

		$this->DaoUser->update($user);
		//	$d['user'] = $user;
		//	$this->set($d);

		$this->render('User', 'index');
	}


	public function delete($id)
	{
		$this->loadDao('User');
		$d['log'] = "Votre compte a bien été supprimé";

		$this->set($d);
		header('Location: ' . WEBROOT . 'Accueil/index');
	}

	public function profil($user)
	{
		$this->loadDao('User');
		if (isset($_SESSION['id'])) {

			$d['user'] = $this->DaoUser->read($_SESSION['id']);
			$this->set($d);
		}
		$this->render('User', 'profil');
	}

	public function login()
	{
		$this->loadDao('User');

		// Si le champ email n'est pas vide 
		if (!empty($this->input['email'])) {

			// Récupération de l'objet $user retourné par le readByEmail de la daoUser
			$user = $this->DaoUser->readByEmail($this->input['email']);

			// Si l'objet $user n'est pas null
			if ($user != null) {
				// Encryptage mot de passe
				$salt = "2nE@5e!8";
				$passUser = sha1($this->input['mdp'] . $salt);
				$passBdd = $user->getPassword();

				// Si les mots de passes sont identiques
				if ($passUser == $passBdd) {
					// Initialisation des variables de sessions

					$_SESSION['id'] = $user->getId();
					$_SESSION['nom'] = $user->getFirstName();
					$_SESSION['prenom'] = $user->getLastName();

					$d['user'] = $this->DaoUser->read($user->getId());
					$this->set($d);

					header('Location: ' . WEBROOT . 'Accueil/index');
				} else {
					$d['log'] = "Mot de passe incorrect";
					$this->set($d);
					$this->render('User', 'index');
				}
			} else {
				$d['log'] = "Email incorrect";
				$this->set($d);
				$this->render('User', 'index');
			}
		}
	}
	
	public function logOut()
	{
		// Vide la variable de session
		session_unset();
		// destruction de la variable de session
		session_destroy();
		header('Location: ' . WEBROOT . 'Accueil/index');
	}

	// Fonction pour télécharger une photo en mode essayage virtuel
	public function upload()
	{
		$this->loadDao('User');
		$this->loadDao('Article');

		if ($user = $this->DaoUser->read($_SESSION) !== null) {

			$dossier = ROOT . 'img/';
			if ($fichier = basename($this->files['image']['name']) !== null);
			move_uploaded_file($this->files['image']['tmp_name'], $dossier . $fichier);

			/*		$this->log = "upload OK";
		} else {
		$this->log = "upload KO"; */

			$this->DaoUser->upload();
			$d['user'] = $user;
			//	$d['log'] = $log;
			$this->set($d);
			$this->render('User','upload');

		//	header('Location: ' . WEBROOT . 'User/upload');
		}
	}
	public function super_admin($user)
	{
		$this->loadDao('User');

		// Si le champ email n'est pas vide 
		if (!empty($this->input['email'])) {

			// Récupération de l'objet $user retourné par le readByEmail de la daoUser
			$user = $this->DaoUser->readByEmail($this->input['email']);

			// Si l'objet $user n'est pas null
			if ($user != null) {
				// Encryptage du mot de passe 	
				$passUser = sha1($this->input['mdp']);
				$passBdd = $user->getPassword();

				$this->render('User', 'admin');
			} else {
				$d['log'] = "Mot de passe incorrect";
				$this->set($d);
				$this->render('User', 'login');
			}
		} else {
			$d['log'] = "Email incorrect";
			$this->set($d);
			$this->render('User', 'login');
		}
	}


	public function admin($user)
	{
		$this->loadDao('User');

		// Si le champ email n'est pas vide 
		if (!empty($this->input['email'])) {

			// Récupération de l'objet $user retourné par le readByEmail de la daoUser
			$user = $this->DaoUser->readByEmail($this->input['email']);

			// Si l'objet $user n'est pas null
			if ($user != null) {
				// Encryptage du mot de passe 	
				$passUser = sha1($this->input['mdp']);
				$passBdd = $user->getPassword();

				$this->render('User', 'admin');
			} else {
				$d['log'] = "Mot de passe incorrect";
				$this->set($d);
				$this->render('User', 'login');
			}
		} else {
			$d['log'] = "Email incorrect";
			$this->set($d);
			$this->render('User', 'login');
		}
	}
}
