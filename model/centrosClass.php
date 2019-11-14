<?php



class centrosClass {
    
    protected $Territorio;
    protected $Dependencia;
    protected $Cod_centro;
    protected $Nom_centro;
    protected $Direccion;
    protected $Municipio;
    protected $Cp;
    protected $Telefono;
    protected $Fax;
    protected $Email;
    protected $Web;
    protected $Coord_x;
    protected $Coord_y; 

/**
     * @return mixed
     */
    public function getTerritorio()
    {
        return $this->Territorio;
    }

    /**
     * @return mixed
     */
    public function getDependencia()
    {
        return $this->Dependencia;
    }

    /**
     * @return mixed
     */
    public function getCod_centro()
    {
        return $this->Cod_centro;
    }

    /**
     * @return mixed
     */
    public function getNom_centro()
    {
        return $this->Nom_centro;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @return mixed
     */
    public function getMunicipio()
    {
        return $this->Municipio;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->Cp;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->Fax;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @return mixed
     */
    public function getWeb()
    {
        return $this->Web;
    }

    /**
     * @return mixed
     */
    public function getCoord_x()
    {
        return $this->Coord_x;
    }

    /**
     * @return mixed
     */
    public function getCoord_y()
    {
        return $this->Coord_y;
    }

    /**
     * @param mixed $Territorio
     */
    public function setTerritorio($Territorio)
    {
        $this->Territorio = $Territorio;
    }

    /**
     * @param mixed $Dependencia
     */
    public function setDependencia($Dependencia)
    {
        $this->Dependencia = $Dependencia;
    }

    /**
     * @param mixed $Cod_centro
     */
    public function setCod_centro($Cod_centro)
    {
        $this->Cod_centro = $Cod_centro;
    }

    /**
     * @param mixed $Nom_centro
     */
    public function setNom_centro($Nom_centro)
    {
        $this->Nom_centro = $Nom_centro;
    }

    /**
     * @param mixed $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }

    /**
     * @param mixed $Municipio
     */
    public function setMunicipio($Municipio)
    {
        $this->Municipio = $Municipio;
    }

    /**
     * @param mixed $Cp
     */
    public function setCp($Cp)
    {
        $this->Cp = $Cp;
    }

    /**
     * @param mixed $Telefono
     */
    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;
    }

    /**
     * @param mixed $Fax
     */
    public function setFax($Fax)
    {
        $this->Fax = $Fax;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * @param mixed $Web
     */
    public function setWeb($Web)
    {
        $this->Web = $Web;
    }

    /**
     * @param mixed $Coord_x
     */
    public function setCoord_x($Coord_x)
    {
        $this->Coord_x = $Coord_x;
    }

    /**
     * @param mixed $Coord_y
     */
    public function setCoord_y($Coord_y)
    {
        $this->Coord_y = $Coord_y;
    }

function getObjectVars()
{
    $vars = get_object_vars($this);
    return  $vars;
}

}