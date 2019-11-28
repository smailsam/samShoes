<?php
// ----------- INIT 2 : creation du super Controleur ----------- //
class Controller
{
	public $input;
	public $files;
	var $vars = array();

	public function __construct()
	{
		// Si le controlleur reçois un $_POST
		if (isset($_POST)) {
			// Affectation de $_POST à l'attribut $input
			$this->input = $_POST;
		}
		if (isset($_FILES)) {
			$this->files = $_FILES;
		}
	}

	function loadDao($name)
	{
		require_once('dao/' . $name . '.dao.php');
		$daoClass = 'Dao' . $name;
		$this->$daoClass = new $daoClass();
	}

	function set($d)
	{
		$this->vars = array_merge($this->vars, $d);
	}

	// Declaration de la fonction render qui permet d'afficher la vue (et save l'url)
	function render($controller, $viewFile, $param = null)
	{
		// Extraction de $vars
		// permet le passage de $d['maVar'] = value (côté controlleur) à $maVar = value (côté vue)
		extract($this->vars);
		// Démarrage de la mémoire tempon
		ob_start();
		require_once('vue/' . $controller . '/' . $viewFile . '.php');
		// Vide la mémoire tempon et affecte le contenue dans $content
		$content = ob_get_clean();

		echo $content;
		// Execution de saveUrl 
		$this->saveUrl($controller, $viewFile, $param);
	}

	function saveUrl($ctrl, $vue, $param = null)
	{
		// Affectation a la variable de session url, l'url à sauvegarder
		$_SESSION['url'] = $ctrl . '/' . $vue . '/' . $param;
	}
}
