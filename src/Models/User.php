<?php
namespace src\Models;
use src\Services\Hydratation;


class User {

    private $IdUser;
    private $Nom;
    private $Prenom;
    private $Email;
    private $Password;
    private $CompteActif;
    private $IdRoleUser;

    use Hydratation;


    

    /**
     * Get the value of IdUser
     */
    public function getIdUser()
    {
        return $this->IdUser;
    }

    /**
     * Set the value of IdUser
     */
    public function setIdUser($IdUser): self
    {
        $this->IdUser = $IdUser;

        return $this;
    }

    /**
     * Get the value of Nom
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * Set the value of Nom
     */
    public function setNom($Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * Get the value of Prenom
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * Set the value of Prenom
     */
    public function setPrenom($Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    /**
     * Get the value of Email
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     */
    public function setEmail($Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get the value of Password
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Set the value of Password
     */
    public function setPassword($Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    /**
     * Get the value of CompteActif
     */
    public function getCompteActif()
    {
        return $this->CompteActif;
    }

    /**
     * Set the value of CompteActif
     */
    public function setCompteActif($CompteActif): self
    {
        $this->CompteActif = $CompteActif;

        return $this;
    }

    /**
     * Get the value of IdRoleUser
     */
    public function getIdRoleUser()
    {
        return $this->IdRoleUser;
    }

    /**
     * Set the value of IdRoleUser
     */
    public function setIdRoleUser($IdRoleUser): self
    {
        $this->IdRoleUser = $IdRoleUser;

        return $this;
    }
}