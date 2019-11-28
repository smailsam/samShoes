<?php
// charge le modèle lié à la DAO
require_once('modele/Article.class.php');
// Déclaration de l'objet dao avec l'héritage du "super controlleur" Controller
class DaoArticle
{
	// Déclaration de méthode du dao 
	public function create($article)
	{

		DB::select(
			'INSERT INTO article (designation,prix,image,coloris,pointure,description,stock,archive,fk_collection,fk_tarification) VALUES (?,?,?,?,?,?,?,?)',
			array(
				$article->getDesignation(),
				$article->getPrix(),
				$article->getImage(),
				$article->getColoris(),
				$article->getPointure(),
				$article->getDescription(),
				$article->getStock(),
				$article->getArchive()
			)
		);
	}

	public function readAll()
	{
		$donnees = DB::select('SELECT * FROM article WHERE archive = 0');
		$tabArticle = array();
		if (!empty($donnees)) {
			foreach ($donnees as $key => $donnee) {
				$tabArticle[$key] = new Article($donnee['designation'], $donnee['prix'], $donnee['image'], $donnee['coloris'], $donnee['pointure'], $donnee['description'], $donnee['stock'], $donnee['archive']);
				$tabArticle[$key]->setId($donnee['id']);
				$tabArticle[$key]->setFk_collection($donnee['fk_collection']);
				$tabArticle[$key]->setFk_tarification($donnee['fk_tarification']);
			}
			return $tabArticle;
		}
	}
	public function readAllByTarif($tarif)
	{

		$donnees = DB::select('SELECT * FROM article WHERE fk_tarification = ? AND archive = 0', array($tarif));

		foreach ($donnees as $key => $articleData) {
			$tabArticle[$key] = new Article($articleData['designation'], $articleData['prix'], $articleData['image'], $articleData['coloris'], $articleData['pointure'], $articleData['description'], $articleData['stock']);
		}
		return $tabArticle;
	}

	public function readAllByCollec($collec)
	{

		$donnees = DB::select('SELECT * FROM article WHERE fk_collection = ? AND archive = 0', array($collec));

		foreach ($donnees as $key => $articleData) {
			$tabArticle[$key] = new Article($articleData['designation'], $articleData['prix'], $articleData['image'], $articleData['coloris'], $articleData['pointure'], $articleData['description'], $articleData['stock']);
		}
		return $tabArticle;
	}

	public function update($article)
	{
		$donnees = DB::select('UPDATE article SET designation = ?, prix = ?, image = ?,coloris = ?, description =?, stock = ?, archive = ? fk_collection = ?, fk_tarification = ? WHERE id = ?', array($article->getDesignation(), $article->getPrix(), $article->getImage(), $article->getDescription(), $article->getStock(), $article->getArchive(), $article->getFk_collection(), $article->getFk_tarification()));

		foreach ($donnees as $key => $articleData) {
			$tabArticle[$key] = new Article($articleData['designation'], $articleData['prix'], $articleData['image'], $articleData['coloris'], $articleData['pointure'], $articleData['description']);
		}
		return $tabArticle;
	}

	public function delete($article)
	{
		DB::select(
			'DELETE * FROM article WHERE id = ?',
			array($article)
		);
	}

	/*public function addPanier($id) {
		$newPanier = DB::select('INSERT INTO panier (fk_user,fk_article) VALUES (?,?)',array($id));

		$newPanier = DB::select('SELECT article.designation AS art_desi, article.image AS art_img, article.prix AS art_prix, article.coloris AS art_col, article.pointure AS art_point, article.description AS art_desc, stock, user.nom AS user_nom, user.prenom AS user_prenom
			 	FROM panier
			 	INNER JOIN article ON fk_article = article.id
			 	INNER JOIN user ON fk_user = user.id
			 	WHERE fk_user = ?',array($id)); 
			 	
		foreach ($donnees as $key => $articleData) {
			$newPanier[$key] = new Article($articleData['art_desi'],$articleData['art_prix'],$articleData['art_img'],$articleData['art_desc'],$articleData['art_col'],$articleData['art_point'],$articleData['art_stock'] );
			}
		//	$newPanier->setId(DB::lastId());
			return $newPanier;
}

	public function readPanier($id) {
	$donnees = DB::select('SELECT article.id AS art_id, article.designation AS art_desi, article.image AS art_img, article.prix AS art_prix, article.coloris AS art_col, article.description AS art_desc, article.pointure AS art_point, article.stock AS art_stock, user.id AS user_id, user.nom AS user_nom, user.prenom AS user_prenom
			 FROM panier
			 INNER JOIN article ON fk_article = article.id
			 INNER JOIN user ON fk_user = user.id 
			 WHERE fk_user = ?',array($id));
		$tabArticle = array();
		if (!empty($donnees)) {
		foreach ($donnees as $key => $articleData) {
		$tabArticle[$key] = new Panier($articleData['art_desi'],$articleData['art_prix'],$articleData['art_img'],$articleData['art_desc'],$articleData['art_col'],$articleData['art_point'],$articleData['art_stock'] );
		$tabArticle[$key]->setId($donnee['id']);
		$tabArticle[$key]->setArchive($donnee['archive']);
		}
		return $tabArticle;
	} 
}*/
}
