<?php
//......Déclaration des constantes de connexion à la bdd "projet"
define('DB_HOST', 'localhost');
define('DB_NAME', 'projet');
define('DB_USER', 'root');
define('DB_PASS', '');

// Déclaration de l'objet DB
class DB
{
  // Attibut statique (qui peut etre utilisé sans intancier l'objet, pas besoin de new DB)
  private static $db;

  // Méthode pour créer une connection à la BDD
  public static function connect()
  {
    // Si l'attribut statique $db de cet objet (self) est vide, :: sert à cibler un élément statique d'un objet
    if (empty(self::$db)) {
      try {
        self::$db = new PDO(
          "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
          DB_USER,
          DB_PASS,
          [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
          ]
        );
      } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
      }
      
    }
    return self::$db;
  }

  // Declaration de la methode statique select qui prend 2 arguments, une requête sql et un tableau de paramètre (qui peut etre null)
  public static function select($sql, $cond = null)
  {
    $result = false;

    try {
      $stmt = self::connect()->prepare($sql);
      $stmt->execute($cond);
      /* $count = $stmt->rowCount();
      if ($count == 1) {
        $result = $stmt->fetch();
      } else {*/
      $result = $stmt->fetchAll();
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
    $stmt = null;
    return $result;
  }

  // Méthode pour récupérer le dernier ID créé dans la BDD
  public static function lastId()
  {
    return self::connect()->lastInsertId();
  }
}
