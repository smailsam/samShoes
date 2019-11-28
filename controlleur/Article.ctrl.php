<?php 
class CtrlArticle extends Controller {
	public function index() {
		$this->loadDao('Article');
		$this->loadDao('User');

	if (isset($_SESSION['id'])) {
		$d['user'] = $this->DaoUser->read($_SESSION['id']);
}	
		$d['articles'] = $this->DaoArticle->readAll();
	
		$this->set($d);
		$this->render('Article','index');	
	}
	public function create() {
		$this->loadDao('Article');
		$this->loadDao('User');

	if (isset($_SESSION['id'])) {
		$d['user'] = $this->DaoUser->readByEmail($_SESSION['id']);
		$d['articles'] = $this->DaoArticle->readAll();
	
		$dossier = ROOT.'img/';
		$fichier = basename($this->files['image']['name']);
		move_uploaded_file($this->files['image']['tmp_name'], $dossier.$fichier);

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
		$d['article'] = $article;

		$this->set($d);
		$this->render('Article','index');

}
	public function nouveautes() {
		$this->loadDao('Article');
		$this->loadDao('User');

	if (isset($_SESSION['id'])) {
		$d['user'] = $this->DaoUser->read($_SESSION['id']);
}	

		$d['articles'] = $this->DaoArticle->readAllByTarif(1);
		$d['tarif'] = 'Craquer pour les nouveautés';
		$this->set($d);
		$this->render('Article','index');
	}

	public function promos() {
		$this->loadDao('Article');
		$this->loadDao('User');

	if (isset($_SESSION['id'])) {
		$d['user'] = $this->DaoUser->read($_SESSION['id']);
}	
		$d['articles'] = $this->DaoArticle->readAllByTarif(2);
		$d['tarif'] = 'Les irresistibles promos';

		$this->set($d);
		$this->render('Article','index');
	}
	
	public function ete() {
		$this->loadDao('Article');
		$this->loadDao('User');

	if (isset($_SESSION['id'])) {
		$d['user'] = $this->DaoUser->read($_SESSION['id']);
}	
		$d['articles'] = $this->DaoArticle->readAllByCollec(1);
		$d['collec'] = 'Retrouvez ici la sélection de tous nos modèles d\'été';

		$this->set($d);
		$this->render('Article','index');
	}

	public function hiver() {
		$this->loadDao('Article');
		$this->loadDao('User');

	if (isset($_SESSION['id'])) {
		$d['user'] = $this->DaoUser->read($_SESSION['id']);
}	
		$d['articles'] = $this->DaoArticle->readAllByCollec(2);
		$d['collec'] = 'Retrouvez ici la sélection de tous nos modèles d\'hiver';

		$this->set($d);
		$this->render('Article','index');
	}
}
