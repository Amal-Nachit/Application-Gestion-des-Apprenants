<?php

namespace src\Controllers;

use src\Models\User;
use src\Repositories\UserRepository;
use src\Services\Reponse;

class UserController
{
  private $UserRepo;
  use Reponse;

  public function __construct()
  {
    $this->UserRepo = new UserRepository();
  }

  public function index()
  {
    // $user = new User($_SESSION["user"]);
    $user = $_SESSION["user"];

    $role = $user->getIdRoleUser();

    $this->render('dashboard');


  }

  public function registerApprenant($data)
  {
    $data = file_get_contents('php://input');
    $array = json_decode($data, true);

    $array['NomApprenant'] = htmlspecialchars(trim(strip_tags($array['NomApprenant'])));
    $array['PrenomApprenant'] = htmlspecialchars(trim(strip_tags($array['PrenomApprenant'])));
    $array['PasswordApprenant'] = htmlspecialchars(trim(strip_tags($array['PasswordApprenant'])));
    $array['EmailApprenant'] = htmlspecialchars(trim(strip_tags($array['EmailApprenant'])));

    if (strlen($array['password']) >= 8) {
      $array['password'] = password_hash($array['password'], PASSWORD_DEFAULT);
      $array = [
        'Nom' => $array['NomApprenant'],
        'Prenom' => $array['PrenomApprenant'],
        'Password' => $array['PasswordApprenant'],
        'Email' => $array['EmailApprenant'],
        'IdRole' => 5,
      ];
      $user = new User($array);
      if (isset($user) && !empty($user)) {
        $this->UserRepo->createUser($user);
      }
    } else {
    }
  }

  public function authentication()
  {

    $data = file_get_contents('php://input');
    $array = json_decode($data, true);
    if (!empty($array) && isset($array)) {
      if ($User = $this->UserRepo->getUserByEmail($array['Email'])) {
        if (password_verify($array['Password'], $User->getPassword())) {
          $_SESSION['connecté'] = TRUE;
          $user = $this->UserRepo->getUserByEmail($array['Email']);
          $_SESSION['user'] = $user;
        } else {

        }
      }
    }
  }
  public function logout()
  {
    session_destroy();
    header('location: ' . HOME_URL);
    die();
  }

  public function deleteUser($id)
  {
    $User = $this->UserRepo->deleteUser($id);
  }

  public function updateUser($data, $IdUser)
  {

  }
}