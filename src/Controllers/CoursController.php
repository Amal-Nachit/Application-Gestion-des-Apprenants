<?php

namespace src\Controllers;

use DateTime;
use src\Repositories\CoursRepository;
use src\Services\Reponse;
use src\Repositories\UserRepository;
class CoursController
{

    use Reponse;

    public function createCode()
    {

        $nomPromo = $_SESSION['user']['Nom'];
        if ($nomPromo === 'premierepromo') {
            $IdPromo = 1;
        } else if ($nomPromo === 'deuxiemepromo') {
            $IdPromo = 2;
        } else {
            $IdPromo = null;
        }
        ;

        $coursRepo = new CoursRepository;
        $coursRepo->createRandomCode($IdPromo);
        $code = $coursRepo->getCodeCours();
        $todayCours = $coursRepo->getCoursByDay(new DateTime());

        // Je récup l'id du cours qui a lieu actuellement avec le userID et les promos qui lui sont rattachées
        $userRepo = new UserRepository();
        $IdCours = $userRepo->getCoursIdByUser($_SESSION['user']['IdUser']);
        $IdCours = $IdCours->IdDesCours;
        $_SESSION['cours']['IdCours'] = $IdCours;

        $_SESSION['cours']['code'] = $coursRepo->getCodeCours();

        if (isset($code)) {
            echo $coursRepo->getCodeCours()->code;
        } else {
           echo 'Erreur de génération du code';
        }
    }


}