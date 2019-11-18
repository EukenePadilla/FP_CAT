<?php
include_once 'connect_data.php';
include_once 'ofertaClass.php';
include_once 'centrosModel.php';
include_once 'ciclosModel.php';
include_once 'familiasModel.php';

class ofertaModel extends ofertaClass
{
    private $link;
    private $list=array();
    private $objCentro;
    private $objCiclo;
    
    
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
        mysqli_close ($this->link);
        
    }
    
    public function getLink()
    {
        return $this->link;
    }
    
    public function getList()
    {
        return $this->list;
    }
    
    
    public function getObjCentro()
    {
        return $this->objCentro;
    }
    
    
    public function getObjCiclo()
    {
        return $this->objCiclo;
    }
    
    
    public function setLink($link)
    {
        $this->link = $link;
    }
    
    
    public function setObjCentro($objCentro)
    {
        $this->objCentro = $objCentro;
    }
    
    
    public function setObjCiclo($objCiclo)
    {
        $this->objCiclo = $objCiclo;
    }
    
    public function setListCentros()
    {
        $this->OpenConnect();
        
        $cod_ciclo=$this->Cod_ciclo;
        
        $sql="call spFindOfertaIdCiclo('$cod_ciclo')";
        
        $result = $this->link->query($sql);
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $nuevaOferta=new ofertaModel();
            $nuevaOferta->setCod_ciclo($row['cod_ciclo']);
            $nuevaOferta->setCod_centro($row['cod_centro']);
            $nuevaOferta->setModelo($row['modelo']);
            $nuevaOferta->setTurno($row['turno']);
            
            
            $nuevoCentro=new centrosModel();
            $nuevoCentro->setCod_centro($row['cod_centro']);
            $nuevoCentro->findCentroPorCodigo();
            
            $nuevaOferta->setObjCentro($nuevoCentro);
            
            array_push($this->list, $nuevaOferta);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
    public function setListCycles()
    {
   
        
    }
    function getListJsonString() {//if Class attributes PROTECTED
        
        $arr=array();
        
        foreach ($this->list as $object)
        {
            $vars = $object->getObjectVars();
            
            if ( $object->getObjCentro() !=null )
            {
                $vars['objCentro']=$object->getObjCentro()->getObjectVars();
            }
            if ( $object->getObjCiclo() !=null )
            {
                $vars['objCiclo']=$object->getObjCiclo()->getObjectVars();
                
                if ( $object->getObjCiclo()->getObjFamilia() !=null )
                {
                    $vars['objFamilia']=$object->getObjCiclo()->getObjFamilia()->getObjectVars();
                }
            }
            
            array_push($arr, $vars);
        }
        return json_encode($arr);
    }
}

