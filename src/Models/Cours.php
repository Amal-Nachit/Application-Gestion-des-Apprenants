<?php
use src\Services\Hydratation;

class Cours
{
    private $IdCours;
    private $Nom;
    private $Debut;
    private $Fin;
    private $Code;
    private $IdPromo;


    Use Hydratation;    

    /**
     * Get the value of IdCours
     */
    public function getIdCours()
    {
        return $this->IdCours;
    }

    /**
     * Set the value of IdCours
     */
    public function setIdCours($IdCours): self
    {
        $this->IdCours = $IdCours;

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
     * Get the value of Debut
     */
    public function getDebut()
    {
        return $this->Debut;
    }

    /**
     * Set the value of Debut
     */
    public function setDebut($Debut): self
    {
        $this->Debut = $Debut;

        return $this;
    }

    /**
     * Get the value of Fin
     */
    public function getFin()
    {
        return $this->Fin;
    }

    /**
     * Set the value of Fin
     */
    public function setFin($Fin): self
    {
        $this->Fin = $Fin;

        return $this;
    }

    /**
     * Get the value of Code
     */
    public function getCode()
    {
        return $this->Code;
    }

    /**
     * Set the value of Code
     */
    public function setCode($Code): self
    {
        $this->Code = $Code;

        return $this;
    }

    /**
     * Get the value of IdPromo
     */
    public function getIdPromo()
    {
        return $this->IdPromo;
    }

    /**
     * Set the value of IdPromo
     */
    public function setIdPromo($IdPromo): self
    {
        $this->IdPromo = $IdPromo;

        return $this;
    }
}