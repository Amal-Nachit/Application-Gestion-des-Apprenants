<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\User;
use PDO;
use PDOException;

class UserRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }


    public function createUser(User $user)
    {
        try {
            $sql = "INSERT INTO aga_user (IdUser, Nom, Prenom, Password, CompteActif, Email, IdRoleUser) VALUES (null, :Nom, :Prenom, :Password, :CompteActif, :Email, :IdRoleUser)";

            $stmt = $this->DB->prepare($sql);
            $stmt->execute([
                ':Nom' => $user->getNom(),
                ':Prenom' => $user->getPrenom(),
                ':Password' => $user->getPassword(),
                ':CompteActif' => $user->getCompteActif(),
                ':Email' => $user->getEmail(),
                ':IdRoleUser' => $user->getIdRoleUser()
            ]);
        } catch (PDOException $e) {
            throw new \Exception("Une erreur est survenue lors de l'enregistrement de l'utilisateur : " . $e->getMessage());
        }
    }

    public function userExist(User $user)
    {
        $sql = "SELECT * FROM aga_user WHERE Email = :Email";
        $email = $user->getEmail();
        $stmt = $this->DB->prepare($sql);
        $stmt->execute([':Email' => $email]);

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getThisUser($email): User|bool
    {
        $sql = "SELECT * FROM aga_user WHERE Email = :Email";

        $stmt = $this->DB->prepare($sql);
        $stmt->bindParam(':Email', $email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        $retour = $stmt->fetch();
        
        if ($retour) {
            return $retour;
        } else {
            return false;
        }
    }

    public function getThisUserById($id): User|bool
    {
        $sql = "SELECT * FROM aga_user WHERE Id = :Id";

        $stmt = $this->DB->prepare($sql);
        $stmt->bindParam(':Id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        $retour = $stmt->fetch();

        return $retour;
    }

    public function getThisUserByRole($IdRoleUser)
    {
        try {
            $sql = "SELECT * FROM aga_user WHERE IdRoleUser = :IdRoleUser";
            $stmt = $this->DB->prepare($sql);
            $stmt->bindParam(':IdRoleUser', $IdRoleUser);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
            $retour = $stmt->fetch();

            return $retour;
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            echo "Erreur de base de données : " . $e->getMessage();
            return null;
        }
    }

    public function updateThisUser(User $user): bool
    {
        $sql = "UPDATE aga_user 

        SET
            Nom = :Nom,
            Prenom = :Prenom, 
            Password = :Password,
            CompteActif = :CompteActif,
            Email = :Email,
            IdRoleUser = :IdRoleUser,
            WHERE IdUser = :IdUser;";

        $stmt = $this->DB->prepare($sql);

        $retour = $stmt->execute([]);

        return $retour;
    }


    public function deleteThisUser(int $id): bool
    {
        try {
            $sql = "DELETE FROM aga_user WHERE IdUser = :IdUser;";

            $stmt = $this->DB->prepare($sql);

            return $stmt->execute([':id' => $id]);
        } catch (PDOException $error) {
            echo "Erreur de suppression : " . $error->getMessage();
            return FALSE;
        }
    }
}