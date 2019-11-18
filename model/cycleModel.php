<?php
include_once 'connect_data.php';
include_once 'cycleClass.php';
include_once 'familyModel.php';

class cycleModel extends cycleClass
{
    private $link;
    private $list=array();
    private $objFamilia;
    
    public function getObjFamilia()
    {
        return $this->objFamilia;
    }

    public function setObjFamilia($objFamilia)
    {
        $this->objFamilia = $objFamilia;
    }

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

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function setList()
    {
       
        $this->OpenConnect();
        
        $cod_familia=$this->cod_familia;
        
        $sql="call spFindCyclesIdFamily('$cod_familia')";
        $result= $this->link->query($sql);
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $newCycle=new cycleModel();
            $newCycle->setCod_ciclo($row['cod_ciclo']);
            $newCycle->setCod_familia($row['cod_familia']);
            $newCycle->setTipo($row['tipo']);
            $newCycle->setNom_ciclo_eu($row['nom_ciclo_eu']);
            $newCycle->setNom_ciclo_es($row['nom_ciclo_es']);
            
            array_push($this->list, $newCycle);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }

    
    function getListJsonString() {//if Class attributes PROTECTED
        
        $arr=array();
        
        foreach ($this->list as $object)
        {
            $vars = $object->getObjectVars();
            
            if ($object->getObjFamilia() !=null)
            {
                $vars['objFamilia']=$object->getObjFamilia()->getObjectVars();
            }
            array_push($arr, $vars);
        }
        return json_encode($arr);
    }
}

