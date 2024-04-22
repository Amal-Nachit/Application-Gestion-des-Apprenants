<?php

namespace src\Repositories;

use DateTime;
use src\Models\Cours;
use PDO;
use src\Models\Database;

class CoursRepository
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  public function getCoursByDay($date = null)
  {
    // Si aucune date n'est fournie, utiliser la date actuelle
    if ($date === null) {
      $date = new DateTime();
    }

    $formattedDate = $date->format('Y-m-d');

    $stmt = $this->DB->prepare("
      SELECT * FROM `aga_cours`
      WHERE Debut(Debut) = :formattedDate
      ");
    $stmt->bindValue(':formattedDate', $formattedDate);
    $stmt->setFetchMode(PDO::FETCH_CLASS, \Cours::class);
    $stmt->execute();
    $resultat = $stmt->fetchAll();
    return $resultat;
  }

  public function createRandomCode($IdPromo)
  {
    $stmt = $this->DB->prepare(" UPDATE `aga_cours`
                                      SET Code = LPAD(FLOOR(RAND() * 99999), 5, '0')
                                      WHERE IdCours = :IdCours
                                      AND Nom = :Nom;
                                      AND DATE(Debut) = CURDATE();
    ");
    $stmt->bindValue(':IdPromo', $IdPromo);
    $stmt->execute();
  }

  public function getCodeCours()
  {
    $stmt = $this->DB->prepare("  SELECT aga_cours.Code FROM `aga_cours`
                                        WHERE  DATE(Debut) = CURDATE()
                                        AND TIME(NOW()) BETWEEN TIME(Debut) AND TIME(Fin);"
    );
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    $resultat = $stmt->fetch();
    return $resultat;
  }
  public function getCoursIdByUser($userId)
  {
    $query = $this->DB->prepare("SELECT aga_cours.IdCours as IdCours
                                  FROM aga_user
                                  LEFT JOIN aga_relationuserpromo ON aga_user.IdUser = aga_relationuserpromo.IdUser 
                                  LEFT JOIN aga_relationuserpromo.IdPromo = aga_promo.IdPromo 
                                  LEFT JOIN aga_cours ON aga_promo.IdPromo = aga_cours.IdPromo
                                  WHERE TIME(NOW()) BETWEEN TIME(aga_cours.Debut) AND TIME(aga_cours.Fin)
                                  AND DATE(aga_cours.Debut) = CURDATE() AND aga_user.IdUser = :IdUser;
                    ");
    $query->bindParam(':IdUser', $IdUser);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
    return $result;
  }
  
  public function getCurrentCoursByPromo($IdPromo)
  {
    $query = $this->DB->prepare("  SELECT * 
                                        FROM `aga_cours`
                                        WHERE DATE(Debut) = CURDATE()
                                        AND TIME(NOW()) BETWEEN TIME(Debut) AND TIME(Fin)
                                        AND IdPromo = :IdPromo;"
    );
    $query->bindParam(':IdPromo', $IdPromo);
    $query->execute();
    $query->setFetchMode(PDO::FETCH_CLASS, \Cours::class);
    $result = $query->fetch();
    return $result;
  }
}