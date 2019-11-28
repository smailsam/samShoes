<?php
// ----------- PHASE 1 : creation d'objet ----------- //
// Déclaration de l'objet Pages avec héritage (copier/coller) de la classe abstraite AbstractEntity
class Pages extends AbstractEntity
{
	// Déclaration des attributs
	private $contenu;

	// Déclaration du constructeur avec ses arguments qui font références aux attributs
	public function __construct($contenu)
	{
		// $this fait référence à l'instance de l'objet (new Objet()).
		$this->contenu = $contenu;
	}

	// Getter (permet de lire un attibut)
	// Déclaration du getter pour le contenu
	public function getContenu()
	{
		return $this->contenu;
	}
	// Setter (permet d'ecrire un attribut)
	// Déclaration du setter pour le contenu
	public function setContenu($contenu)
	{
		$this->contenu = $contenu;
	}
}
