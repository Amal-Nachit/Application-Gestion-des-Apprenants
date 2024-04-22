<?php
use src\Services\Hydratation;

class Promo {

    private $IdPromo;
    private $Nom;
    private $Debut;
    private $Fin;
    private $NbPlaces;

    use Hydratation;



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
     * Get the value of NbPlaces
     */
    public function getNbPlaces()
    {
        return $this->NbPlaces;
    }

    /**
     * Set the value of NbPlaces
     */
    public function setNbPlaces($NbPlaces): self
    {
        $this->NbPlaces = $NbPlaces;

        return $this;
    }
}