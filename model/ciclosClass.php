<?php



class ciclosClass {
    
    protected $Cod_ciclo;
    protected $Cod_familia;
    protected $Tipo;
    protected $Nom_ciclo_eu;
    protected $Nom_ciclo_es;
    
/**
     * @return mixed
     */
    public function getCod_ciclo()
    {
        return $this->Cod_ciclo;
    }

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
    public function getTipo()
    {
        return $this->Tipo;
    }

    /**
     * @return mixed
     */
    public function getNom_ciclo_eu()
    {
        return $this->Nom_ciclo_eu;
    }

    /**
     * @return mixed
     */
    public function getNom_ciclo_es()
    {
        return $this->Nom_ciclo_es;
    }

    /**
     * @param mixed $Cod_ciclo
     */
    public function setCod_ciclo($Cod_ciclo)
    {
        $this->Cod_ciclo = $Cod_ciclo;
    }

    /**
     * @param mixed $Cod_familia
     */
    public function setCod_familia($Cod_familia)
    {
        $this->Cod_familia = $Cod_familia;
    }

    /**
     * @param mixed $Tipo
     */
    public function setTipo($Tipo)
    {
        $this->Tipo = $Tipo;
    }

    /**
     * @param mixed $Nom_ciclo_eu
     */
    public function setNom_ciclo_eu($Nom_ciclo_eu)
    {
        $this->Nom_ciclo_eu = $Nom_ciclo_eu;
    }

    /**
     * @param mixed $Nom_ciclo_es
     */
    public function setNom_ciclo_es($Nom_ciclo_es)
    {
        $this->Nom_ciclo_es = $Nom_ciclo_es;
    }

function getObjectVars()
{
    $vars = get_object_vars($this);
    return  $vars;
}

}