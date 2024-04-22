<?php

namespace src\Controllers;

use src\Models\Promo;
use src\Repositories\PromoRepository;
use src\Services\Reponse;

class PromoController
{
    private $promoRepo;
    use Reponse;

    public function __construct()
    {
        $this->promoRepo = new PromoRepository;
    }

    public function AjouterPromo()
    {
        $data = file_get_contents('php://input');
        $array = json_decode($data, true);

        $array['NomPromo'] = htmlspecialchars(trim(strip_tags($array['NomPromo'])));
        $array['DebutPromo'] = htmlspecialchars(trim(strip_tags($array['DebutPromo'])));
        $array['FinPromo'] = htmlspecialchars(trim(strip_tags($array['FinPromo'])));
        $array['NbPlaces'] = htmlspecialchars(trim(strip_tags($array['NbPlaces'])));

        if (isset($array['NomPromo']) && !empty($array['NomPromo']) && isset($array['DebutPromo']) && !empty($array['DebutPromo']) && isset($array['FinPromo']) && !empty($array['FinPromo']) && isset($array['NbPlaces']) && !empty($array['NbPlaces'])) {
            $AjouterPromo = [
                'Nom' => $array['NomPromo'],
                'DebutPromo' => $array['DebutPromo'],
                'FinPromo' => $array['FinPromo'],
                'NbPlaces' => $array['NbPlaces']
            ];
            $promo = new \Promo($AjouterPromo);
            if (isset($promo) && !empty($promo)) {
                $this->promoRepo->AjouterPromo($promo);
                $message = ['message' => "La promotion a bien été enregistré"];
                return json_encode($message);
            } else {
                $message = ['message' => "Problème lors de l'enregistrement"];
                return json_encode($message);
            }
        } else {
            $message = ['message' => "Problème lors de l'enregistrement"];
            return json_encode($message);
        }
    }
}
