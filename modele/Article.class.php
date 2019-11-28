<?php
// ----------- PHASE 1 : creation d'objet ----------- //
// Déclaration de l'objet Article avec héritage (copier/coller) de la classe abstraite AbstractEntity
class Article extends AbstractEntity
{
	// Déclaration des attributs
	private $designation;
	private $prix;
	private $image;
	private $description;
	private $coloris;
	private $pointure;
	private $stock;
	private $archive;
	private $fk_collection;
	private $fk_tarification;

	// Déclaration du constructeur avec ses arguments qui font références aux attributs
	public function __construct($designation, $prix, $image, $description, $coloris, $pointure, $stock)
	{
		// $this fait référence à l'instance de l'objet (new Objet()).
		$this->designation = $designation;
		$this->prix = $prix;
		$this->image = $image;
		$this->description = $description;
		$this->coloris = $coloris;
		$this->pointure = $pointure;
		$this->stock = $stock;
	}

	public function getId()
	{
		return $this->id;
	}
	// Getter (permet de lire un attibut)
	// Déclaration du getter pour le designation
	public function getDesignation()
	{
		return $this->designation;
	}
	public function setDesignation($designation)
	{
		$this->designation = $designation;
	}

	public function getPrix()
	{
		return $this->prix;
	}
	public function setPrix($prix)
	{
		$this->prix = $prix;
	}

	public function getImage()
	{
		return $this->image;
	}
	public function setImage($image)
	{
		$this->image = $image;
	}
	public function getDescription()
	{
		return $this->description;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}
	public function getColoris()
	{
		return $this->coloris;
	}
	public function setColoris($coloris)
	{
		$this->coloris = $coloris;
	}
	public function getPointure()
	{
		return $this->pointure;
	}
	public function setPointure($pointure)
	{
		$this->pointure = $pointure;
	}
	public function getStock()
	{
		return $this->stock;
	}
	public function setStock($stock)
	{
		$this->stock = $stock;
	}
	public function getArchive()
	{
		return $this->archive;
	}
	public function setArchive($archive)
	{
		$this->archive = $archive;
	}
	public function getFk_collection()
	{
		return $this->fk_collection;
	}
	public function setFk_collection($fk_collection)
	{
		$this->fk_collection = $fk_collection;
	}
	public function getFk_tarification()
	{
		return $this->fk_tarification;
	}
	public function setFk_tarification($fk_tarification)
	{
		$this->fk_tarification = $fk_tarification;
	}
}
