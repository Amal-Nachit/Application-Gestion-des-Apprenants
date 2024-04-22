<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\Promo;

class PromoRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }

    public function AjouterPromo(\Promo $promo)
    {
        $sql = "INSERT INTO aga_promo ( `Nom`, `Debut`, `Fin`, `NbPlaces`) VALUES (:Nom, :Debut, :Fin, :NbPlaces)";

        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":Nom" => $promo->getNom(),
            ":Debut" => $promo->getDebut(),
            ":Fin" => $promo->getFin(),
            ":NbPlaces" => $promo->getNbPlaces()
        ]);

        return $statement;
    }
}