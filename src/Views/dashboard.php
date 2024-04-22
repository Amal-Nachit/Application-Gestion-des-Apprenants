<?php
require_once __DIR__ . '/../init.php';
include __DIR__ . "/Includes/header.php";
include __DIR__ . "/Includes/navBar.php";

$user = $_SESSION["user"];

$role = $user->getIdRoleUser();

if ($role == 4) {
    include __DIR__ . "/Includes/navApprenant.php";
    
}
if ($role == 3) {
    include __DIR__ . "/Includes/navFormateur.php";

}