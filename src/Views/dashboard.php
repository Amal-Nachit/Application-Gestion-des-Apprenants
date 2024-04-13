<?php
require_once __DIR__ . '/../init.php';
include __DIR__ . "/Includes/header.php";
include __DIR__ . "/Includes/navBar.php";
include __DIR__ . "/Includes/navApprenant.php";


use src\Repositories\UserRepository;

$IdRoleUser = new UserRepository;
$IdRoleUser = $_SESSION['user'];
var_dump($IdRoleUser);

if ($IdRoleUser) {
    switch ($IdRoleUser) {
        case 1:
            include __DIR__ . "/Includes/navManager.php";
            break;
        case 2:
            include __DIR__ . "/Includes/navPeda.php";
            break;
        case 3:
            include __DIR__ . "/Includes/navFormateur.php";
            break;
        case 4:
            include __DIR__ . "/Includes/navDelegue.php";
            break;
        case 5:
            include __DIR__ . "/Includes/navApprenant.php";
            break;
        default:
            // Gestion des cas non gérés
            break;
    }
} else {
    // Gestion des cas où aucun utilisateur n'est trouvé
    echo "Aucun utilisateur trouvé avec cet email.";
}