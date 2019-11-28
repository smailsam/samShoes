<?php
// ----------- PHASE 1 : creation d' objet ----------- //
 // Déclaration de l'objet User avec héritage de la classe abstraite AbstractEntity
class User extends AbstractEntity {
	// Déclaration des attributs
	private $firstName;
	private $lastName;
	private $email;
	private $password;
	private $address;
	private $telephone;
	private $birthday;
	private $archive;
	private $type;

	// Déclaration du constructeur avec ses arguments qui font références aux attributs de la classe User
	public function __construct($firstName,$lastName,$email,$password) {
		// $this fait référence à l'instance de l'objet (new Objet()).
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->email = $email;
		$this->password = $password;	
	}

    // Getter (permet de lire un attibut)
	// Déclaration du getter pour le firstName
	public function getFirstName() {
		return $this->firstName;
	}
    // Setter (permet d' écrire un attribut)
	// Déclaration du setter pour le firstName
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	public function getLastName() {
		return $this->lastName;
	}

	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getAddress() {
		return $this->address;
	}
	public function setAddress($address) {
		$this->address = $address;
	}

	public function getTelephone() {
		return $this->telephone;
	}
	public function setTelephone($telephone) {
		$this->telephone = $telephone;

	}
	public function getBirthday() {
		return $this->birthday;
	}

	public function setBirthday($birthday) {
		$this->birthday = $birthday;
	}

	public function getArchive() {
		return $this->archive;
	}

	public function setArchive($archive) {
		$this->archive = $archive;
	}

	public function getType() {
		return $this->type;
	}

	public function setType($type) {
		$this->type = $type;
	}
}
