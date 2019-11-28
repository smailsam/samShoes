<?php
// ----------- PHASE 2 : creation du DAO ----------- //
// charge le modèle lié à la DAO
require_once('modele/User.class.php');
// Déclaration de l'objet dao avec l'héritage du "super contrôleur" Controller
class DaoUser
{
	// Déclaration de méthode du dao avec l'objet $user en argument
	public function create($user)
	{

		DB::select(
			'INSERT INTO utilisateur (nom,prenom,email,mot_de_passe) VALUES (?,?,?,?)',
			array(
				$user->getFirstName(),
				$user->getLastName(),
				$user->getEmail(),
				$user->getPassword(),
				$user->getArchive(),
				$user->setId(DB::lastId())
			)
		);

		return $user;
	}

	public function read($user)
	{
		$donnees = DB::select('SELECT * FROM utilisateur WHERE id = ?', array($user));
		// Affectation à la variable $user de la nouvelle instance de l'objet User avec en paramètre les données venant de la BDD.
		if (!empty($donnees)) {
			foreach ($donnees as $key => $donnee) {
				$user = new User($donnee['nom'], $donnee['prenom'], $donnee['email'], $donnee['mot_de_passe'], $donnee['telephone'], $donnee['adresse'], $donnee['anniversaire']);
				$user->setId($donnee['id']);
				return $user;
			}
		} else {
			return null;
		}
	}

	public function readByEmail($email)
	{
		$donnees = DB::select('SELECT * FROM utilisateur WHERE email = ? AND archive = 0', array($email));

		if (!empty($donnees)) {
			foreach ($donnees as $key => $donnee) {
				$user = new User($donnee['nom'], $donnee['prenom'], $donnee['email'], $donnee['mot_de_passe']);
				$user->setId($donnee['id']);
			}
			return $user;
		} else {
			return null;
		}
	}

	public function update($user)
	{
		DB::select(
			'UPDATE utilisateur SET nom = ?, prenom = ?, email = ?, mot_de_passe = ?, adresse = ?, telephone = ?, anniversaire = ?, id = ?, WHERE archive = 0 AND role = `utilisateur`',
			array(
				$user->getFirstName(),
				$user->getLastName(),
				$user->getEmail(),
				$user->getPassword(),
				$user->getAddress(),
				$user->getTelephone(),
				$user->getBirthday(),
				$user->getType(),
				$user->getId()
			)
		);
	}

	public function delete($id)
	{
		DB::select('UPDATE utilisateur SET archive = 1 WHERE id = ?', array($id));
	}

	public function superAdmin($user)
	{
		DB::select('SELECT * FROM utilisateur WHERE id = 1 AND role = super_admin', array($user));
		return $user;
	}
	// admin34200
	public function admin($user)
	{
		DB::select('SELECT * FROM utilisateur WHERE id = 2 AND role = admin', array($user));
		return $user;
	}

	public function essayageVirtuel($user)
	{
		DB::select('SELECT * FROM utilisateur WHERE id = ?', array($user));
		return $user;
	}
}
