<?php
// ----------- PHASE 1 : creation d'objet ----------- //
 // Déclaration de l'objet Article avec héritage (copier/coller) de la classe abstraite AbstractEntity
class Panier extends AbstractEntity {
	// Déclaration des attributs
	private $fk_user;
	private $fk_article;
	private $quantite; 
	private $archive;

	// Déclaration du constructeur avec ses arguments qui font références aux attributs
	public function __construct($fk_user,$fk_article) {
		// $this fait référence à l'instance de l'objet (new Objet()).
		$this->fk_user = $fk_user;
		$this->fk_article = $fk_article;
}
// get et set qté;
	public function getFk_user() {
		return $this->fk_user;
	}
	public function setFk_user($fk_user) {
		$this->fk_user = $fk_user;
	}

	public function getFk_article() {
		return $this->fk_article;
	}
	public function setFk_article($fk_article) {
		$this->fk_article = $fk_article;
	}

	public function getArchive() {
		return $this->archive;
	}
	public function setArchive($archive) {
		$this->archive = $archive;
	}

	public function setQuantite($quantite) {
		$this->quantite = $quantite;
	}
	public function getQuantite() {
		return $this->quantite;
	}

}
