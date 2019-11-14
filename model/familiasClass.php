<?php



class familiasClass {
    protected $Cod_familia;
    protected $Nom_familia_eu;
    protected $Nom_familia_es;
    
    
    
/**
     * @return mixed
     */
    public function getCod_familia()
    {
        return $this->Cod_familia;
    }

    /**
     * @return mixed
     */
    public function getNom_familia_eu()
    {
        return $this->Nom_familia_eu;
    }

    /**
     * @return mixed
     */
    public function getNom_familia_es()
    {
        return $this->Nom_familia_es;
    }

    /**
     * @param mixed $Cod_familia
     */
    public function setCod_familia($Cod_familia)
    {
        $this->Cod_familia = $Cod_familia;
    }

    /**
     * @param mixed $Nom_familia_eu
     */
    public function setNom_familia_eu($Nom_familia_eu)
    {
        $this->Nom_familia_eu = $Nom_familia_eu;
    }

    /**
     * @param mixed $Nom_familia_es
     */
    public function setNom_familia_es($Nom_familia_es)
    {
        $this->Nom_familia_es = $Nom_familia_es;
    }

function getObjectVars()
{
    $vars = get_object_vars($this);
    return  $vars;
}

}