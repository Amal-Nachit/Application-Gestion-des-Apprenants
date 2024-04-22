<?php
use src\Services\Hydratation;

class RelationUserPromo {
    private $IdCours;
    private $IdUser;
    private $Absence;
    private $retard;
    
    use Hydratation;

    

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
     * Get the value of Absence
     */
    public function getAbsence()
    {
        return $this->Absence;
    }

    /**
     * Set the value of Absence
     */
    public function setAbsence($Absence): self
    {
        $this->Absence = $Absence;

        return $this;
    }

    /**
     * Get the value of retard
     */
    public function getRetard()
    {
        return $this->retard;
    }

    /**
     * Set the value of retard
     */
    public function setRetard($retard): self
    {
        $this->retard = $retard;

        return $this;
    }
}