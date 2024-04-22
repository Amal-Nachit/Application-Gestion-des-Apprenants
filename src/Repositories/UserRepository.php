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

    public function getUserByEmail($email): User|bool
    {
        try {
            $sql = "SELECT * FROM aga_user WHERE Email = :Email";
            $stmt = $this->DB->prepare($sql);
            $stmt->execute([':Email' => $email]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);

            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new \Exception('Erreur de récupération d\'un utilisateur par son email : ' . $e->getMessage());
        }
    }

    public function getUserById($IdUser): User|bool
    {
        $sql = "SELECT * FROM aga_user WHERE IdUser = :IdUser";

        $stmt = $this->DB->prepare($sql);
        $stmt->bindParam(':IdUser', $IdUser);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        $retour = $stmt->fetch();

        return $retour;
    }

    public function getUserByRole($IdRoleUser): User
    {

            $sql = "SELECT * FROM aga_user WHERE IdRoleUser = :IdRoleUser";
            $stmt = $this->DB->prepare($sql);
            $stmt->bindParam(':IdRoleUser', $IdRoleUser);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
            $retour = $stmt->fetch();

            return $retour;
    }

    public function updateUser(User $user): bool
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


    public function deleteUser(int $IdUser): bool
    {
        try {
            $sql = "DELETE FROM aga_user WHERE IdUser = :IdUser;";

            $stmt = $this->DB->prepare($sql);

            return $stmt->execute([':IdUser' => $IdUser]);
        } catch (PDOException $error) {
            echo "Erreur de suppression : " . $error->getMessage();
            return FALSE;
        }
    }

    public function getCoursIdByUser($IdUser)
    {
        $query = $this->DB->prepare("SELECT aga_cours.IdCours as IdDesCours
                        FROM aga_user 
                        LEFT JOIN aga_relationuserpromo ON aga_user.IdUser = aga_relationuserpromo.IdUser 
                        LEFT JOIN b6_promo ON aga_relationuserpromo.IdPromo = aga_promo.IdPromo
                        LEFT JOIN aga_cours ON aga_promo.IdPromo = aga_cours.IdPromo
                        WHERE TIME(NOW()) BETWEEN TIME(aga_cours.Debut) AND TIME(aga_cours.Fin)
                        AND DATE(aga_cours.Debut) = CURDATE() AND aga_user.IdUser = :IdUser;
                    ");
        $query->bindParam(':IdUser', $IdUser);
        $query->execute();
        $resultat = $query->fetch(PDO::FETCH_OBJ);
        return $resultat;
    }
}