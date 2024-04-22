<?php

namespace src\Controllers;

use src\Services\Reponse;

class HomeController
{

  use Reponse;

  public function index(): void
  {
    if (isset($_GET['erreur'])) {
      $erreur = htmlspecialchars($_GET['erreur']);
    } else {
      $erreur = '';
    }

    $this->render("connexion", ["erreur" => $erreur]);
  }


  public function page404(): void
  {
    header("HTTP/1.1 404 Not Found");
    $this->render('404');
  }
}