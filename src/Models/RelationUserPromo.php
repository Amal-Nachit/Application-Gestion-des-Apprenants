<?php 
use src\Services\Hydratation;

class RelationUserPromo {

    private $IdPromo;
    private $IdUser;

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
}


