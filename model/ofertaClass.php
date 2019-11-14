<?php



class ofertaClass {
    
    protected $Codigo;
    protected $Cod_ciclo;
    protected $Cod_centro;
    protected $Modelo;
    protected $Turno;
    
/**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->Codigo;
    }

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
    public function getCod_centro()
    {
        return $this->Cod_centro;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->Modelo;
    }

    /**
     * @return mixed
     */
    public function getTurno()
    {
        return $this->Turno;
    }

    /**
     * @param mixed $Codigo
     */
    public function setCodigo($Codigo)
    {
        $this->Codigo = $Codigo;
    }

    /**
     * @param mixed $Cod_ciclo
     */
    public function setCod_ciclo($Cod_ciclo)
    {
        $this->Cod_ciclo = $Cod_ciclo;
    }

    /**
     * @param mixed $Cod_centro
     */
    public function setCod_centro($Cod_centro)
    {
        $this->Cod_centro = $Cod_centro;
    }

    /**
     * @param mixed $Modelo
     */
    public function setModelo($Modelo)
    {
        $this->Modelo = $Modelo;
    }

    /**
     * @param mixed $Turno
     */
    public function setTurno($Turno)
    {
        $this->Turno = $Turno;
    }

function getObjectVars()
{
    $vars = get_object_vars($this);
    return  $vars;
}

}