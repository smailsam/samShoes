<?php 
class CtrlPanier extends Controller {
	public function index() {
		$this->loadDao('User');
		$this->loadDao('Panier');
		$this->loadDao('Article');

	if (isset($_SESSION['id'])) {
		$d['user'] = $this->DaoUser->read($_SESSION['id']);
		$d['panier'] = $this->DaoPanier->readAllByPanier($id);
	} else {	
		$d['vide'] = 'Votre panier est vide !';

	}
		$this->set($d);		
		$this->render('Panier','index');
}

	public function readAll() {
		$this->loadDao('Panier');
		$this->loadDao('User');
		$this->loadDao('Article');

	if (isset($_SESSION['id'])) {
		$d['user'] = $this->DaoUser->read($_SESSION['id']);	
		$d['panier'] = $this->DaoPanier->readAllByPanier();
		$d['article'] = $this->DaoArticle->readAll();

		$this->set($d);
		$this->render('Panier','index');
	}
	 else {
		header('Location:'.WEBROOT.'Accueil/index');	
	}
}

	public function create() {
		$this->loadDao('Panier');
		$this->loadDao('User');

	if (isset($_SESSION['id'])) {
		$d['user'] = $this->DaoUser->read($_SESSION['id']);	

		$panier = new Panier($this->input['ajouter']);
			$this->DaoPanier->create($panier);
			$this->set($d);
			$this->render('Article','index');
		}

	}

	public function deletePanier() {
		$this->loadDao('Panier');
		$this->loadDao('User');

		$this->set($d);
		header('Location: '.WEBROOT.'Accueil/index');	
		}

	public function updatePanier() {
		$this->loadDao('Article');
		$this->loadDao('User');

	if (isset($_SESSION['id'])) {
		$d['user'] = $this->DaoUser->readByEmail($_SESSION['id']);
		$d['articles'] = $this->DaoArticle->addPanier();
		
		$dossier = ROOT.'img/';
		$fichier = basename($this->files['image']['name']);
		move_uploaded_file($this->files['image']['tmp_name'], $dossier . $fichier);

		$newArticle = new Article($this->input['designation'],
								  $this->input['prix'],
								  $this->input['image'],
								  $this->input['coloris'],
								  $this->input['description'],
								  $this->input['pointure'],
								  $this->input['stock'],
								  0);
		$this->DaoArticle->create($newArticle);
	}
		$d['user'] = $user;
		$d['articles'] = $article;
		$d['panier'] = 'Ajouté au panier';

		$this->set($d);
		$this->render('Article','index');
	}
}
