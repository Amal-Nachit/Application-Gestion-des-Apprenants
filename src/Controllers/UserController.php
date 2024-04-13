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

    public function index($user)
    {
        $user = json_decode($user);
        $this->render('dashboard', ['user' => $user]);
    }

    public function registerUser($data)
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

    public function authentication($data)
    {
        $data = file_get_contents('php://input');
        $array = json_decode($data, true);
        if (!empty($array) && isset($array)) {
            if ($User = $this->UserRepo->getThisUser($array['Email'])) {
                if (password_verify($array['Password'], $User->getPassword())) {
                    $_SESSION['connecté'] = TRUE;
                    $_SESSION['user'] = serialize($User);
                    $this->render('dashboard', ['user' => $_SESSION['user']]);
                } else {
                }
            } else {
            }
        }
    }
    public function logout()
    {
        session_destroy();
        header('location: ' . HOME_URL);
        die();
    }

    public function deleteThisUser($id)
    {
        $User = $this->UserRepo->deleteThisUser($id);
    }

    public function updateThisUser($data, $IdUser)
    {

    }
}