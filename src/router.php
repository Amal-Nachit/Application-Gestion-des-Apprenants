<?php
use src\Controllers\CoursController;
use src\Controllers\HomeController;
use src\Controllers\PromoController;
use src\Controllers\UserController;
use src\Services\Routing;


$UserController = new UserController;
$HomeController = new HomeController;
$routeComposee = new Routing;
$PromoController = new PromoController;
$CoursController = new CoursController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];
$routeComposee = $routeComposee->routeComposee($route);

if (isset($_SESSION['connecté']) !== TRUE) {
  switch ($route) {
    case HOME_URL :
      // Page d'accueil
      $HomeController->index();

      break;
    case HOME_URL . "connexion":
      if ($methode === 'POST') {

        $UserController->authentication();
      }
      break;

    default:
      $HomeController->page404();
      break;
  }
}

if (isset($_SESSION['connecté']) == TRUE) {
  $routeComposee[0] = 'dashboard';

  switch ($route) {
    case HOME_URL . "deconnexion":
      $UserController->logout();
      break;

    case $routeComposee[0] == "dashboard":
      switch ($route) {
        case $routeComposee[1] == "accueil":

          $UserController->index();
          break;

        case $routeComposee[1] == "apprenants":
          if ($methode == 'POST') {
            $UserController->registerApprenant($_POST);
          }
          break;

          case $routeComposee[1] == "createCode":
            $CoursController->CreateCode();
            break;
          case $routeComposee[1] == "ajouterPromo":
            $PromoController->AjouterPromo();
            break;
          
        case $routeComposee[1] == "deconnexion":
          $UserController->logout();
          break;

        default:
          $UserController->index();
          break;
      }
      break;

    default:
      $HomeController->page404();
      die();
  }
}