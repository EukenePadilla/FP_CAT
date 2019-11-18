<?php
include_once 'connect_data.php';
include_once 'centrosClass.php';

class centrosModel extends centrosClass
{
    private $link;
    private $list=array();
    
    public function OpenConnect()
    {
        $konDat=new connect_data();
        try
        {
            $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }
    
    public function CloseConnect()
    {
        try
        {
            $this->link->close();
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        
    }
    
    public function getLink()
    {
        return $this->link;
    }
    
    public function getList()
    {
        return $this->list;
    }
    public function setLink($link)
    {
        $this->link = $link;
    }
    
    function findCentroPorCodigo()
    {
        $this->OpenConnect();
        $cod_centro=$this->Cod_centro;
        $sql="call spFindCentroIdCentros('$cod_centro')";
        $result= $this->link->query($sql);
        
        if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $this->setNom_centro($row['nom_centro']);
            $this->setMunicipio($row['municipio']);
            $this->setTerritorio($row['territorio']);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
}

