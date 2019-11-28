<?php 
class CtrlAccueil extends Controller {
	public function index() {
		$this->loadDao('User');
		$this->loadDao('Article');

if (isset($_SESSION['id'])) {
		$d['user'] = $this->DaoUser->read($_SESSION['id']);
	}
		$d['article'] = $this->DaoArticle->readAll();

		$this->set($d);		
		$this->render('Accueil','index');
	}

}
